<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Routes for each authentication action
Route::post('register', [AuthController::class, 'register']);
Route::post('verifyOtp', [AuthController::class, 'verifyOtp'])->middleware('throttle:5,1');
Route::post('login', [AuthController::class, 'login'])->middleware('throttle:5,1');
Route::post('forgotPassword', [AuthController::class, 'forgotPassword'])->middleware('throttle:2,1');
Route::post('resetPassword', [AuthController::class, 'resetPassword']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);

});
