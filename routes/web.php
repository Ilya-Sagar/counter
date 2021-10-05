<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'reports'], function () {
    Route::get('', [\App\Http\Controllers\ReportCardController::class, 'index']);
    Route::post('', [\App\Http\Controllers\ReportCardController::class, 'create']);
    Route::put('/{id}', [\App\Http\Controllers\ReportCardController::class, 'update'])->where('id', '[0-9]+');
});

Route::group(['prefix' => 'visitors'], function () {
    Route::get('', [\App\Http\Controllers\VisitorController::class, 'search']);
    Route::post('', [\App\Http\Controllers\VisitorController::class, 'create']);
    Route::put('/{id}', [\App\Http\Controllers\VisitorController::class, 'update'])->where('id', '[0-9]+');
});

Route::group(['prefix' => 'attends'], function () {
    Route::post('', [\App\Http\Controllers\DayAttendController::class, 'create']);
    Route::put('/{id}', [\App\Http\Controllers\DayAttendController::class, 'update'])->where('id', '[0-9]+');
});






