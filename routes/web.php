<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 'you cannot be here';
});

Route::post('/test', function (Request $request) {
    sleep(5);

    // throw ValidationException::withMessages(['msg' => 'this']);
    return response([
        'status'  => 'success',
        'request' => $request->toArray(),
    ]);
})->name('test');

Route::get('/home', [DashboardController::class, 'index'])->name('home');
