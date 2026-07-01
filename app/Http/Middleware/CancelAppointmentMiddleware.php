<?php

namespace App\Http\Middleware;

use App\Enums\UserRoleEnum;
use App\Models\Appointment;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CancelAppointmentMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (
            Appointment::where('id', $request->route('id'))->valueOrFail('patient_id') !=
            Auth::user()->patient->id
        )
            return response()->json([
                'did_succeed' => false,
                'message' => 'Patients can\'t cancel other patients\' appointments',
            ], 403);

        return $next($request);
    }
}
