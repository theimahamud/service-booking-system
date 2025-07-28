<?php

use App\Http\Controllers\API\Admin\BookingController as AdminBookingController;
use App\Http\Controllers\API\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\API\Customer\BookingController as CustomerBookingController;
use App\Http\Controllers\API\Customer\ServiceController as CustomerServiceController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {

    // Customer Routes
    Route::get('/services', [CustomerServiceController::class, 'index']);
    Route::post('/bookings', [CustomerBookingController::class, 'store']);
    Route::get('/bookings', [CustomerBookingController::class, 'index']);

    // Admin Routes
    Route::middleware('admin')->group(function () {
        Route::apiResource('/services', AdminServiceController::class)->only('store', 'update', 'destroy');
        Route::get('/admin/bookings', [AdminBookingController::class, 'index']);
    });
});

// Authentication route
require __DIR__.'/auth.php';

// fallback api route
Route::fallback(function () {
    return response()->json([
        'status' => false,
        'message' => 'API Not Found!',
    ], 404);
});
