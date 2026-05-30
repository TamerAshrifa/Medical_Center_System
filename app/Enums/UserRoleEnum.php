<?php

namespace App\Enums;

enum UserRoleEnum: string
{
    case PATIENT = 'patient';
    case DOCTOR = 'doctor';
    case ADMIN = 'admin';
}
