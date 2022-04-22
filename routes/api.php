<?php

use App\Http\Controllers\API\Auth\LoginController;
use App\Http\Controllers\API\Turbine\CreateTurbinesController;
use App\Http\Controllers\API\Turbine\TurbinesController;
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

Route::post('/auth/login', [LoginController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::group(['prefix' => 'turbines'], function () {
        Route::get('/', [TurbinesController::class, 'index']);
        Route::post('/', [CreateTurbinesController::class, 'create']);
    });
    Route::post('/auth/logout', [LoginController::class, 'logout']);
});

