<?php

namespace App\Enums;

enum PatientComplaintStatusEnum: string
{
    case NEW = 'new';
    case REVIEWED = 'reviewed';
}
