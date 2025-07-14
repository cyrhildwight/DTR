<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Guest-only routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'getLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'postLogin']);

    Route::get('/register', [AuthController::class, 'show'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// Authenticated routes
Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [AuthController::class, 'getLogout'])->name('logout');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::post('/timein', [HomeController::class, 'timeIn'])->name('timein');
    Route::post('/timeout', [HomeController::class, 'timeOut'])->name('timeout');
});
