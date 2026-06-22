<?php

namespace App\Http\Middleware;

use App\Enums\UserRoleEnum;
use App\Models\Visit;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ShowVisitMiddleware
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
            $user->patient->id != Visit::findOrFail($request->route('id'), 'appointment_id')->appointment->patient_id
        )
            return response()->json([
                'result' => 'Fail',
                'message' => 'Patients can\'t see other patients\' visits',
            ], 403);

        if (
            $user->role == UserRoleEnum::DOCTOR &&
            $user->doctor->id != Visit::findOrFail($request->route('id'), 'appointment_id')->appointment->doctor_id
        )
            return response()->json([
                'result' => 'Fail',
                'message' => 'Doctors can\'t see other doctors\' visits',
            ], 403);

        return $next($request);
    }
}
