<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DateController;

// Guest-only routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'getLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'postLogin']);

    Route::get('/register', [AuthController::class, 'show'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/', [DateController::class, 'index'])->name('home');
    Route::get('/home', [DateController::class, 'index']);
    Route::post('/timein', [DateController::class, 'timeIn'])->name('dtr.timein');
    Route::post('/timeout', [DateController::class, 'timeOut'])->name('dtr.timeout');
    Route::get('/logout', [AuthController::class, 'getLogout'])->name('logout');
});


