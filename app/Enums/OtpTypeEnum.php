<?php

namespace App\Enums;

enum OtpTypeEnum: string
{
    case REGISTER_VERIFY = 'register_verify';
    case LOGIN_VERIFY = 'login_verify';
    case FORGOT_PASSWORD = 'forgot_password';
}
