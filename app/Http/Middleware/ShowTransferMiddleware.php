<?php

namespace App\Http\Middleware;

use App\Enums\UserRoleEnum;
use App\Models\Transfer;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ShowTransferMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $transfer = Transfer::findOrFail($request->route('id'));
        $user = Auth::user();
        if (
            $user->role == UserRoleEnum::PATIENT &&
            $user->patient->id != $transfer->patient_id
        )
            return response()->json([
                'did_succeed' => false,
                'message' => 'Patients can\'t see other patients\' transfers',
            ], 403);

        if ($user->role == UserRoleEnum::DOCTOR) {
            $doctorId = $user->doctor->id;
            if (
                $doctorId != $transfer->referring_doctor_id &&
                $doctorId != $transfer->receiving_doctor_id
            )
                return response()->json([
                    'did_succeed' => false,
                    'message' => 'Doctors can\'t see other doctors\' transfers',
                ], 403);
        }

        return $next($request);
    }
}
