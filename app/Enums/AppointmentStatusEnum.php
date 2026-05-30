<?php

namespace App\Enums;

enum AppointmentStatusEnum: string
{
    case PENDING = 'pending';
    case CANCELLED = 'cancelled';
    case MISSED = 'missed';
    case ATTENDED = 'attended';
}
