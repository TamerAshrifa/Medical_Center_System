<?php

namespace App\Http\Middleware;

use App\Enums\UserRoleEnum;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckDoctorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $doctor = Auth::user();
        if (!($doctor->role == UserRoleEnum::DOCTOR || $doctor->role == UserRoleEnum::ADMIN))
            return response()->json([
                'result' => 'Fail',
                'message' => 'Only doctors and admins allowed',
            ], 403);

        return $next($request);
    }
}
