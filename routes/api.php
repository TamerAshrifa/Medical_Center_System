<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\SpecialityController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VisitController;
use App\Http\Controllers\WorkScheduleController;
use Illuminate\Support\Facades\Route;

// Authentication
Route::middleware('throttle:3,1')->group(function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('verifyOtp', [AuthController::class, 'verifyOtp']);
    Route::post('login', [AuthController::class, 'login']);
    Route::post('forgotPassword', [AuthController::class, 'forgotPassword']);
    Route::post('resetPassword', [AuthController::class, 'resetPassword']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [AuthController::class, 'logout'])->middleware('throttle:1,1');

    // Users APIs
    Route::prefix('users/')->group(function () {
        Route::post('', [UserController::class, 'store'])->middleware('CheckAdmin');
        Route::get('{per_page}', [UserController::class, 'index'])->middleware('CheckAdmin');
        Route::get('show/{id}', [UserController::class, 'show']);
        Route::put('{id}', [UserController::class, 'update']);
        // Route::delete('/{specialityId}', [UserController::class, 'destroy'])->middleware('CheckAdmin');
    });

    // Patient APIs
    Route::prefix('patients/')->group(function () {
        Route::post('', [PatientController::class, 'store'])->middleware('StorePatientMiddleware');
        Route::get('{per_page}', [PatientController::class, 'index'])->middleware('CheckAdmin');
        Route::get('show/{patientId}', [PatientController::class, 'show']);
        Route::put('{patientId}', [PatientController::class, 'update'])->middleware('CheckPatientOnly');
        Route::delete('{patientId}', [PatientController::class, 'destroy'])->middleware('CheckAdmin');
    });

    // Room APIs
    Route::prefix('rooms/')->group(function () {
        Route::post('', [RoomController::class, 'store'])->middleware('CheckAdmin');
        Route::get('{per_page}', [RoomController::class, 'index'])->middleware('CheckAdmin');
        Route::get('show/{roomId}', [RoomController::class, 'show']);
        Route::put('{roomId}', [RoomController::class, 'update'])->middleware('CheckAdmin');
        Route::delete('{roomId}', [RoomController::class, 'destroy'])->middleware('CheckAdmin');
    });

    // Doctor APIs
    Route::prefix('doctors/')->group(function () {
        Route::post('', [DoctorController::class, 'store'])->middleware('CheckAdmin');
        Route::get('{per_page}', [DoctorController::class, 'index']);
        Route::get('show/{doctorId}', [DoctorController::class, 'show']);
        Route::put('{doctorId}', [DoctorController::class, 'update'])->middleware('CheckDoctorOnly');
        Route::delete('{doctorId}', [DoctorController::class, 'destroy'])->middleware('CheckAdmin');
    });

    // Specialities APIs
    Route::prefix('specialities/')->group(function () {
        Route::post('', [SpecialityController::class, 'store'])->middleware('CheckAdmin');
        Route::get('{per_page}', [SpecialityController::class, 'index']);
        Route::get('show/{specialityId}', [SpecialityController::class, 'show']);
        Route::put('{specialityId}', [SpecialityController::class, 'update'])->middleware('CheckAdmin');
        Route::delete('{specialityId}', [SpecialityController::class, 'destroy'])->middleware('CheckAdmin');
    });

    // Scheduling APIs
    Route::prefix('schedules/')->group(function () {
        Route::post('', [WorkScheduleController::class, 'store'])->middleware('CheckDoctor');
        Route::get('WDs', [WorkScheduleController::class, 'indexWeekDays']);
        Route::get('DsWS/{with_expired}/{per_page}', [WorkScheduleController::class, 'paginateDoctorsWorkSchedules'])->middleware('CheckAdmin');
        Route::get('MCWS/{with_expired}/{per_page}', [WorkScheduleController::class, 'paginateMedicalCenterWorkSchedules'])->middleware('CheckAdmin');
        Route::get('DWS/{doctor_id}/{with_expired}/{per_page}', [WorkScheduleController::class, 'paginateDoctorWorkSchedules'])->middleware(['CheckDoctor', 'PaginateDoctorWorkSchedulesMiddleware']);
    });

    // Appointment APIs
    Route::prefix('appointments/')->group(function () {
        Route::post('{doctor_id}', [AppointmentController::class, 'allAvailableTimesToBook'])->middleware('CheckPatientOnly');
        Route::post('s/{doctor_id}', [AppointmentController::class, 'store'])->middleware('CheckPatientOnly');
        Route::get('{status}/{with_expired}/{per_page}', [AppointmentController::class, 'paginate'])->middleware('CheckAdmin');
        Route::get('DA/{status}/{with_expired}/{per_page}/{doctor_id}', [AppointmentController::class, 'paginateDoctorAppointments'])->middleware(['CheckDoctor', 'PaginateDoctorAppointmentsMiddleware']);
        Route::get('PA/{status}/{with_expired}/{per_page}/{patient_id}', [AppointmentController::class, 'paginatePatientAppointments'])->middleware('CheckPatient');
        Route::get('{id}', [AppointmentController::class, 'show'])->middleware('ShowAppointmentMiddleware');

        Route::post('cA/{id}', [AppointmentController::class, 'cancelAppointment'])->middleware(['CheckPatientOnly', 'CancelAppointmentMiddleware']);
        Route::post('mA/{id}', [AppointmentController::class, 'makeAppointmentMissed'])->middleware(['CheckDoctorOnly', 'MakeAppointmentMissedMiddleware']);
        Route::post('aA/{id}', [AppointmentController::class, 'makeAppointmentAttended'])->middleware(['CheckDoctorOnly', 'MakeAppointmentAttendedMiddleware']);
    });

    // Visits APIs
    Route::prefix('visits/')->group(function () {
        Route::get('{per_page}', [VisitController::class, 'paginate'])->middleware('CheckAdmin');
        Route::get('DV/{per_page}/{doctor_id}', [VisitController::class, 'paginateDoctorVisits'])->middleware(['CheckDoctor', 'PaginateDoctorVisitsMiddleware']);
        Route::get('PV/{per_page}/{patient_id}', [VisitController::class, 'paginatePatientVisits'])->middleware(['CheckPatient', 'PaginatePatientVisitsMiddleware']);
        Route::get('s/{id}', [VisitController::class, 'show'])->middleware('ShowVisitMiddleware');
        Route::post('{id}', [VisitController::class, 'update'])->middleware(['CheckDoctorOnly', 'UpdateVisitMiddleware']);
    });






});

// User 1 (Admin 1) token: 1|i4ctOqTeDPIhfDGO5j8huKHXEb9lX2IB6Epo9Hibb41a6664
// User 26 (Doctor 11) token: 2|HMATOMqDbhSWV7wwhpqtnsVDV0Fq0sKlS0bUrIgu41ac8446
// User 27 (Patient 11) token: 3|wVsX05shjYLECY1nbfp8R5ndbDUUJS40gLohUOVu426a79ab
