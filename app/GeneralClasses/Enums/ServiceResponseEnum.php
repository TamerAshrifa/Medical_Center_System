<?php

namespace App\GeneralClasses\Enums;

enum ServiceResponseEnum: string
{
    case SUCCESS = 'success';
    case FAIL = 'fail';
    case NOTHING = 'nothing';
}
