<?php

namespace App\Http\Middleware;

use App\Enums\UserRoleEnum;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckDoctorOnlyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $patient = Auth::user();

        if ($patient->role != UserRoleEnum::DOCTOR)
            return response()->json([
                'did_succeed' => false,
                'message' => 'Only Doctors allowed',
            ], 403);

        return $next($request);
    }
}
