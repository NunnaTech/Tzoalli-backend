<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GrocerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\EvidenceController;
use App\Http\Controllers\ObservationController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\VisitController;

use App\Http\Controllers\UserController;


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

//Authentication is not required for these endpoints
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']); //header content type, Accept

//Authentication is required for these endpoints (apply middleware auth:sanctum)
Route::group(['middleware' => ["auth:sanctum", "cors"]], function () {
    Route::get('userProfile', [AuthController::class, 'userProfile']);
    Route::get('logout', [AuthController::class, 'logout']);
    Route::put('changePassword', [AuthController::class, 'changePassword']);


    Route::get('product/findByName/{searchValue}', [ProductController::class, 'findByName']);
    Route::get('visit/getMyVisits/{status}', [VisitController::class, 'getMyVisits']);
    Route::put('visit/updateStatus/{id}', [VisitController::class, 'updateStatus']);
    Route::get('observation/getAllByVisit/{idVisit}', [ObservationController::class, 'getAllByVisit']);
    Route::put('visit/storeVisitWithOrder/{idVisit}', [VisitController::class, 'storeVisitWithOrder']);

    
    Route::resource('user', App\Http\Controllers\UserController::class)->only(['index','store','update','show','destroy']);
    Route::resource('visit', App\Http\Controllers\VisitController::class)->only(['index','store','update','show','destroy']);
    Route::resource('grocer', App\Http\Controllers\GrocerController::class)->only(['index','store','update','show','destroy']);
    Route::resource('order', App\Http\Controllers\OrderController::class)->only(['index','store','update','show','destroy']);
    Route::resource('orderDetail', App\Http\Controllers\OrderDetailController::class)->only(['index','store','update','show','destroy']);
    Route::resource('product', ProductController::class)->only(['index','store','update','show','destroy']);
    Route::resource('evidence', App\Http\Controllers\EvidenceController::class)->only(['index','store','update','show','destroy']);
    Route::resource('observation', App\Http\Controllers\ObservationController::class)->only(['index','store','update','show','destroy']);
});
