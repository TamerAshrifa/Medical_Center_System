<?php

namespace App\Http\Middleware;

use App\Enums\UserRoleEnum;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\JsonResponse;

class ShowAppointmentMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);
        if ($response instanceof JsonResponse && $response->getStatusCode() == 200) {
            $user = Auth::user();
            $data = $response->getData(true); // array
            if ($user->role == UserRoleEnum::PATIENT && $user->patient->id != ($data['data'])['patient_id'])
                return response()->json([
                    'result' => 'Fail',
                    'message' => 'Patients can\'t see other patients\' appointments',
                ], 403);
            else if ($user->role == UserRoleEnum::DOCTOR && $user->doctor->id != ($data['data'])['doctor_id'])
                return response()->json([
                    'result' => 'Fail',
                    'message' => 'Doctors can\'t see other doctors\' appointments',
                ], 403);
            if (array_key_exists('patient_id', $data['data']))
                unset(($data['data'])['patient_id']);
            if (array_key_exists('doctor_id', $data['data']))
                unset(($data['data'])['doctor_id']);
            $response->setData($data);
        }

        return $response;
    }
}
