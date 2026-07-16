<?php

namespace App\Services;

use App\Enums\OtpTypeEnum;

use App\Enums\UserRoleEnum;
use App\GeneralClasses\Response;
use App\Mail\SendOtpMail;
use App\Models\Admin;
use App\Models\Otp;
use App\Models\User;
use Carbon\Carbon;
use App\Repositories\Interfaces\UserRepositoryInterface;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use function Illuminate\Support\now;

class OtpService extends Service
{
    public function __construct(protected UserRepositoryInterface $repo_User)
    {
    }
    public function sendOtpToUser(string $email, int $userId, OtpTypeEnum $type): Response
    {
        return DB::transaction(
            function () use ($email, $userId, $type) {
                Otp::where('user_id', $userId)->delete();
                Otp::where('email', $email)->delete();

                $otpCode = random_int(100000, 999999);
                $otpRecord = Otp::updateOrCreate(
                    [
                        'email' => $email
                    ],
                    [
                        'user_id' => $userId,
                        'otp_code' => hash_hmac('sha256', $otpCode, config('app.key')),
                        'type' => $type,
                        'expires_at' => Carbon::now()->addMinutes(10),
                    ]
                );
                Mail::to($email)->send(new SendOtpMail($otpCode));

                return new Response(
                    true,
                    null,
                    $otpRecord
                );
            }
        );
    }
    private function _processRegisterVerify(User $user, Otp $otpRecord): Response
    {
        if ($user->email_verified_at != null) {
            $otpRecord->delete();
            return new Response(
                false,
                Response::messageToArray('Email is already verified, you can login'),
                null,
                400
            );
        }
        $user->email_verified_at = now();
        $user->save();

        $otpRecord->delete();
        return new Response(
            true,
            Response::messageToArray('Email verified successfully'),
            $user->createToken('auth_token')->plainTextToken,
        );
    }
    private function _processLoginVerify(User $user, Otp $otpRecord): Response
    {
        $message = $user->role == null ?
            'OTP-Code verified successfully, now please complete your registration by filling the required patient data' :
            'OTP-Code verified successfully, you are now logged in';

        $otpRecord->delete();
        return new Response(
            true,
            Response::messageToArray($message),
            $user->createToken('auth_token')->plainTextToken,
        );
    }
    private function _processForgotPasswordVerify(User $user, Otp $otpRecord): Response
    {
        $resetToken = Hash::make(bin2hex(random_bytes(32)));
        DB::table('password_reset_tokens')->insert([
            'email' => $user->email,
            'token' => $resetToken,
            'created_at' => now(),
        ]);
        $otpRecord->delete();
        return new Response(
            true,
            Response::messageToArray('OTP-Code verified successfully, you can now reset your password'),
            $resetToken,
        );
    }
    public function verifyOtp(string $email, string $otpCode): Response
    {
        $otpRecord = Otp::where('email', $email)
            ->where('otp_code', hash_hmac('sha256', $otpCode, config('app.key')))
            ->first();
        $user = $this->repo_User->findByEmail($email, false);

        if ($otpRecord == null || $user == null) {
            return new Response(
                false,
                Response::messageToArray('Invalid email or OTP-Code'),
                null,
                400,
            );
        }

        if (Carbon::now()->gt($otpRecord->expires_at)) {
            $otpRecord->delete();

            $this->sendOtpToUser($email, $user->id, $otpRecord->type);
            return new Response(
                false,
                Response::messageToArray('Sorry, this OTP-Code has expired, a new one was sent to your email, please check your inbox'),
                null,
                400,
            );
        }

        if (
            ($user->role == UserRoleEnum::ADMIN &&
                !$user->admin->is_active) ||
            ($user->role == UserRoleEnum::DOCTOR &&
                !$user->doctor->is_active)
        )
            return new Response(
                false,
                Response::messageToArray('Sorry, your account is unactive, call the super admin'),
                null,
                403,
            );

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
