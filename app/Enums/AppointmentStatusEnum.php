<?php

namespace App\Enums;

enum AppointmentStatusEnum: string
{
    case PENDING = 'pending';
    case CANCELLED = 'cancelled';
    case CANCELLED_BY_DOCTOR = 'cancelled_by_doctor';
    case CANCELLED_BY_MEDICAL_CENTER = 'cancelled_by_medical_center';
    case MISSED = 'missed';
    case ATTENDED = 'attended';
}
