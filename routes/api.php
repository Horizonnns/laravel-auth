<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('register', [\App\Http\Controllers\AuthController::class, 'register']);
Route::get('login', [\App\Http\Controllers\AuthController::class, 'login']);


// Route::post('createUserWithRoles', [\App\Http\Controllers\AuthController::class, 'createUserWithRoles']);



Route::middleware('auth:sanctum')->group(function() {
Route::get('user', [\App\Http\Controllers\AuthController::class, 'user']);
Route::post('logout', [\App\Http\Controllers\AuthController::class, 'logout']);
});