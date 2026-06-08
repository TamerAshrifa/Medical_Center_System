<?php

namespace App\Http\Controllers;

use App\Enums\UserRoleEnum;
use Illuminate\Support\Facades\Auth;

abstract class Controller
{
    public function getCurrentUserRole(): UserRoleEnum|null
    {
        return Auth::user()->role;
    }
}
