<?php

namespace App\Http\Middleware;

use App\Enums\UserRoleEnum;
use App\Models\Appointment;
use App\Models\Visit;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class PaginateVisitMedicalRecordAccessesMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        // ID of patient who attended the visit
        $makerPatientId = Visit::findOrFail($request->route('visit_id'))->appointment->patient_id;

        if ($user->role == UserRoleEnum::PATIENT)
            if ($user->patient->id != $makerPatientId)
                return response()->json([
                    'result' => 'Fail',
                    'message' => 'Patients can\'t see other patients\' visits\' given permessions',
                ], 403);

        return $next($request);
    }
}
