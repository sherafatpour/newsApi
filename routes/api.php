<?php

use App\Http\Controllers\Api\V1\AuthController;
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

Route::prefix('v1/')->group(function () {

    Route::prefix('user/')->group(function () {
        //public routes
        Route::post('/register', [AuthController::class, 'store']);
        Route::post('/login', [AuthController::class, 'login']);
        Route::post('/all', [AuthController::class, 'index']);

        //protected routes
        Route::group(['middleware' => ['auth:sanctum']], function () {
            Route::post('/logout', [AuthController::class, 'logout']);
            Route::get('/{user}', [AuthController::class, 'show']);
            Route::delete('/{user}', [AuthController::class, 'destroy']);
            Route::post('/all', [AuthController::class, 'index']);
        });
    });


   // Route::resource('address', AddressController::class)->middleware('auth:sanctum');

});