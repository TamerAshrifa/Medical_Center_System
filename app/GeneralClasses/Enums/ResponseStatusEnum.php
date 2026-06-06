<?php

namespace App\GeneralClasses\Enums;

enum ResponseStatusEnum: string
{
    case SUCCESS = 'Success';
    case FAIL = 'Fail';
    case NOTHING = 'Nothing';
}
