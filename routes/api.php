<?php

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

Route::apiResources([
    'list/products' => ApiProductController::class,
    'list/users' => ApiUserController::class,
]);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
