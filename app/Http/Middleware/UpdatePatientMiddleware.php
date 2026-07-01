<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Controller;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UpdatePatientMiddleware
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
        $loggedUser = Auth::user();
        if ($loggedUser->patient->id != $request->route('id')) {
            return $this->controller->jsonResponse(new \App\GeneralClasses\Response(
                false,
                \App\GeneralClasses\Response::messageToArray('Patients can\'t update other patients information'),
                null,
                403
            ));
        }

        return $next($request);
    }
}
