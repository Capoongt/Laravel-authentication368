<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('products',ProductController::class)->middleware('auth:sanctum'); //เป็นชุดของตัวกำกับการใช้งาน middleware ใน Laravel เป็นไปตามรูปแบบของการ

Route::post('/login', [UserController::class, 'store']);

Route::delete('/logout/{user}', [UserController::class, 'destroy']);