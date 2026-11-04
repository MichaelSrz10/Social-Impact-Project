<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SolicitudController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/promotor', [DashboardController::class, 'promotor'])->name('dashboard.promotor');
    Route::get('/dashboard/user', [DashboardController::class, 'user'])->name('dashboard.user');
    Route::get('/promotor', [DashboardController::class, 'promotor']);
    Route::get('/user', [DashboardController::class, 'user']);

    Route::post('/solicitudes', [SolicitudController::class, 'store'])->middleware('throttle:20,1')->name('solicitudes.store');
    Route::patch('/solicitudes/{solicitud}/cancelar', [SolicitudController::class, 'cancel'])->name('solicitudes.cancel');
    Route::patch('/solicitudes/{solicitud}/estado', [SolicitudController::class, 'updateEstado'])->name('solicitudes.estado');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
