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

Route::resource('establecimiento', App\Http\Controllers\EstablecimientoController::class)->only(['index','store','update','show','destroy']);

Route::resource('estante', App\Http\Controllers\EstanteController::class)->only(['index','store','update','show','destroy']);

Route::resource('observacion', App\Http\Controllers\ObservacionController::class)->only(['index','store','update','show','destroy']);

Route::resource('pedido', App\Http\Controllers\PedidioController::class)->only(['index','store','update','show','destroy']);

Route::resource('producto', App\Http\Controllers\ProductoController::class)->only(['index','store','update','show','destroy']);

/*
Route::get('/establecimientos', 'EstablecimientoController@index'); //muestra todos los registros
Route::post('/establecimiento', [App\Http\Controllers\EstablecimientoController::class,'store']); // crea un registro
Route::put('/establecimiento/{id}', [App\Http\Controllers\EstablecimientoController::class,'update']); // actualiza un registro
Route::delete('/establecimiento/{id}', [App\Http\Controllers\EstablecimientoController::class,'destroy']); //elimina un registro

Route::get('/estantes', 'EstanteController@index'); 
Route::post('/estante', [Estante::class,'store']); 
Route::put('/estante/{id}', [Estante::class,'update']); 
Route::delete('/estante/{id}', [Estante::class,'destroy']); 

Route::get('/observaciones', [Observacion::class,'index']); 
Route::post('/observacion', [Observacion::class,'store']); 
Route::put('/observacion/{id}', [Observacion::class,'update']); 
Route::delete('/observacion/{id}', [Observacion::class,'destroy']); 

Route::get('/pedidos', [PedidoController::class,'index']); 
Route::post('/pedido', [PedidoController::class,'store']); 
Route::put('/pedido/{id}', [PedidoController::class,'update']); 
Route::delete('/pedido/{id}', [PedidoController::class,'destroy']); 

Route::get('/productos', [ArticuloController::class,'index']); 
Route::post('/producto', [ProductoController::class,'store']); 
Route::put('/producto/{id}', [ProductoController::class,'update']); 
Route::delete('/producto/{id}', [ProductoController::class,'destroy']); 
*/