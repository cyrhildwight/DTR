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
    Route::post('/break', [DateController::class, 'timeOut'])->name('dtr.timeout');
    Route::post('/timeout', [DateController::class, 'break'])->name('dtr.break');
    Route::post('/logout', [AuthController::class, 'getLogout'])->name('logout');
    Route::get('/history', [DateController::class, 'history'])->name('history');
    Route::get('/users', [DateController::class, 'users'])->name('users');
    Route::get('/users/{id}/history', [DateController::class, 'userHistory'])->name('users.history');
});





