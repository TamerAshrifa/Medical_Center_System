<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Controller;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UpdateDoctorMiddleware
{
    public function __construct(
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
        if (Auth::user()->doctor->id != $request->route('doctor_id')) {
            return $this->controller->jsonResponse(new \App\GeneralClasses\Response(
                false,
                \App\GeneralClasses\Response::messageToArray('Doctors can\'t update other doctors information'),
                null,
                403
            ));
        }

        return $next($request);
    }
}
