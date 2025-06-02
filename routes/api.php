<?php

use App\Http\Controllers\Api\V1\BasicController;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::prefix('v1')->group(function () {
    Route::controller(BasicController::class)->group(function () {
        Route::get('/', 'index');
    });
});
