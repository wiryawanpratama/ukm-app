<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UkmController;
use App\Http\Controllers\AnggotaUkmController;
use App\Http\Controllers\AuthController;

// Halaman awal (login)
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Semua route di bawah ini wajib login
Route::middleware(['auth'])->group(function () {

    // Dashboard (halaman setelah login)
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // CRUD UKM
    Route::resource('ukm', UkmController::class);

    // CRUD Anggota UKM
    Route::resource('anggota', AnggotaUkmController::class);
});
