<?php

namespace App\Http\Middleware;

use App\Enums\UserRoleEnum;
use App\Models\Visit;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UpdateVisitMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (
            Auth::user()->doctor->id !=
            Visit::findOrFail($request->route('id'), 'appointment_id')->appointment->doctor_id
        )
            return response()->json([
                'did_succeed' => false,
                'message' => 'Doctors can\'t modify other doctors\' visits',
            ], 403);

        return $next($request);
    }
}
