<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class StoreTransferMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $refferingDoctorId = Auth::user()->doctor->id;
        if ($refferingDoctorId == $request->route('receiving_doctor_id')) {
            return response()->json([
                'did_succeed' => false,
                'message' => [
                    'base_message' => 'Doctor can\'t transfer a patient to itself (To the same reffering doctor)'
                ],
            ], 422);
        }

        return $next($request);
    }
}
