<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\UserController;
use App\Http\Controllers\Web\LoginController;
use App\Http\Controllers\Web\SchoolController;
use App\Http\Controllers\Web\DashboardController;

Route::controller(LoginController::class)
->group(function () {
    Route::get("/","index")->name('login')->middleware('guest');
    Route::post("/","authenticate")->name('authenticate');
    Route::post("/logout","logout")->name('login');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/users', UserController::class)->except(['show']);
    Route::resource('/schools', SchoolController::class)->except(['show']);
});
