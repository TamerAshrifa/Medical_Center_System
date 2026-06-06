<?php

namespace App\Services;

use App\Enums\OtpTypeEnum;
use App\GeneralClasses\Enums\ResponseStatusEnum;
use App\GeneralClasses\Response;
use App\Repositories\Interfaces\ResetPasswordTokenRepositoryInterface;
use Carbon\Carbon;
use App\DTOs\User\UserDTO;
use App\Repositories\Interfaces\UserRepositoryInterface;

use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService extends Service
{
    public function __construct(
        protected UserRepositoryInterface $userRepo,
        protected OtpService $otpService,
        protected ResetPasswordTokenRepositoryInterface $resetPasswordTokenRepo
    ) {
    }
    public function registerUser(UserDTO $dtoUser): Response
    {
        $response = null;
        DB::transaction(
            function () use (&$dtoUser, &$response) {
                $response = $this->userRepo->create($dtoUser);
            }
        );
        if ($response->result != ResponseStatusEnum::SUCCESS)
            return $response;

        $user = $response->data;
        $response = $this->otpService->sendOtpToUser($dtoUser->email, $user->id, OtpTypeEnum::REGISTER_VERIFY);
        if ($response->result != ResponseStatusEnum::SUCCESS)
            return $response;

        return new Response(
            ResponseStatusEnum::SUCCESS,
            Response::messageToArray('OTP-Code was sent to ' . $user->email . ' successfully, please check your inbox'),
            null,
            201
        );

    }
    public function loginUser(string $email_or_username, string $password): Response
    {
        $response = $this->userRepo->findByEmailOrUsername($email_or_username);
        if ($response->result != ResponseStatusEnum::SUCCESS)
            return $response;

        $user = $response->data;

        if ($user == null || !Hash::check($password, $user->password)) {
            return new Response(
                ResponseStatusEnum::FAIL,
                Response::messageToArray('Wrong email or password; Or the email is not verified, if so then an OTP-Code was sent to your email, please check your inbox'),
                null,
                400
            );
        }

        $response = $this->otpService->sendOtpToUser(
            $user->email,
            $user->id,
            ($user->email_verified_at != null) ?
            OtpTypeEnum::LOGIN_VERIFY : OtpTypeEnum::REGISTER_VERIFY,
        );
        if ($response->result != ResponseStatusEnum::SUCCESS)
            return $response;

        if ($user->email_verified_at == null) {
            return new Response(
                ResponseStatusEnum::FAIL,
                Response::messageToArray('Wrong email or password; Or the email is not verified, if so then an OTP-Code was sent to your email, please check your inbox'),
                null,
                400
            );
        }
        return new Response(
            ResponseStatusEnum::SUCCESS,
            Response::messageToArray('OTP-Code was sent to ' . $user->email . ' successfully, please check your inbox'),
        );
    }
    public function forgotPassword(string $email): Response
    {
        $response = $this->userRepo->findByEmail($email);
        if ($response->result != ResponseStatusEnum::SUCCESS)
            return $response;

        $user = $response->data;
        if ($user == null) {
            return new Response(
                ResponseStatusEnum::SUCCESS,
                Response::messageToArray('If the email exists, an OTP-Code was sent to it successfully, please check your inbox'),
            );
        }

        $this->otpService->sendOtpToUser($user->email, $user->id, OtpTypeEnum::FORGOT_PASSWORD);
        return new Response(
            ResponseStatusEnum::SUCCESS,
            Response::messageToArray('If the email exists, an OTP-Code was sent to it successfully, please check your inbox'),
        );
    }
    public function resetPassword(array $data): Response
    {
        $response = $this->resetPasswordTokenRepo->findByEmail($data['email']);
        if ($response->result != ResponseStatusEnum::SUCCESS)
            return $response;

        $resetTokenRecord = $response->data;
        if ($resetTokenRecord == null || $resetTokenRecord->token != $data['reset_token']) {
            return new Response(
                ResponseStatusEnum::FAIL,
                Response::messageToArray('Invalid email or reset-token'),
                null,
                400
            );
        }

        return DB::transaction(
            function () use ($data, &$resetTokenRecord, &$response) {
                if (Carbon::now()->gt(Carbon::parse($resetTokenRecord->created_at)->addMinutes(10))) {
                    $response = $this->resetPasswordTokenRepo->delete($data['email']);
                    if ($response->result != ResponseStatusEnum::SUCCESS)
                        return $response;

                    $response = $this->userRepo->findByEmail($data['email']);
                    if ($response->result != ResponseStatusEnum::SUCCESS)
                        return $response;
                    $user = $response->data;


                    $response = $this->otpService->sendOtpToUser($user->email, $user->id, OtpTypeEnum::FORGOT_PASSWORD);
                    if ($response->result != ResponseStatusEnum::SUCCESS)
                        return $response;

                    return new Response(
                        ResponseStatusEnum::FAIL,
                        Response::messageToArray('Sorry, the reset-token has expired, a new OTP-Code was sent to your email, please check your inbox'),
                        null,
                        400
                    );
                }
                $response = $this->resetPasswordTokenRepo->delete($data['email']);
                if ($response->result != ResponseStatusEnum::SUCCESS)
                    return $response;


                $response = $this->userRepo->resetPassword($data['email'], Hash::make($data['new_password']));
                if ($response->result != ResponseStatusEnum::SUCCESS)
                    return $response;

                $response = $this->userRepo->deleteAllTokensOfUser($data['email']);
                if ($response->result != ResponseStatusEnum::SUCCESS)
                    return $response;

                $response = $this->userRepo->findByEmail($data['email']);
                if ($response->result != ResponseStatusEnum::SUCCESS)
                    return $response;

                $user = $response->data;
                $message = $user->role == null ?
                    'Your password was updated successfully, now please complete your registration by filling the required patient data' :
                    'Your password was updated successfully, you are now logged in';

                return new Response(
                    ResponseStatusEnum::SUCCESS,
                    Response::messageToArray($message),
                    $user->createToken('auth_token')->plainTextToken,
                );
            }
        );
    }
    public function logout(): Response
    {
        $response = $this->userRepo->logoutUser(Auth::user());
        if ($response->result != ResponseStatusEnum::SUCCESS)
            return $response;

        return new Response(
            ResponseStatusEnum::SUCCESS,
            Response::messageToArray('User logged-out successfully'),
        );
    }
}