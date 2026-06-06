<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\SpecialityController;
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

    // Patient APIs
    Route::prefix('patients')->group(function () {
        Route::post('', [PatientController::class, 'store'])->middleware('StorePatientMiddleware');
        Route::get('/{per_page}', [PatientController::class, 'index'])->middleware('CheckAdmin');
        Route::get('/show/{patientId}', [PatientController::class, 'show']);
        Route::put('/{patientId}', [PatientController::class, 'update'])->middleware('CheckPatientOnly');
        Route::delete('/{patientId}', [PatientController::class, 'destroy'])->middleware('CheckAdmin');
    });

    // Room APIs
    Route::prefix('rooms')->group(function () {
        Route::post('', [RoomController::class, 'store'])->middleware('CheckAdmin');
        Route::get('/{per_page}', [RoomController::class, 'index'])->middleware('CheckAdmin');
        Route::get('/show/{roomId}', [RoomController::class, 'show']);
        Route::put('/{roomId}', [RoomController::class, 'update'])->middleware('CheckAdmin');
        Route::delete('/{roomId}', [RoomController::class, 'destroy'])->middleware('CheckAdmin');
    });

    // Doctor APIs
    Route::prefix('doctors')->group(function () {
        Route::post('', [DoctorController::class, 'store'])->middleware('CheckAdmin');
        Route::get('/{per_page}', [DoctorController::class, 'index']);
        Route::get('/show/{doctorId}', [DoctorController::class, 'show']);
        Route::put('/{doctorId}', [DoctorController::class, 'update'])->middleware('CheckDoctorOnly');
        Route::delete('/{doctorId}', [DoctorController::class, 'destroy'])->middleware('CheckAdmin');
    });


    // Specialities APIs
    Route::prefix('specialities')->group(function () {
        Route::post('', [SpecialityController::class, 'store'])->middleware('CheckAdmin');
        Route::get('/{per_page}', [SpecialityController::class, 'index']);
        Route::get('/show/{specialityId}', [SpecialityController::class, 'show']);
        Route::put('/{specialityId}', [SpecialityController::class, 'update'])->middleware('CheckAdmin');
        Route::delete('/{specialityId}', [SpecialityController::class, 'destroy'])->middleware('CheckAdmin');
    });
});
// User 1 (Admin) token: 2|n5oZ7tRbXFFnDn8rqofEoxHqKrFDH1AWk61lnWwp567835ae
// User 31 (Patient) token: 1|t4Z8eusjqGllU62nl2A4NI6T8Ko1ZCk6BfyULD27f9219470
// User 32 (Doctor 12) token: 3|Z2TJ6qZL6hTYvxs9PYZ0ubJULuxCT0CyTuncmgrF3abbf88b
