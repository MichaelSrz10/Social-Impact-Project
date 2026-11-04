<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\RutaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/health', function () {
    return response()->json([
        'status' => 'ok',
        'service' => 'salud-rural-api',
        'timestamp' => now()->toIso8601String(),
    ], 200);
});

Route::prefix('v1')->group(function () {
    Route::get('/health', function () {
        return response()->json([
            'status' => 'ok',
            'service' => 'salud-rural-api',
            'timestamp' => now()->toIso8601String(),
        ], 200);
    });

    Route::post('/auth/login', [AuthController::class, 'login']);

    Route::middleware(['auth:api', 'throttle:60,1', 'auditoria'])->group(function () {
        Route::post('/rutas/optimizar', [RutaController::class, 'optimizar']);
    });
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');
