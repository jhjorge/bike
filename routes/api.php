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

Route::apiResource('eventos', 'App\Http\Controllers\EventosController');
Route::apiResource('posts', 'App\Http\Controllers\PostController');
Route::apiResource('bikes', 'App\Http\Controllers\BikesController');
Route::apiResource('produtos', 'App\Http\Controllers\ProdutosController');
Route::apiResource('contatos', 'App\Http\Controllers\ContatosController');
Route::apiResource('registros', 'App\Http\Controllers\RegistrosController');
Route::apiResource('suporte', 'App\Http\Controllers\SuporteGarantiaController');
