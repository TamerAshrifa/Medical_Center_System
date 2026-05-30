<?php

namespace App\Http\Controllers;

use App\GeneralClasses\Enums\ServiceResponseEnum;
use App\Http\Requests\AuthController\forgotPasswordRequest;
use App\Http\Requests\AuthController\loginRequest;
use App\Http\Requests\AuthController\registerRequest;
use App\Http\Requests\AuthController\resetPasswordRequest;
use App\Http\Requests\AuthController\verifyOtpRequest;
use App\Services\OtpService;
use App\services\AuthService;
use App\DTOs\UserDTO;
class AuthController extends Controller
{
    public function __construct(protected AuthService $userService, protected OtpService $otpService)
    {
    }

    /**
     * @unauthenticated
     * @group Authentication APIs
     * @bodyParam date_of_birth string required Must be a valid date. Example: 2004-06-14
     * @bodyParam password_confirmation string required Must be as same as the entered password.
     * @bodyParam phone string required Must be a valid phone number. Example: +963999999999
     * @responseFile 201 storage/responses/AuthController/register_201_Created.json
     */
    public function register(registerRequest $request)
    {
        $response = $this->userService->registerUser(UserDTO::fromRequest($request->validated()));

        return response()->json([
            'result' => $response->result,
            'message' => $response->message,
        ], $response->statusCode);
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
    public function verifyOtp(verifyOtpRequest $request)
    {
        $response = $this->otpService->verifyOtp($request->email, $request->otp_code);

        if ($response->result == ServiceResponseEnum::SUCCESS)
            return response()->json([
                'result' => $response->result,
                'message' => $response->message,
                'token_or_reset_token' => $response->data,
            ], $response->statusCode);

        return response()->json([
            'result' => $response->result,
            'message' => $response->message,
        ], $response->statusCode);
    }

    /**
     * @unauthenticated
     * @responseFile 200 storage/responses/AuthController/login_200_OK.json
     * @responseFile 401 storage/responses/AuthController/login_401_Unauthorized.json
     * @responseFile 403 storage/responses/AuthController/login_403_Forbidden.json
     * @group Authentication APIs
     */
    public function login(loginRequest $request)
    {
        $response = $this->userService->loginUser($request->email_or_username, $request->password);

        return response()->json([
            'result' => $response->result,
            'message' => $response->message,
        ], $response->statusCode);
    }

    /**
     * @unauthenticated
     * @responseFile 200 storage/responses/AuthController/forgotPassword_200_OK.json
     * @group Authentication APIs
     */
    public function forgotPassword(forgotPasswordRequest $request)
    {
        $response = $this->userService->forgotPassword($request->email);

        return response()->json([
            'result' => $response->result,
            'message' => $response->message,
        ], $response->statusCode);
    }

    /**
     * @unauthenticated
     * @bodyParam password_confirmation string required Must be as same as the entered password.
     * @responseFile 200 storage/responses/AuthController/resetPassword_200_OK.json
     * @responseFile 400 storage/responses/AuthController/resetPassword_400_Bad_Request.json
     * @responseFile 400 storage/responses/AuthController/resetPassword_400_2_Bad_Request.json
     * @group Authentication APIs
     */
    public function resetPassword(resetPasswordRequest $request)
    {
        $response = $this->userService->resetPassword($request->validated());
        if ($response->result == ServiceResponseEnum::SUCCESS)
            return response()->json([
                'result' => $response->result,
                'message' => $response->message,
                'token' => $response->data,
            ], $response->statusCode);
        return response()->json([
            'result' => $response->result,
            'message' => $response->message,
        ], $response->statusCode);
    }

    /**
     * @group Authentication APIs
     * @responseFile 200 storage/responses/AuthController/logout_200_OK.json
     */
    public function logout()//Request $request)
    {
        $response = $this->userService->logout();
        return response()->json([
            'result' => $response->result,
            'message' => $response->message,
        ], $response->statusCode);
    }
}
