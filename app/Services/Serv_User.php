<?php

namespace App\Services;

use App\Enums\En_OTP_Type;
use App\Mail\SendOtpMail;
use App\Models\Otp;
use App\Models\User;
use App\Repositories\Interfaces\Repo_interface_ResetPasswordToken;
use Carbon\Carbon;
use App\DTOs\Dto_User;
use App\Repositories\Interfaces\Repo_interface_User;
use App\Repositories\Repo_ResetPasswordToken;

use DB;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class Serv_User
{
    public function __construct(
        protected Repo_interface_User $repo_User,
        protected Serv_Otp $serv_Otp,
        protected Repo_interface_ResetPasswordToken $repo_ResetPasswordToken
    ) {
    }
    public function registerUser(Dto_User $dtoUser): JsonResponse
    {
        return DB::transaction(
            function () use ($dtoUser) {

                $user = $this->repo_User->create($dtoUser);

                $this->serv_Otp->sendOtpToUser($dtoUser->email, $user->id, En_OTP_Type::REGISTER_VERIFY);

                return response()->json([
                    'result' => 'Success',
                    'message' => 'OTP-Code was sent to ' . $user->email . " successfully, please check your gmail",
                ], 201);
            }
        );
    }
    public function loginUser(string $email_or_username, string $password): JsonResponse
    {
        $user = $this->repo_User->findByEmailOrUsername($email_or_username);

        if (blank($user) || !Hash::check($password, $user->password)) {
            return response()->json([
                'result' => 'Fail',
                'message' => 'Wrong email or password',
            ], 401);
        }

        $otp = $this->serv_Otp->sendOtpToUser($user->email, $user->id, En_OTP_Type::LOGIN_VERIFY);

        if ($user->email_verified_at == null) {
            $otp->update(['type' => En_OTP_Type::REGISTER_VERIFY]);
            return response()->json([
                'result' => 'Fail',
                'message' => 'Email is not verified, OTP-Code was sent to your email, please check your inbox',
            ], 403);
        }

        return response()->json([
            'result' => 'Success',
            'message' => 'OTP-Code was sent to ' . $user->email . ' successfully, please check your inbox',
        ]);
    }
    public function forgotPassword(string $email)
    {
        $user = $this->repo_User->findByEmail($email);
        if (blank($user)) {
            return response()->json([
                'result' => 'Success',
                'message' => 'If the email exists, an OTP-Code was sent to it successfully, please check your gmail',
            ]);
        }

        $this->serv_Otp->sendOtpToUser($user->email, $user->id, En_OTP_Type::FORGOT_PASSWORD);
        return response()->json([
            'result' => 'Success',
            'message' => 'If the email exists, an OTP-Code was sent to it successfully, please check your gmail',
        ]);
    }
    public function resetPassword(array $data)
    {
        return DB::transaction(
            function () use ($data) {
                $resetTokenRecord = $this->repo_ResetPasswordToken->findByEmail($data['email']);

                if ($resetTokenRecord == null || $resetTokenRecord->token != $data['reset_token']) {
                    return response()->json([
                        'result' => 'Fail',
                        'message' => 'Invalid email or reset-token',
                    ], 400);
                }

                if (Carbon::now()->gt(Carbon::parse($resetTokenRecord->created_at)->addMinutes(10))) {
                    $this->repo_ResetPasswordToken->delete($data['email']);

                    $user = $this->repo_User->findByEmail($data['email']);
                    $this->serv_Otp->sendOtpToUser($user->email, $user->id, En_OTP_Type::FORGOT_PASSWORD);

                    return response()->json([
                        'result' => 'Fail',
                        'message' => 'Sorry, the reset-token has expired, a new OTP-Code was sent to your email, please check your inbox',
                    ], 400);
                }

                $this->repo_ResetPasswordToken->delete($data['email']);
                $this->repo_User->resetPassword($data['email'], Hash::make($data['new_password']));
                $this->repo_User->deleteAllTokensOfUser($data['email']);
                $user = $this->repo_User->findByEmail($data['email']);
                return response()->json([
                    'result' => 'Success',
                    'message' => 'Your password was updated successfully',
                    'token' => $user->createToken('auth_token')->plainTextToken,
                ]);
            }
        );
    }
    public function logout(): JsonResponse
    {
        Auth::user()->currentAccessToken()->delete();
        return response()->json([
            'result' => 'Success',
            'message' => 'User logged-out successfully',
        ]);
    }
}