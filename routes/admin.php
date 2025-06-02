<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

Route::controller(DashboardController::class)->group(function () {
    Route::get('/', 'index');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('login', 'login')->name('login');
});
