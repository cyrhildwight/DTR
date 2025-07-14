<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DateController;
use App\Http\Controllers\TimeController;

// Guest-only routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'getLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'postLogin']);

    Route::get('/register', [AuthController::class, 'show'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// Authenticated routes
Route::middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/logout', [AuthController::class, 'getLogout'])->name('logout');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::post('/timein', [DateController::class, 'timeIn'])->name('timein');
    Route::post('/timeout', [DateController::class, 'timeOut'])->name('timeout');
});



Route::middleware('auth')->group(function () {
    Route::get('/timein', [TimeController::class, 'showTimeIn'])->name('timein.view');
    Route::post('/timein', [TimeController::class, 'handleTimeIn'])->name('timein');

    Route::get('/timeout', [TimeController::class, 'showTimeOut'])->name('timeout.view');
    Route::post('/timeout', [TimeController::class, 'handleTimeOut'])->name('timeout');

    Route::get('/dashboard', [TimeController::class, 'dashboard'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
    


