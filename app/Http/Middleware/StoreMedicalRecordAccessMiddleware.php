<?php

namespace App\Http\Middleware;

use App\Models\Visit;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class StoreMedicalRecordAccessMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $patientId = Auth::user()->patient->id;
        $visitPatientId = Visit::findOrFail($request->route('visit_id'))->appointment->patient_id;
        if ($patientId != $visitPatientId)
            return response()->json([
                'did_succeed' => false,
                'message' => 'Sorry, You can\'t give access permission to a non-yours visit',
            ], 403);

        return $next($request);
    }
}
