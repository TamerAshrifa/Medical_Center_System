<?php

namespace App\Http\Middleware;

use App\Enums\UserRoleEnum;
use App\Models\Visit;
use App\Repositories\MedicalRecordAccessRepository;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ShowVisitMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $user = Auth::user();

        if (
            $user->role == UserRoleEnum::PATIENT &&
            $user->patient->id != Visit::findOrFail($request->route('id'), 'appointment_id')->appointment->patient_id
        )
            return response()->json([
                'result' => 'Fail',
                'message' => 'Patients can\'t see other patients\' visits',
            ], 403);

        if (
            $user->role == UserRoleEnum::DOCTOR &&
            !((new MedicalRecordAccessRepository())->hasAccess($request->route('id'), $user->doctor->id))
        )
            return response()->json([
                'result' => 'Fail',
                'message' => 'Sorry, You don\'t have access permission to this visit',
            ], 403);

        return $next($request);
    }
}
