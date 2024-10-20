<?php

use App\Generator\DummyGenerator;
use App\Http\Controllers\v1\BasicController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;

Route::get('/', function () {
    $generator = new DummyGenerator();
    $dataOne = $generator->generateChartData(100, now()->subDays(50), 20, 50);
    $dataTwo = $generator->generateChartData(100, now()->subDays(50),  50, 75);
    return view('welcome', compact('dataOne', 'dataTwo'));
});


Route::post('/test', function (Request $request) {
    sleep(5);

    // throw ValidationException::withMessages(['msg' => 'this']);
    return response([
        'status' => 'success',
        'request' => $request->toArray(),
    ]);
})->name('test');


Route::get('/home', [BasicController::class, 'index'])->name('home');
