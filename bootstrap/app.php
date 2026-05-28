<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Exceptions\ThrottleRequestsException;
use Symfony\Component\Mailer\Exception\TransportException;
use Symfony\Component\Mime\Exception\RfcComplianceException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->render(function (AuthenticationException $e, $request) {
            return response()->json([
                'result' => 'Fail',
                'message' => 'Unauthenticated; A valid token is required',
            ], 401);
        });

        $exceptions->render(function (ThrottleRequestsException $e, $request) {
            $seconds = $e->getHeaders()['Retry-After'] ?? 60;
            return response()->json([
                'result' => 'Fail',
                'message' => ($seconds > 1) ? "Several incorrect attempts were made, please try again in $seconds seconds" :
                    'Several incorrect attempts were made, please try again after 1 second',
            ], 429);
        });

        $exceptions->render(function (TransportExceptioN $e, $request) {
            return response()->json([
                'result' => 'Fail',
                'message' => "No internet-connection to send the email",
            ], 503);
        });

        $exceptions->render(function (RfcComplianceException $e, $request) {
            return response()->json([
                'result' => 'Fail',
                'message' => "Invalid email format",
            ], 422);
        });

        $exceptions->render(function (MethodNotAllowedHttpException $e, $request) {
            return response()->json([
                'result' => 'Fail',
                'message' => 'HTTP request method not allowed, ' . $e->getMessage(),
            ], 405);
        });

    })->create();
