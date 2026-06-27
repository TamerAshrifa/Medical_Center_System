<?php

namespace App\Http\Middleware;

use App\Enums\UserRoleEnum;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AllPatientComplaintsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        if (
            $user->role == UserRoleEnum::PATIENT &&
            $user->patient->id != $request->route('patient_id')
        )
            return response()->json([
                'result' => 'Fail',
                'message' => 'Patients can\'t see other patients\' complaints',
            ], 403);

        return $next($request);
    }
}
