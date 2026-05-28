<?php

namespace App\Enums;

enum En_OTP_Type: string
{
    case REGISTER_VERIFY = 'register_verify';
    case LOGIN_VERIFY = 'login_verify';
    case FORGOT_PASSWORD = 'forgot_password';
}
