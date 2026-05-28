<?php

namespace App\Http\Controllers;

use App\Enums\En_OTP_Type;
use App\Http\Requests\AuthController\Req_Login;
use App\Http\Requests\AuthController\Req_Register;
use App\Models\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Mail\SendOtpMail;
use App\Models\Otp;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    private function _sendOtp(string $email, int $userId, En_OTP_Type $type): Otp
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
    /**
     * @unauthenticated
     * @group Authentication APIs
     * @bodyParam date_of_birth string required Must be a valid date. Example: 2004-06-14
     * @bodyParam password_confirmation string required Must be as same as the entered password.
     * @bodyParam phone string required Must be a valid phone number. Example: +963999999999
     * @responseFile 201 storage/responses/AuthController/register_201_Created.json
     */
    public function register(Req_Register $request)
    {
        return DB::transaction(
            function () use ($request) {
                $validatedData = $request->validated();
                if ($request->hasFile('photo'))
                    $validatedData['photo'] = $request->file('photo')->store('user_photos', 'public');
                $validatedData['created_at'] = now();

                $user = User::create($validatedData);
                unset($validatedData['created_at']);
                $validatedData['id'] = $user->id;

                $this->_sendOtp($validatedData['email'], $user->id, En_OTP_Type::REGISTER_VERIFY);

                return response()->json([
                    'result' => 'Success',
                    'message' => 'OTP-Code was sent to ' . $user->email . " successfully, please check your gmail",
                ], 201);
            }
        );
    }

    /**
     * @unauthenticated
     * @responseFile 200 storage/responses/AuthController/verifyOtp_200_OK.json
     * @responseFile 200 storage/responses/AuthController/verifyOtp_200_2_OK.json
     * @responseFile 400 storage/responses/AuthController/verifyOtp_400_Bad_Reqeust.json
     * @responseFile 400 storage/responses/AuthController/verifyOtp_400_2_Bad_Reqeust.json
     * @responseFile 400 storage/responses/AuthController/verifyOtp_400_3_Bad_Reqeust.json
     * @group Authentication APIs
     */
    public function verifyOtp(Request $request)
    {
        $validatedData = $request->validate([
            'email' => ['required', 'string', 'email', 'max:75', 'exists:otps,email'],
            'otp_code' => ['required'],
        ]);

        $otpRecord = Otp::where('email', $validatedData['email'])->first();

        if (
            blank($otpRecord) ||
            !Hash::check($validatedData['otp_code'], $otpRecord->otp_code)
        ) {
            return response()->json([
                'result' => 'Fail',
                'message' => 'Invalid OTP-Code'
            ], 400);
        }

        if (Carbon::now()->gt($otpRecord->expires_at)) {
            $otpRecord->delete();

            $user = User::where('email', $validatedData['email'])->first();
            $this->_sendOtp($validatedData['email'], $user->id, En_OTP_Type::REGISTER_VERIFY);

            return response()->json([
                'result' => 'Fail',
                'message' => 'Sorry, this OTP-Code has expired, a new one was sent to your email, please check your inbox',
            ], 400);
        }

        $user = User::where('email', $validatedData['email'])->first();

        switch ($otpRecord->type) {
            case En_OTP_Type::REGISTER_VERIFY:
                if ($user->email_verified_at != null) {
                    $otpRecord->delete();
                    return response()->json([
                        'result' => 'Fail',
                        'message' => 'Email is already verified, you can login'
                    ], 400);
                }
                $user->update(['email_verified_at' => now()]);
                break;

            case En_OTP_Type::LOGIN_VERIFY:
                break;

            case En_OTP_Type::FORGOT_PASSWORD:
                $resetToken = Hash::make(bin2hex(random_bytes(32)));
                DB::table('password_reset_tokens')->insert([
                    'email' => $validatedData['email'],
                    'token' => $resetToken,
                    'created_at' => now(),
                ]);
                $otpRecord->delete();
                return response()->json([
                    'result' => 'Success',
                    'message' => 'OTP-Code verified successfully, you can now reset your password',
                    'reset_token' => $resetToken,
                ]);

            default:
                break;
        }

        $otpRecord->delete();

        return response()->json([
            'result' => 'Success',
            'message' => 'Email verified successfully',
            'token' => $user->createToken('auth_token')->plainTextToken,
            'data' => $user,
        ]);
    }

    /**
     * @unauthenticated
     * @bodyParam password_confirmation string required Must be as same as the entered password.
     * @responseFile 200 storage/responses/AuthController/login_200_OK.json
     * @responseFile 401 storage/responses/AuthController/login_401_Unauthorized.json
     * @responseFile 403 storage/responses/AuthController/login_403_Forbidden.json
     * @group Authentication APIs
     */
    public function login(Req_Login $request)
    {
        $validatedData = $request->validated();

        $user = User::where('email', $validatedData['email_or_username'])
            ->orWhere('username', $validatedData['email_or_username'])->first();

        if (blank($user) || !Hash::check($validatedData['password'], $user->password)) {
            return response()->json([
                'result' => 'Fail',
                'message' => 'Wrong email or password',
            ], 401);
        }

        $otp = $this->_sendOtp($user->email, $user->id, En_OTP_Type::LOGIN_VERIFY);

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

    /**
     * @unauthenticated
     * @responseFile 200 storage/responses/AuthController/forgotPassword_200_OK.json
     * @group Authentication APIs
     */
    public function forgotPassword(Request $request)
    {
        $validatedData = $request->validate([
            "email" => ['required', 'string', 'email', 'max:75'],
        ]);

        $user = User::where('email', $validatedData['email'])->first(); // to throw ModelNotFoundException if email doesn't exist, so we don't send OTP in this case

        if (blank($user)) {
            return response()->json([
                'result' => 'Success',
                'message' => 'If the email exists, an OTP-Code was sent to it successfully, please check your gmail',
            ]);
        }

        $this->_sendOtp($validatedData['email'], $user->id, En_OTP_Type::FORGOT_PASSWORD);

        return response()->json([
            'result' => 'Success',
            'message' => 'If the email exists, an OTP-Code was sent to it successfully, please check your gmail',
        ]);
    }

    /**
     * @unauthenticated
     * @bodyParam password_confirmation string required Must be as same as the entered password.
     * @responseFile 200 storage/responses/AuthController/resetPassword_200_OK.json
     * @responseFile 400 storage/responses/AuthController/resetPassword_400_Bad_Request.json
     * @responseFile 400 storage/responses/AuthController/resetPassword_400_2_Bad_Request.json
     * @group Authentication APIs
     */
    public function resetPassword(Request $request)
    {
        $validatedData = $request->validate([
            "email" => ['required', 'string', 'email', 'max:75', 'exists:users,email', 'exists:password_reset_tokens,email'],
            "reset_token" => ['required'],
            "new_password" => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        return DB::transaction(
            function () use ($validatedData) {

                $resetTokenRecord = DB::table('password_reset_tokens')->where('email', $validatedData['email'])->first();

                if ($resetTokenRecord->token != $validatedData['reset_token']) {
                    return response()->json([
                        'result' => 'Fail',
                        'message' => 'Invalid reset-token',
                    ], 400);
                }


                if (Carbon::now()->gt(Carbon::parse($resetTokenRecord->created_at)->addMinutes(10))) {
                    DB::table('password_reset_tokens')->where('email', $validatedData['email'])->delete();

                    $user = User::where('email', $validatedData['email'])->first();
                    $this->_sendOtp($validatedData['email'], $user->id, En_OTP_Type::FORGOT_PASSWORD);

                    return response()->json([
                        'result' => 'Fail',
                        'message' => 'Sorry, the reset-token has expired, a new OTP-Code was sent to your email, please check your inbox',
                    ], 400);
                }

                DB::table('password_reset_tokens')->where('email', $validatedData['email'])
                    ->where('token', $validatedData['reset_token'])->delete();

                $user = User::where('email', $validatedData['email'])->first();
                $user->update(['password' => Hash::make($validatedData['new_password'])]);
                $user->tokens()->delete();

                return response()->json([
                    'result' => 'Success',
                    'message' => 'Your password was updated successfully',
                    'token' => $user->createToken('auth_token')->plainTextToken,
                    'data' => $user,
                ]);
            }
        );
    }

    /**
     * @group Authentication APIs
     * @responseFile 200 storage/responses/AuthController/logout_200_OK.json
     */
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response([
            'result' => 'Success',
            'message' => 'User logged-out successfully',
        ]);
    }
}
