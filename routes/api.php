<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', [\App\Http\Controllers\ReportCardController::class, 'index']);
Route::post('reports', [\App\Http\Controllers\ReportCardController::class, 'create']);
Route::put('reports/{id}', [\App\Http\Controllers\ReportCardController::class, 'update'])->where('id', '[0-9]+');
