<?php

namespace App\Enums;

enum En_Role: string
{
    case PATIENT = 'patient';
    case DOCTOR = 'doctor';
    case ADMIN = 'admin';
}
