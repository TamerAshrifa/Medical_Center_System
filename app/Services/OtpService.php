<?php

namespace App\Services;

use App\Enums\OtpTypeEnum;
use App\GeneralClasses\Enums\ServiceResponseEnum;
use App\GeneralClasses\ServiceResponse;
use App\Mail\SendOtpMail;
use App\Models\Otp;
use App\Models\User;
use Carbon\Carbon;
use App\Repositories\Interfaces\UserRepositoryInterface;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class OtpService
{
    public function __construct(protected UserRepositoryInterface $repo_User)
    {
    }
    public function sendOtpToUser(string $email, int $userId, OtpTypeEnum $type): ServiceResponse
    {
        return DB::transaction(
            function () use ($email, $userId, $type) {
                Otp::where('user_id', $userId)->delete();
                Otp::where('email', $email)->delete();

                $otpCode = random_int(100000, 999999);
                $otp = Otp::updateOrCreate(
                    [
                        'email' => $email
                    ],
                    [
                        'user_id' => $userId,
                        'otp_code' => Hash::make($otpCode),
                        'type' => $type,
                        'expires_at' => Carbon::now()->addMinutes(10),
                    ]
                );
                Mail::to($email)->send(new SendOtpMail($otpCode));

                return new ServiceResponse(
                    ServiceResponseEnum::SUCCESS,
                    null,
                    $otp
                );
            }
        );
    }
    private function _processRegisterVerify(User $user, Otp $otpRecord): ServiceResponse
    {
        if ($user->email_verified_at != null) {
            $otpRecord->delete();
            return new ServiceResponse(
                ServiceResponseEnum::FAIL,
                'Email is already verified, you can login',
                null,
                400
            );
        }
        $user->update(['email_verified_at' => now()]);
        $otpRecord->delete();
        return new ServiceResponse(
            ServiceResponseEnum::SUCCESS,
            'Email verified successfully',
            $user->createToken('auth_token')->plainTextToken
        );
    }
    private function _processLoginVerify(User $user, Otp $otpRecord): ServiceResponse
    {
        $otpRecord->delete();
        return new ServiceResponse(
            ServiceResponseEnum::SUCCESS,
            'OTP-Code verified successfully, you are now logged in',
            $user->createToken('auth_token')->plainTextToken,
        );
    }
    private function _processForgotPasswordVerify(User $user, Otp $otpRecord): ServiceResponse
    {
        $resetToken = Hash::make(bin2hex(random_bytes(32)));
        DB::table('password_reset_tokens')->insert([
            'email' => $user->email,
            'token' => $resetToken,
            'created_at' => now(),
        ]);
        $otpRecord->delete();
        return new ServiceResponse(
            ServiceResponseEnum::SUCCESS,
            'OTP-Code verified successfully, you can now reset your password',
            $resetToken,
        );
    }
    public function verifyOtp(string $email, string $otpCode): ServiceResponse
    {
        $otpRecord = Otp::where('email', $email)->first();

        if (
            blank($otpRecord) ||
            !Hash::check($otpCode, $otpRecord->otp_code)
        ) {
            return new ServiceResponse(
                ServiceResponseEnum::FAIL,
                'Invalid email or OTP-Code',
                null,
                400,
            );
        }

        if (Carbon::now()->gt($otpRecord->expires_at)) {
            $otpRecord->delete();

            $user = $this->repo_User->findByEmail($email);

            if ($user == null)
                return new ServiceResponse(
                    ServiceResponseEnum::FAIL,
                    'Invalid email or OTP-Code',
                    null,
                    400,
                );
            $this->sendOtpToUser($email, $user->id, $otpRecord->type);
            return new ServiceResponse(
                ServiceResponseEnum::FAIL,
                'Sorry, this OTP-Code has expired, a new one was sent to your email, please check your inbox',
                null,
                400,
            );
        }
        $user = $this->repo_User->findByEmail($email);

        switch ($otpRecord->type) {
            case OtpTypeEnum::REGISTER_VERIFY:
                return $this->_processRegisterVerify($user, $otpRecord);
            case OtpTypeEnum::LOGIN_VERIFY:
                return $this->_processLoginVerify($user, $otpRecord);
            case OtpTypeEnum::FORGOT_PASSWORD:
                return $this->_processForgotPasswordVerify($user, $otpRecord);
            default:
                return $this->_processRegisterVerify($user, $otpRecord);
        }
    }
}