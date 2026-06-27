<?php

namespace App\Http\Middleware;

use App\Models\MedicalRecordAccess;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class DestroyMedicalRecordAccessMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $ownerPatientId = MedicalRecordAccess::where('id', $request->route('id'))->valueOrFail('patient_id');

        if (Auth::user()->patient->id != $ownerPatientId)
            return response()->json([
                'result' => 'Fail',
                'message' => 'Patients can\'t revoke other patients\' given access permissions',
            ], 403);

        return $next($request);
    }
}
