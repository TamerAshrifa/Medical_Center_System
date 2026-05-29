<?php

namespace App\Services;

use App\Enums\En_OTP_Type;
use App\Mail\SendOtpMail;
use App\Models\Otp;
use App\Models\User;
use Carbon\Carbon;
use App\DTOs\Dto_User;
use App\Repositories\Interfaces\Repo_interface_User;
use DB;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class Serv_Otp
{
    public function __construct(protected Repo_interface_User $repo_User)
    {
    }
    public function sendOtpToUser(string $email, int $userId, En_OTP_Type $type): Otp
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
                return $otp;
            }
        );
    }
    private function _processRegisterVerify(User $user, Otp $otpRecord): JsonResponse
    {
        if ($user->email_verified_at != null) {
            $otpRecord->delete();
            return response()->json([
                'result' => 'Fail',
                'message' => 'Email is already verified, you can login'
            ], 400);
        }
        $user->update(['email_verified_at' => now()]);
        $otpRecord->delete();

        return response()->json([
            'result' => 'Success',
            'message' => 'Email verified successfully',
            'token' => $user->createToken('auth_token')->plainTextToken,
        ]);

    }
    private function _processLoginVerify(User $user, Otp $otpRecord): JsonResponse
    {
        $otpRecord->delete();

        return response()->json([
            'result' => 'Success',
            'message' => 'OTP-Code verified successfully, you are now logged in',
            'token' => $user->createToken('auth_token')->plainTextToken,
        ]);
    }
    private function _processForgotPasswordVerify(User $user, Otp $otpRecord): JsonResponse
    {
        $resetToken = Hash::make(bin2hex(random_bytes(32)));
        DB::table('password_reset_tokens')->insert([
            'email' => $user->email,
            'token' => $resetToken,
            'created_at' => now(),
        ]);
        $otpRecord->delete();
        return response()->json([
            'result' => 'Success',
            'message' => 'OTP-Code verified successfully, you can now reset your password',
            'reset_token' => $resetToken,
        ]);
    }
    public function verifyOtp(string $email, string $otpCode): JsonResponse
    {
        $otpRecord = Otp::where('email', $email)->first();

        if (
            blank($otpRecord) ||
            !Hash::check($otpCode, $otpRecord->otp_code)
        ) {
            return response()->json([
                'result' => 'Fail',
                'message' => 'Invalid email or OTP-Code'
            ], 400);
        }

        if (Carbon::now()->gt($otpRecord->expires_at)) {
            $otpRecord->delete();

            $user = User::where('email', $email)->first();
            $this->sendOtpToUser($email, $user->id, $otpRecord->type);

            return response()->json([
                'result' => 'Fail',
                'message' => 'Sorry, this OTP-Code has expired, a new one was sent to your email, please check your inbox',
            ], 400);
        }

        $user = User::where('email', $email)->first();

        switch ($otpRecord->type) {
            case En_OTP_Type::REGISTER_VERIFY:
                return $this->_processRegisterVerify($user, $otpRecord);
            case En_OTP_Type::LOGIN_VERIFY:
                return $this->_processLoginVerify($user, $otpRecord);
            case En_OTP_Type::FORGOT_PASSWORD:
                return $this->_processForgotPasswordVerify($user, $otpRecord);
            default:
                return $this->_processRegisterVerify($user, $otpRecord);
        }
    }
}