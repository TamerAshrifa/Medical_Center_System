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
        $patientId = Auth::id();
        $visitPatientId = Visit::where('id', $request->route('visit_id'))->valueOrFail('patient_id');
        if ($patientId != $visitPatientId)
            return response()->json([
                'result' => 'Fail',
                'message' => 'Sorry, You can\'t give access permission to a non-yours visit',
            ], 403);

        return $next($request);
    }
}
