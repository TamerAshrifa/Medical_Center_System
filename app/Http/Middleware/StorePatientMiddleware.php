<?php

namespace App\Http\Middleware;

use App\Enums\UserRoleEnum;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class StorePatientMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $loggedUser = Auth::user();
        if (!($loggedUser->role == null || $loggedUser->role == UserRoleEnum::ADMIN)) {
            return response()->json([
                'result' => 'Fail',
                'message' => 'Only admins and patients (to themselves) allowed',
            ], 403);
        }

        if ($loggedUser->role == null && $loggedUser->id != $request->user_id) {
            return response()->json([
                'result' => 'Fail',
                'message' => 'Patients can only add themselves',
            ], 403);
        }

        return $next($request);
    }
}
