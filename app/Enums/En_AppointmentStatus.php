<?php

namespace App\Enums;

enum En_AppointmentStatus: string
{
    case PENDING = 'pending';
    case CANCELLED = 'cancelled';
    case MISSED = 'missed';
    case ATTENDED = 'attended';
}
