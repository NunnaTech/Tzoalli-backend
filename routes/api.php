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

Route::resource('user', App\Http\Controllers\UserController::class)->only(['index','store','update','show','destroy']);

Route::resource('grocer', App\Http\Controllers\GrocerController::class)->only(['index','store','update','show','destroy']);

Route::resource('order', App\Http\Controllers\OrderController::class)->only(['index','store','update','show','destroy']);

Route::resource('orderDetail', App\Http\Controllers\OrderDetailController::class)->only(['index','store','update','show','destroy']);

Route::resource('product', App\Http\Controllers\ProductController::class)->only(['index','store','update','show','destroy']);

Route::resource('evidence', App\Http\Controllers\EvidenceController::class)->only(['index','store','update','show','destroy']);

Route::resource('observation', App\Http\Controllers\ObservationController::class)->only(['index','store','update','show','destroy']);
