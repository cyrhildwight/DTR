<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});




Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::post('/timein', [HomeController::class, 'timeIn'])->name('timein');
    Route::post('/timeout', [HomeController::class
    , 'timeOut'])->name('timeout');
});