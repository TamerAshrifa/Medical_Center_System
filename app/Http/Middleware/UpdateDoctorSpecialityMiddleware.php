<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\DoctorSpecialityRepositoryInterface;
use App\Services\DoctorSpecialityService;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UpdateDoctorSpecialityMiddleware
{
    public function __construct(
        protected DoctorSpecialityRepositoryInterface $doctorSpecialityRepository,
        protected Controller $controller,
    ) {
    }

    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::user()->doctor->id != $this->doctorSpecialityRepository->find($request->route('id'))->doctor_id) {
            return $this->controller->jsonResponse(new \App\GeneralClasses\Response(
                false,
                \App\GeneralClasses\Response::messageToArray('Doctors can only edit their own specialities'),
                null,
                403
            ));
        }
        return $next($request);
    }
}
