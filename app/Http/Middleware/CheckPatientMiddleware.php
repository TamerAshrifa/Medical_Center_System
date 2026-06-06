<?php

namespace App\Http\Middleware;

use App\Enums\UserRoleEnum;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Laravel\Sanctum\PersonalAccessToken;

class CheckPatientMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $patient = Auth::user();

        if (!($patient->role == UserRoleEnum::PATIENT || $patient->role == UserRoleEnum::ADMIN))
            return response()->json([
                'result' => 'Fail',
                'message' => 'Only patients and admins allowed',
            ], 403);

        return $next($request);
    }
}