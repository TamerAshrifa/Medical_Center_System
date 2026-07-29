<?php

namespace App\Http\Middleware;

use App\Enums\UserRoleEnum;
use App\Models\DoctorSpeciality;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class DeleteDoctorSpecialityMiddleware
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
            if (
                $user->doctor->id !=
                DoctorSpeciality::where('id', $request->route('id'))->valueOrFail('doctor_id')
            )
                return response()->json([
                    'did_succeed' => false,
                    'message' => 'Doctors can\'t delete specialities of other doctors',
                ], 403);

        return $next($request);
    }
}
