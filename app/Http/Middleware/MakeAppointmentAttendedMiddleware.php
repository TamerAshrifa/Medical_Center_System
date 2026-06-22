<?php

namespace App\Http\Middleware;

use App\Models\Appointment;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class MakeAppointmentAttendedMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (
            Appointment::where('id', $request->route('id'))->valueOrFail('doctor_id') !=
            Auth::user()->doctor->id
        )
            return response()->json([
                'result' => 'Fail',
                'message' => 'Doctors can\'t modify other doctors\' appointments',
            ], 403);

        return $next($request);
    }
}
