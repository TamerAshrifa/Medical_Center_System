<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthController\Req_forgotPassword;
use App\Http\Requests\AuthController\Req_Login;
use App\Http\Requests\AuthController\Req_Register;
use App\Http\Requests\AuthController\Req_resetPassword;
use App\Http\Requests\AuthController\Req_verifyOtp;
use App\Services\Serv_Otp;
use App\services\Serv_User;
use App\DTOs\Dto_User;
class AuthController extends Controller
{
    public function __construct(protected Serv_User $serv_User, protected Serv_Otp $serv_Otp)
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
    public function register(Req_Register $request)
    {
        return $this->serv_User->registerUser(Dto_User::fromRequest($request->validated()));
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
    public function verifyOtp(Req_verifyOtp $request)
    {
        return $this->serv_Otp->verifyOtp($request->email, $request->otp_code);
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
        return $this->serv_User->loginUser($request->email_or_username, $request->password);
    }

    /**
     * @unauthenticated
     * @responseFile 200 storage/responses/AuthController/forgotPassword_200_OK.json
     * @group Authentication APIs
     */
    public function forgotPassword(Req_forgotPassword $request)
    {
        return $this->serv_User->forgotPassword($request->email);
    }

    /**
     * @unauthenticated
     * @bodyParam password_confirmation string required Must be as same as the entered password.
     * @responseFile 200 storage/responses/AuthController/resetPassword_200_OK.json
     * @responseFile 400 storage/responses/AuthController/resetPassword_400_Bad_Request.json
     * @responseFile 400 storage/responses/AuthController/resetPassword_400_2_Bad_Request.json
     * @group Authentication APIs
     */
    public function resetPassword(Req_resetPassword $request)
    {
        return $this->serv_User->resetPassword($request->validated());
    }

    /**
     * @group Authentication APIs
     * @responseFile 200 storage/responses/AuthController/logout_200_OK.json
     */
    public function logout()//Request $request)
    {
        return $this->serv_User->logout();
    }
}
