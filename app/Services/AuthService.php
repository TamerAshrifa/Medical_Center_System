<?php

namespace App\Services;

use App\Enums\OtpTypeEnum;
use App\GeneralClasses\Enums\ServiceResponseEnum;
use App\GeneralClasses\ServiceResponse;
use App\Repositories\Interfaces\ResetPasswordTokenRepositoryInterface;
use Carbon\Carbon;
use App\DTOs\UserDTO;
use App\Repositories\Interfaces\UserRepositoryInterface;

use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    public function __construct(
        protected UserRepositoryInterface $userRepo,
        protected OtpService $otpService,
        protected ResetPasswordTokenRepositoryInterface $resetPasswordTokenRepo
    ) {
    }
    public function registerUser(UserDTO $dtoUser): ServiceResponse
    {
        return DB::transaction(
            function () use ($dtoUser) {
                if ($dtoUser->photo != null)
                    $dtoUser->photo = $dtoUser->photo->store('user_photos', 'public');
                $user = $this->userRepo->create($dtoUser);

                $this->otpService->sendOtpToUser($dtoUser->email, $user->id, OtpTypeEnum::REGISTER_VERIFY);

                return new ServiceResponse(
                    ServiceResponseEnum::SUCCESS,
                    'OTP-Code was sent to ' . $user->email . " successfully, please check your inbox",
                    null,
                    201
                );
            }
        );
    }
    public function loginUser(string $email_or_username, string $password): ServiceResponse
    {
        $user = $this->userRepo->findByEmailOrUsername($email_or_username);

        if (blank($user) || !Hash::check($password, $user->password)) {
            return new ServiceResponse(
                ServiceResponseEnum::FAIL,
                'Wrong email or password',
                null,
                401
            );
        }

        $otp = $this->otpService->sendOtpToUser(
            $user->email,
            $user->id,
            ($user->email_verified_at != null) ? OtpTypeEnum::LOGIN_VERIFY : OtpTypeEnum::REGISTER_VERIFY,
        )->data;

        if ($user->email_verified_at == null) {
            return new ServiceResponse(
                ServiceResponseEnum::FAIL,
                'Email is not verified, OTP-Code was sent to your email, please check your inbox',
                null,
                403
            );
        }
        return new ServiceResponse(
            ServiceResponseEnum::SUCCESS,
            'OTP-Code was sent to ' . $user->email . ' successfully, please check your inbox',
        );
    }
    public function forgotPassword(string $email): ServiceResponse
    {
        $user = $this->userRepo->findByEmail($email);
        if (blank($user)) {
            return new ServiceResponse(
                ServiceResponseEnum::SUCCESS,
                'If the email exists, an OTP-Code was sent to it successfully, please check your inbox',
            );
        }

        $this->otpService->sendOtpToUser($user->email, $user->id, OtpTypeEnum::FORGOT_PASSWORD);
        return new ServiceResponse(
            ServiceResponseEnum::SUCCESS,
            'If the email exists, an OTP-Code was sent to it successfully, please check your inbox',
        );
    }
    public function resetPassword(array $data): ServiceResponse
    {
        return DB::transaction(
            function () use ($data) {
                $resetTokenRecord = $this->resetPasswordTokenRepo->findByEmail($data['email']);

                if ($resetTokenRecord == null || $resetTokenRecord->token != $data['reset_token']) {
                    return new ServiceResponse(
                        ServiceResponseEnum::FAIL,
                        'Invalid email or reset-token',
                        null,
                        400
                    );
                }

                if (Carbon::now()->gt(Carbon::parse($resetTokenRecord->created_at)->addMinutes(10))) {
                    $this->resetPasswordTokenRepo->delete($data['email']);

                    $user = $this->userRepo->findByEmail($data['email']);
                    $this->otpService->sendOtpToUser($user->email, $user->id, OtpTypeEnum::FORGOT_PASSWORD);
                    return new ServiceResponse(
                        ServiceResponseEnum::FAIL,
                        'Sorry, the reset-token has expired, a new OTP-Code was sent to your email, please check your inbox',
                        null,
                        400
                    );
                }

                $this->resetPasswordTokenRepo->delete($data['email']);
                $this->userRepo->resetPassword($data['email'], Hash::make($data['new_password']));
                $this->userRepo->deleteAllTokensOfUser($data['email']);
                $user = $this->userRepo->findByEmail($data['email']);
                return new ServiceResponse(
                    ServiceResponseEnum::SUCCESS,
                    'Your password was updated successfully',
                    $user->createToken('auth_token')->plainTextToken,
                );
            }
        );
    }
    public function logout(): ServiceResponse
    {
        Auth::user()->currentAccessToken()->delete();

        return new ServiceResponse(
            ServiceResponseEnum::SUCCESS,
            'User logged-out successfully',
        );
    }
}