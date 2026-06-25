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

        $appointmentId = Visit::where('id', $request->route('visit_id'))->valueOrFail('appointement_id');
        $appointmentOfVisit = Appointment::where('id', $appointmentId)->firstOrFail(['patient_id', 'doctor_id']);

        if ($user->role == UserRoleEnum::PATIENT)
            if ($appointmentOfVisit->patient_id != $user->patient->id)
                return response()->json([
                    'result' => 'Fail',
                    'message' => 'Patients can\'t see other patients\' visits\' given permessions',
                ], 403);

        if ($user->role == UserRoleEnum::DOCTOR) {
            if ($appointmentOfVisit->doctor_id != $user->patient->id)
                return response()->json([
                    'result' => 'Fail',
                    'message' => 'Doctors can\'t see other doctors\' visit\' access permissions',
                ], 403);

            $request->route()->setParameter('with_unactive', false);
        }

        return $next($request);
    }
}
