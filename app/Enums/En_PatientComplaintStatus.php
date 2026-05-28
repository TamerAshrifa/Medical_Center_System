<?php

namespace App\Enums;

enum En_PatientComplaintStatus: string
{
    case NEW = 'new';
    case REVIEWED = 'reviewed';
}
