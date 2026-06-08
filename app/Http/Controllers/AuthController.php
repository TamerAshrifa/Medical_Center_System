<?php

namespace App\Http\Controllers;

use App\Enums\OtpTypeEnum;
use App\GeneralClasses\Enums\ResponseStatusEnum;
use App\Http\Requests\AuthController\ForgotPasswordRequest;
use App\Http\Requests\AuthController\LoginRequest;
use App\Http\Requests\AuthController\RegisterRequest;
use App\Http\Requests\AuthController\ResetPasswordRequest;
use App\Http\Requests\AuthController\VerifyOtpRequest;
use App\Models\Otp;
use App\Models\User;
use App\Repositories\Repository;
use App\Services\OtpService;
use App\services\AuthService;
use App\DTOs\User\UserDTO;
use Laravel\Sanctum\PersonalAccessToken;

/**
 * @group Authentication APIs
 * Any Patient wants to assign to the app, he needs firstly to register by 'register' API, then he goes to verify
 * his email by 'verifyOTP' API; After that, he goes to 'Add New Patient' API and the assign himself (specifically 
 * himself). Admins and doctors can't be added by themselves, they need to talk to an admin and then he makes 
 * acounts for them in the appropriate table and permissions; After an admin makes, they can login by 'login' API.
 */
class AuthController extends Controller
{
    public function __construct(
        protected AuthService $userService,
        protected OtpService $otpService
    ) {
    }

    /**
     * Register New User
     * 
     * ###For: Mobile (Patient)
     * @unauthenticated
     * @bodyParam date_of_birth string required Must be a valid date. Example: 2004-06-14
     * @bodyParam password_confirmation string required Must be as same as the entered password.
     * @bodyParam phone string required Must be a valid phone number. Example: +963999999999
     * @responseFile 201 storage/responses/AuthController/register_201_Created.json
     */
    public function register(RegisterRequest $request)
    {
        $userData = $request->validated();
        if (isset($userData['photo']))
            $userData['photo'] = $userData['photo']->store('user_photos', 'public');

        $response = $this->userService->registerUser(UserDTO::fromRequest($userData));

        return response()->json([
            'result' => $response->result,
            'message' => $response->message,
        ], $response->statusCode);
    }

    /**
     * Verify Sent OTP
     * 
     * ###For: Mobile (Patient - Doctor), Web
     * @unauthenticated
     * @responseFile 200 storage/responses/AuthController/verifyOtp_200_OK.json
     * @responseFile 200 storage/responses/AuthController/verifyOtp_200_2_OK.json
     * @responseFile 400 storage/responses/AuthController/verifyOtp_400_Bad_Reqeust.json
     * @responseFile 400 storage/responses/AuthController/verifyOtp_400_2_Bad_Reqeust.json
     * @responseFile 400 storage/responses/AuthController/verifyOtp_400_3_Bad_Reqeust.json
     */
    public function verifyOtp(VerifyOtpRequest $request)
    {
        //email
        $isForgetOtp = Otp::where('email', $request->email)
            ->where('otp_code', hash_hmac('sha256', $request->otp_code, config('app.key')))
            ->first();

        $isForgetOtp = $isForgetOtp == null ?
            false : $isForgetOtp->type == OtpTypeEnum::FORGOT_PASSWORD;

        $response = $this->otpService->verifyOtp($request->email, $request->otp_code);

        if ($response->result != ResponseStatusEnum::SUCCESS) {
            return response()->json([
                'result' => $response->result,
                'message' => $response->message,
            ], $response->statusCode);
        }

        if ($isForgetOtp)
            return response()->json([
                'result' => $response->result,
                'message' => $response->message,
                'user_id' => PersonalAccessToken::findToken($response->data)->tokenable->id,
                'reset_token' => $response->data,
            ], $response->statusCode);

        return response()->json([
            'result' => $response->result,
            'message' => $response->message,
            'user_id' => PersonalAccessToken::findToken($response->data)->tokenable->id,
            'token' => $response->data,
        ], $response->statusCode);



    }

    /**
     * Login User
     * 
     * ###For: Mobile (Patient - Doctor), Web
     * @unauthenticated
     * @responseFile 200 storage/responses/AuthController/login_200_OK.json
     * @responseFile 400 storage/responses/AuthController/login_400_Bad_Request.json
     */
    public function login(LoginRequest $request)
    {
        $response = $this->userService->loginUser($request->email_or_username, $request->password);

        return response()->json([
            'result' => $response->result,
            'message' => $response->message,
        ], $response->statusCode);
    }

    /**
     * Forgot Password
     * 
     * ###For: Mobile (Patient - Doctor), Web
     * @unauthenticated
     * @responseFile 200 storage/responses/AuthController/forgotPassword_200_OK.json
     */
    public function forgotPassword(ForgotPasswordRequest $request)
    {
        $response = $this->userService->forgotPassword($request->email);

        return response()->json([
            'result' => $response->result,
            'message' => $response->message,
        ], $response->statusCode);
    }

    /**
     * Reset Password 
     * 
     * ###For: Mobile (Patient - Doctor), Web
     * @unauthenticated
     * @bodyParam password_confirmation string required Must be as same as the entered password.
     * @responseFile 200 storage/responses/AuthController/resetPassword_200_OK.json
     * @responseFile 400 storage/responses/AuthController/resetPassword_400_Bad_Request.json
     * @responseFile 400 storage/responses/AuthController/resetPassword_400_2_Bad_Request.json
     */
    public function resetPassword(ResetPasswordRequest $request)
    {
        $response = $this->userService->resetPassword($request->validated());
        if ($response->result == ResponseStatusEnum::SUCCESS)
            return response()->json([
                'result' => $response->result,
                'message' => $response->message,
                'user_id' => PersonalAccessToken::findToken($response->data)->tokenable->id,
                'token' => $response->data,
            ], $response->statusCode);
        return response()->json([
            'result' => $response->result,
            'message' => $response->message,
        ], $response->statusCode);
    }

    /**
     * Logout User
     * 
     * ###For: Mobile (Patient - Doctor), Web
     * @responseFile 200 storage/responses/AuthController/logout_200_OK.json
     */
    public function logout()
    {
        $response = $this->userService->logout();
        return response()->json([
            'result' => $response->result,
            'message' => $response->message,
        ], $response->statusCode);
    }
}
