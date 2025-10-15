<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UkmController;
use App\Http\Controllers\AnggotaUkmController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InfoLombaController;
use App\Http\Controllers\InfoUkmController;

// 🔽 Arahkan root URL ke halaman login
Route::get('/', function () {
    return view('home');
})->name('home');

// Halaman Login & Register (hanya untuk guest)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');

    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
});

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Semua route di bawah ini hanya bisa diakses setelah login
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // CRUD UKM
    Route::resource('ukm', UkmController::class);

    // CRUD Anggota UKM
    Route::resource('anggota', AnggotaUkmController::class);

    // ✅ Perbaikan total untuk Info Lomba & Info UKM
    Route::prefix('info')->name('info.')->group(function () {
        Route::resource('lomba', InfoLombaController::class);
        Route::resource('ukm', InfoUkmController::class);
    });
});