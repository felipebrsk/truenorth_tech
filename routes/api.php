<?php

use App\Http\Controllers\Api\ApiAuthController;
use App\Http\Controllers\api\ApiProductController;
use App\Http\Controllers\api\ApiUserController;
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

Route::post('login/auth', [ApiAuthController::class, 'login']);

Route::middleware(['apiJwt'])->group(function () {
    Route::apiResources([
        'products' => ApiProductController::class,
        'users' => ApiUserController::class,
    ]);

    Route::post('auth/logout', [ApiAuthController::class, 'logout']);
    Route::post('auth/refresh', [ApiAuthController::class, 'refresh']);
    Route::post('auth/me', [ApiAuthController::class, 'me']);
});