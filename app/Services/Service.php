<?php

namespace App\Services;

use App\Enums\UserRoleEnum;
use Illuminate\Support\Facades\Auth;

abstract class Service
{
    public function __construct(
    ) {
    }

    public function getCurrentUserRole(): UserRoleEnum|null
    {
        return Auth::user()->role;
    }

}