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

Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('provider')->middleware(["auth:sanctum"])->group(function () {
        Route::apiResource('services', App\Http\Controllers\Provider\ServiceController::class);
        Route::apiResource('orders', App\Http\Controllers\Provider\OrderController::class);
    });
});

Route::apiResource('categories', App\Http\Controllers\CategoryController::class)
    ->only(['index']);

Route::apiResource('cities', App\Http\Controllers\CityController::class)
    ->only(['index']);

Route::apiResource('services', App\Http\Controllers\ServiceController::class)
    ->only(['index', 'show']);

Route::prefix('services')->group(function () {
    Route::get('/{id}/similars', [App\Http\Controllers\ServiceController::class, 'similars']);
});