<?php

namespace App\Http\Middleware;

use App\Enums\UserRoleEnum;
use App\Models\Appointment;
use App\Models\Visit;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class PaginatePatientVisitsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        if ($user->role == UserRoleEnum::PATIENT)
            if ($request->route('patient_id') != $user->patient->id)
                return response()->json([
                    'did_succeed' => false,
                    'message' => 'Patients can\'t see other patients\' visits',
                ], 403);

        return $next($request);
    }
}
