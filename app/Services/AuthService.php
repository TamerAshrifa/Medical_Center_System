<?php

namespace App\Services;

use App\Enums\OtpTypeEnum;

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
        parent::__construct();
    }
    public function register(UserDTO $dto): Response
    {
        $user = $this->userRepo->create($dto);
        $response = $this->otpService->sendOtpToUser($dto->email, $user->id, OtpTypeEnum::REGISTER_VERIFY);
        if (!$response->did_succeed)
            return $response;

        return new Response(
            true,
            Response::messageToArray('OTP-Code was sent to ' . $user->email . ' successfully, please check your inbox'),
            null,
            201
        );

    }
    public function login(string $emailOrUsername, string $password): Response
    {
        $user = $this->userRepo->findByEmailOrUsername($emailOrUsername, false);

        if ($user == null || !Hash::check($password, $user->password)) {
            return new Response(
                false,
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
        if (!$response->did_succeed)
            return $response;

        if ($user->email_verified_at == null) {
            return new Response(
                false,
                Response::messageToArray('Wrong email or password; Or the email is not verified, if so then an OTP-Code was sent to your email, please check your inbox'),
                null,
                400
            );
        }
        return new Response(
            true,
            Response::messageToArray('OTP-Code was sent to ' . $user->email . ' successfully, please check your inbox'),
        );
    }
    public function forgotPassword(string $email): Response
    {
        $user = $this->userRepo->findByEmail($email, false);

        if ($user == null) {
            return new Response(
                true,
                Response::messageToArray('If the email exists, an OTP-Code was sent to it successfully, please check your inbox'),
            );
        }

        $this->otpService->sendOtpToUser($user->email, $user->id, OtpTypeEnum::FORGOT_PASSWORD);
        return new Response(
            true,
            Response::messageToArray('If the email exists, an OTP-Code was sent to it successfully, please check your inbox'),
        );
    }
    public function resetPassword(array $data): Response
    {
        $resetTokenRecord = $this->resetPasswordTokenRepo->find($data['email']);
        if ($resetTokenRecord == null || $resetTokenRecord->token != $data['reset_token']) {
            return new Response(
                false,
                Response::messageToArray('Invalid email or reset-token'),
                null,
                400
            );
        }

        try {
            return DB::transaction(
                function () use ($data, &$resetTokenRecord, &$response) {
                    if (Carbon::now()->gt(Carbon::parse($resetTokenRecord->created_at)->addMinutes(10))) {

                        if (!$this->resetPasswordTokenRepo->delete($data['email']))
                            throw new \LogicException('Fail to delete the reset-token, please try again');

                        $user = $this->userRepo->findByEmail($data['email']);

                        $response = $this->otpService->sendOtpToUser($user->email, $user->id, OtpTypeEnum::FORGOT_PASSWORD);
                        if (!$response->did_succeed)
                            throw new \LogicException('Fail to send OTP-Code, please try again');

                        return new Response(
                            false,
                            Response::messageToArray('Sorry, the reset-token has expired, a new OTP-Code was sent to your email, please check your inbox'),
                            null,
                            400
                        );
                    }
                    if (!$this->resetPasswordTokenRepo->delete($data['email']))
                        throw new \LogicException('Fail, please try again');

                    if (!$this->userRepo->resetPassword($data['email'], Hash::make($data['new_password'])))
                        throw new \LogicException('Failed to reset user password, please try again');

                    if (!$this->userRepo->deleteAllTokens($data['email']))
                        throw new \LogicException('Failed to delete user tokens, please try again');

                    $user = $this->userRepo->findByEmail($data['email']);

                    $message = $user->role == null ?
                        'Your password was updated successfully, now please complete your registration by filling the required patient data' :
                        'Your password was updated successfully, you are now logged in';

                    return new Response(
                        true,
                        Response::messageToArray($message),
                        $user->createToken('auth_token')->plainTextToken,
                    );
                }
            );
        } catch (\LogicException $e) {
            return new Response(
                false,
                Response::messageToArray($e->getMessage()),
                null,
                500
            );
        }

    }
    public function logout(): Response
    {
        if (!$this->userRepo->logout(Auth::id()))
            return new Response(
                false,
                Response::messageToArray('Failed to logout user'),
                null,
                500
            );

        return new Response(
            true,
            Response::messageToArray('User logged-out successfully'),
        );
    }
}