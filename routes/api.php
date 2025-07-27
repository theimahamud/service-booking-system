<?php

use App\Http\Controllers\API\Auth\AuthController;
use App\Http\Controllers\API\Customer\ServiceController as CustomerServiceController;
use App\Http\Controllers\API\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\API\Customer\BookingController as CustomerBookingController;
use App\Http\Controllers\API\Admin\BookingController as AdminBookingController;
use Illuminate\Support\Facades\Route;

// Login and Registration Route
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout']);

    // Customer Routes
    Route::get('/services', [CustomerServiceController::class, 'index']);
    Route::post('/bookings', [CustomerBookingController::class, 'store']);
    Route::get('/bookings', [CustomerBookingController::class, 'index']);

    // Admin Routes
    Route::middleware('admin')->group(function () {
        Route::apiResource('/services', AdminServiceController::class);
        Route::get('/admin/bookings', [AdminBookingController::class, 'index']);
    });
});

