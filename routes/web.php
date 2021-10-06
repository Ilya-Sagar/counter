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
    Route::get('/', [\App\Http\Controllers\ReportCardController::class, 'index'])->name('home');
    Route::get('/{id}', [\App\Http\Controllers\ReportCardController::class, 'showReport'])->where('id', '[0-9]+')->name('reports.show');
    Route::get('/create', [\App\Http\Controllers\ReportCardController::class, 'createForm'])->name('reports.create-form');
    Route::post('/', [\App\Http\Controllers\ReportCardController::class, 'create'])->name('reports.create');
    Route::put('/{id}', [\App\Http\Controllers\ReportCardController::class, 'update'])->where('id', '[0-9]+');
});

Route::group(['prefix' => 'visitors'], function () {
    Route::get('/', [\App\Http\Controllers\VisitorController::class, 'search']);
    Route::get('/create', [\App\Http\Controllers\VisitorController::class, 'createForm'])->name('visitors.create-form');
    Route::post('/', [\App\Http\Controllers\VisitorController::class, 'create'])->name('visitors.create');
    Route::put('/{id}', [\App\Http\Controllers\VisitorController::class, 'update'])->where('id', '[0-9]+');
});

Route::group(['prefix' => 'attends'], function () {
    Route::post('/', [\App\Http\Controllers\DayAttendController::class, 'create']);
    Route::put('/reports/{id}', [\App\Http\Controllers\DayAttendController::class, 'update'])->where('id', '[0-9]+');
    Route::get('/{id}', [\App\Http\Controllers\DayAttendController::class, 'createOrUpdateForm'])->where('id', '[0-9]+')->name('attends.createOrUpdateForm');
    Route::post('/', [\App\Http\Controllers\DayAttendController::class, 'createOrUpdate'])->name('attends.createOrUpdate');
    Route::get('/{id}/detail', [\App\Http\Controllers\DayAttendController::class, 'showReport'])->where('id', '[0-9]+')->name('attends.detailReport');
});






