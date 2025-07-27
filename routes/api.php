<?php

use App\Http\Controllers\API\Auth\AuthController;
use App\Http\Controllers\API\Customer\ServiceController as CustomerServiceController;
use App\Http\Controllers\API\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\API\Customer\BookingController as CustomerBookingController;
use App\Http\Controllers\API\Admin\BookingController as AdminBookingController;
use Illuminate\Support\Facades\Route;

// Login and Registration Route

Route::controller(AuthController::class)->group(function (){
    Route::post('/register',  'register');
    Route::post('/login', 'login')->middleware('throttle:5,1');
});

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

//fallback api route
Route::fallback(function(){
    return response()->json([
        'status'=>false,
        'message'=>'API Not Found!'
    ], 404);
});

