<?php

namespace App\Http\Middleware;

use App\Models\Transfer;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class MakeAnotherAppointmentForTransferMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $ownerPatientId = Transfer::where('id', $request->route('transfer_id'))->valueOrFail('patient_id');
        if (Auth::user()->patient->id != $ownerPatientId)
            return response()->json([
                'did_succeed' => false,
                'message' => 'Patients can\'t make appointments for other patients\' transfers',
            ], 403);

        return $next($request);
    }
}
