<?php

use App\Http\Controllers\Api\UserController as ApiUserController;
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

Route::get('users', [ApiUserController::class, 'getUsers']);
//Route::get('users/getuser', [ApiUserController::class, 'getUsers']);
Route::post('users/add', [ApiUserController::class, 'create']);
Route::get('users/{id}', [ApiUserController::class, 'show']);
Route::put('users/{id}', [ApiUserController::class, 'update']);
Route::delete('users/{id}', [ApiUserController::class, 'destroy']);
