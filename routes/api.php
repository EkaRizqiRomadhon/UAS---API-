<?php
// routes/api.php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ApiKeyController;
use App\Http\Controllers\Api\TourController;
use App\Http\Controllers\Api\DestinationController;
use Illuminate\Support\Facades\Route;

// ── PUBLIC (tidak perlu auth JWT, cukup API Key) ───────────
Route::prefix('v1')->group(function () {

    // Auth routes
    Route::prefix('auth')->group(function () {
        Route::post('register', [AuthController::class, 'register']);
        Route::post('login',    [AuthController::class, 'login']);
    });

    // Public data (Proteksi Menggunakan API Key)
    Route::middleware('api.key')->group(function () {
        
        // 🔹 CRUD DESTINATIONS
        Route::get('destinations', [DestinationController::class, 'index']);       // Read All
        Route::post('destinations', [DestinationController::class, 'store']);      // Create (Ini yang tadi kurang)
        Route::get('destinations/{id}', [DestinationController::class, 'show']);   // Read Detail
        Route::put('destinations/{id}', [DestinationController::class, 'update']); // Update (Ini yang tadi kurang)
        Route::delete('destinations/{id}', [DestinationController::class, 'destroy']); // Delete (Ini yang tadi kurang)

        // 🔹 CRUD TOURS (Sekalian gue lengkapin biar ga error 405 lagi nanti)
        Route::get('tours',        [TourController::class, 'index']);       // Read All
        Route::post('tours',       [TourController::class, 'store']);       // Create
        Route::get('tours/{id}',   [TourController::class, 'show']);        // Read Detail
        Route::put('tours/{id}',   [TourController::class, 'update']);      // Update
        Route::delete('tours/{id}', [TourController::class, 'destroy']);    // Delete
    });

});

use App\Http\Controllers\Api\BookingController;

// ── PROTECTED (butuh JWT Bearer Token) ───────────────────
Route::prefix('v1')->middleware('auth:api')->group(function () {

    // Profile & auth
    Route::prefix('auth')->group(function () {
        Route::get('me',      [AuthController::class, 'me']);
        Route::post('logout', [AuthController::class, 'logout']);
        Route::post('refresh', [AuthController::class, 'refresh']);
    });

    // Kelola API key (user yang login)
    Route::prefix('api-keys')->group(function () {
        Route::get('/',       [ApiKeyController::class, 'index']);
        Route::post('/',      [ApiKeyController::class, 'store']);
        Route::delete('/{id}', [ApiKeyController::class, 'destroy']);
    });
    
    // Booking
    Route::post('bookings', [BookingController::class, 'store']);

    Route::get('basic-secure-data', function() {
        return response()->json([
            'message' => 'Lolos masuk pakai Basic Auth!',
            'user' => auth()->user()
        ]);
    });
});