<?php

namespace App\Http\Middleware;

use App\Enums\UserRoleEnum;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class PaginateDoctorVisitsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        if ($user->role == UserRoleEnum::DOCTOR)
            if ($request->route('doctor_id') != $user->doctor->id)
                return response()->json([
                    'result' => 'Fail',
                    'message' => 'Doctors can\'t see other doctors\' visits',
                ], 403);

        return $next($request);
    }
}
