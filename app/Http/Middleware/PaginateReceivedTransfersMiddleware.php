<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Enums\UserRoleEnum;
use Illuminate\Support\Facades\Auth;

class PaginateReceivedTransfersMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        if ($user->role == UserRoleEnum::DOCTOR)
            if ($user->doctor->id != $request->route('doctor_id'))
                return response()->json([
                    'result' => 'Fail',
                    'message' => 'Doctors can\'t see other doctors\' transfers',
                ], 403);
        return $next($request);
    }
}
