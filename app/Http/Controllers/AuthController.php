<?php

namespace App\Http\Controllers;

use App\Enums\OtpTypeEnum;
use App\Enums\UserRoleEnum;
use App\Http\Requests\AuthController\ForgotPasswordRequest;
use App\Http\Requests\AuthController\LoginRequest;
use App\Http\Requests\AuthController\RegisterRequest;
use App\Http\Requests\AuthController\ResetPasswordRequest;
use App\Http\Requests\AuthController\VerifyOtpRequest;
use App\Http\Resources\User\UserToAdminResource;
use App\Http\Resources\User\UserToDoctorResource;
use App\Http\Resources\User\UserToPatientResource;
use App\Models\Otp;
use App\Models\User;
use App\Services\OtpService;
use App\Services\AuthService;
use App\DTOs\User\UserDTO;

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

    private function resource($record)
    {
        switch ($record->role) {
            case UserRoleEnum::ADMIN:
                return new UserToAdminResource($record);
            case UserRoleEnum::DOCTOR:
                return new UserToDoctorResource($record);
            case UserRoleEnum::PATIENT:
                return new UserToPatientResource($record);
            case null:
                return new UserToPatientResource($record);
        }
    }


    /**
     * Register New User
     * 
     * ###For: Mobile (Patient)
     * @unauthenticated
     * @bodyParam date_of_birth string required Must be a valid date. Example: 2004-06-14
     * @bodyParam password_confirmation string required Must be as same as the entered password.
     * @bodyParam phone string required Must be a valid phone number. Example: +963999999999
     */
    public function register(RegisterRequest $request)
    {
        $userData = $request->validated();
        if (isset($userData['photo'])) {
            $userData['photo'] = $userData['photo']->store('user_photos', 'public');
            $userData['photo'] = 'storage/' . $userData['photo'];
        }

        $response = $this->userService->register(UserDTO::fromRequest($userData));

        return $this->jsonResponse($response);
    }

    /**
     * Verify Sent OTP
     * 
     * ###For: Mobile (Patient - Doctor), Web
     * @unauthenticated
     */
    public function verifyOtp(VerifyOtpRequest $request)
    {
        $isForgetOtp = Otp::where('email', $request->email)
            ->where('otp_code', hash_hmac('sha256', $request->otp_code, config('app.key')))
            ->first();

        $isForgetOtp = $isForgetOtp == null ?
            false : $isForgetOtp->type == OtpTypeEnum::FORGOT_PASSWORD;

        $response = $this->otpService->verifyOtp($request->email, $request->otp_code);

        if (!$response->did_succeed)
            return $this->jsonResponse($response);

        $response->data['user'] = $this->resource($response->data['user']);
        if ($isForgetOtp)
            return response()->json([
                'did_succeed' => $response->did_succeed,
                'message' => $response->message,
                'reset_token_and_user' => $response->data,
            ], $response->statusCode);

        return response()->json([
            'did_succeed' => $response->did_succeed,
            'message' => $response->message,
            'token_and_user' => $response->data,
        ], $response->statusCode);
    }

    /**
     * Login User
     * 
     * ###For: Mobile (Patient - Doctor), Web
     * @unauthenticated
     */
    public function login(LoginRequest $request)
    {
        $response = $this->userService->login($request->email_or_username, $request->password);
        return $this->jsonResponse($response);
    }

    /**
     * Forgot Password
     * 
     * ###For: Mobile (Patient - Doctor), Web
     * @unauthenticated
     */
    public function forgotPassword(ForgotPasswordRequest $request)
    {
        $response = $this->userService->forgotPassword($request->email);
        return $this->jsonResponse($response);
    }

    /**
     * Reset Password 
     * 
     * ###For: Mobile (Patient - Doctor), Web
     * @unauthenticated
     * @bodyParam password_confirmation string required Must be as same as the entered password.
     */
    public function resetPassword(ResetPasswordRequest $request)
    {
        $response = $this->userService->resetPassword($request->validated());
        if (!$response->did_succeed)
            return $this->jsonResponse($response);

        $response->data['user'] = $this->resource($response->data['user']);

        return response()->json([
            'did_succeed' => $response->did_succeed,
            'message' => $response->message,
            'token_and_user' => $response->data,
        ], $response->statusCode);
    }

    /**
     * Logout User
     * 
     * ###For: Mobile (Patient - Doctor), Web
     */
    public function logout()
    {
        $response = $this->userService->logout();
        return $this->jsonResponse($response);
    }
}
