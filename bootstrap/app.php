<?php

use App\Http\Middleware\AllPatientComplaintsMiddleware;
use App\Http\Middleware\AllPatientTransfersMiddleware;
use App\Http\Middleware\CancelAppointmentMiddleware;
use App\Http\Middleware\CheckAdminMiddleware;
use App\Http\Middleware\CheckDoctorMiddleware;
use App\Http\Middleware\CheckDoctorOnlyMiddleware;
use App\Http\Middleware\CheckPatientOnlyMiddleware;
use App\Http\Middleware\DestroyMedicalRecordAccessMiddleware;
use App\Http\Middleware\MakeAnotherAppointmentForTransferMiddleware;
use App\Http\Middleware\MakeAppointmentAttendedMiddleware;
use App\Http\Middleware\MakeAppointmentForTransferMiddleware;
use App\Http\Middleware\MakeAppointmentMissedMiddleware;
use App\Http\Middleware\PaginateDoctorAppointmentsMiddleware;
use App\Http\Middleware\PaginateDoctorMedicalRecordAccessesMiddleware;
use App\Http\Middleware\PaginateDoctorUnavailabilitiesMiddleware;
use App\Http\Middleware\PaginatePatientMedicalRecordAccessesMiddleware;
use App\Http\Middleware\PaginateDoctorVisitsMiddleware;
use App\Http\Middleware\PaginateDoctorWorkSchedulesMiddleware;
use App\Http\Middleware\PaginatePatientAppointments;
use App\Http\Middleware\PaginatePatientVisitsMiddleware;
use App\Http\Middleware\PaginateReceivedTransfersMiddleware;
use App\Http\Middleware\PaginateReferredTransfersMiddleware;
use App\Http\Middleware\PaginateVisitMedicalRecordAccessesMiddleware;
use App\Http\Middleware\ShowAppointmentMiddleware;
use App\Http\Middleware\ShowPatientComplaintMiddleware;
use App\Http\Middleware\ShowTransferMiddleware;
use App\Http\Middleware\ShowVisitMiddleware;
use App\Http\Middleware\StoreMedicalRecordAccessMiddleware;
use App\Http\Middleware\StorePatientMiddleware;
use App\Http\Middleware\StoreTransferMiddleware;
use App\Http\Middleware\UpdateVisitMiddleware;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Exceptions\ThrottleRequestsException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Mailer\Exception\TransportException;
use Symfony\Component\Mime\Exception\RfcComplianceException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use App\Http\Middleware\CheckPatientMiddleware;
use Illuminate\Support\Str;
use Illuminate\Database\QueryException;
use Illuminate\Validation\ValidationException;


return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'CheckPatient' => CheckPatientMiddleware::class,
            'CheckAdmin' => CheckAdminMiddleware::class,
            'CheckDoctor' => CheckDoctorMiddleware::class,
            'StorePatientMiddleware' => StorePatientMiddleware::class,
            'CheckDoctorOnly' => CheckDoctorOnlyMiddleware::class,
            'CheckPatientOnly' => CheckPatientOnlyMiddleware::class,
            'PaginateDoctorWorkSchedulesMiddleware' => PaginateDoctorWorkSchedulesMiddleware::class,
            'PaginateDoctorAppointmentsMiddleware' => PaginateDoctorAppointmentsMiddleware::class,
            'PaginatePatientAppointments' => PaginatePatientAppointments::class,
            'ShowAppointmentMiddleware' => ShowAppointmentMiddleware::class,
            'CancelAppointmentMiddleware' => CancelAppointmentMiddleware::class,
            'MakeAppointmentMissedMiddleware' => MakeAppointmentMissedMiddleware::class,
            'MakeAppointmentAttendedMiddleware' => MakeAppointmentAttendedMiddleware::class,
            'PaginateDoctorVisitsMiddleware' => PaginateDoctorVisitsMiddleware::class,
            'PaginatePatientVisitsMiddleware' => PaginatePatientVisitsMiddleware::class,
            'ShowVisitMiddleware' => ShowVisitMiddleware::class,
            'UpdateVisitMiddleware' => UpdateVisitMiddleware::class,
            'StoreMedicalRecordAccessMiddleware' => StoreMedicalRecordAccessMiddleware::class,
            'PaginatePatientMedicalRecordAccessesMiddleware' => PaginatePatientMedicalRecordAccessesMiddleware::class,
            'PaginateDoctorMedicalRecordAccessesMiddleware' => PaginateDoctorMedicalRecordAccessesMiddleware::class,
            'PaginateVisitMedicalRecordAccessesMiddleware' => PaginateVisitMedicalRecordAccessesMiddleware::class,
            'DestroyMedicalRecordAccessMiddleware' => DestroyMedicalRecordAccessMiddleware::class,
            'AllPatientComplaintsMiddleware' => AllPatientComplaintsMiddleware::class,
            'ShowPatientComplaintMiddleware' => ShowPatientComplaintMiddleware::class,
            'StoreTransferMiddleware' => StoreTransferMiddleware::class,
            'AllPatientTransfersMiddleware' => AllPatientTransfersMiddleware::class,
            'PaginateReferredTransfersMiddleware' => PaginateReferredTransfersMiddleware::class,
            'ShowTransferMiddleware' => ShowTransferMiddleware::class,
            'MakeAppointmentForTransferMiddleware' => MakeAppointmentForTransferMiddleware::class,
            'MakeAnotherAppointmentForTransferMiddleware' => MakeAnotherAppointmentForTransferMiddleware::class,
            'PaginateReceivedTransfersMiddleware' => PaginateReceivedTransfersMiddleware::class,
            'PaginateDoctorUnavailabilitiesMiddleware' => PaginateDoctorUnavailabilitiesMiddleware::class,
        ]);

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
                'message' => ($seconds > 1) ? "Several attempts were made, please try again in $seconds seconds" :
                    'Several attempts were made, please try again after 1 second',
            ], 429);
        });

        $exceptions->render(function (TransportExceptioN $e, $request) {
            return response()->json([
                'result' => 'Fail',
                'message' => 'No internet connection',
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

        $exceptions->render(function (ModelNotFoundException $e, $request) {
            return response()->json([
                'result' => 'Fail',
                'message' => Str::headline(class_basename($e->getModel())) . " not found",
            ], 404);
        });

        $exceptions->render(function (NotFoundHttpException $e, $request) {
            $previous = $e;
            while ($previous = $previous->getPrevious())
                if ($previous instanceof ModelNotFoundException)
                    return response()->json([
                        'result' => 'Fail',
                        'message' => Str::headline(class_basename($previous->getModel())) . ' not found',
                    ], 404);
            return response()->json([
                'result' => 'Fail',
                'message' => 'Not found',
            ], 404);
        });

        $exceptions->render(function (QueryException $e, $request) {
            $driverErrorCode = $e->errorInfo[1] ?? null;
            if ($driverErrorCode == 1451)
                return response()->json([
                    'result' => 'Fail',
                    'message' => 'It cannot be deleted because it\'s referenced by existing entities',
                ], 409);

            throw $e;
        });

        $exceptions->render(function (ValidationException $e, $request) {
            return response()->json([
                'result' => 'Fail',
                'message' => 'Invalid input',
                'errors' => $e->errors(),
            ], 422);
        });

        // $exceptions->render(function (\Throwable $e, $request) {
        //     return response()->json([
        //         'result' => 'Fail',
        //         'base_message' => 'Unexpected back-end error!',
        //         'error' => $e->getMessage(),
        //         'file' => $e->getFile(),
        //         'line' => $e->getLine(),
        //         'details' => ($e->getPrevious() != null) ? $e->getPrevious()->getMessage() : null,
        //     ], 500);
        // });
    
    })->create();
