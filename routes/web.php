<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();





Route::get('/bikes', [App\Http\Controllers\BikesFrontController::class, 'index'])->name('bikes');

Route::get('/bike/{id}', [App\Http\Controllers\BikesFrontController::class, 'show'])->name('bike.interno');


Route::get('/acessorios', [App\Http\Controllers\ProdutosFrontController::class, 'acessorios'])->name('acessorios');
Route::get('/componentes', [App\Http\Controllers\ProdutosFrontController::class, 'componentes'])->name('componentes');
Route::get('/vestuario', [App\Http\Controllers\ProdutosFrontController::class, 'vestuario'])->name('vestuario');
Route::get('/componente/{id}', [App\Http\Controllers\ProdutosFrontController::class, 'showComponente'])->name('componente.interno');
Route::get('/acessorio/{id}', [App\Http\Controllers\ProdutosFrontController::class, 'showAcessorio'])->name('acessorio.interno');
Route::get('/vestuario/{id}', [App\Http\Controllers\ProdutosFrontController::class, 'showVestuario'])->name('vestuario.interno');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/painel', [App\Http\Controllers\PainelController::class, 'index'])->name('painel');
Route::get('/sobre', [App\Http\Controllers\SobreController::class, 'index'])->name('sobre');
Route::get('/suporteegarantia', [App\Http\Controllers\SuporteController::class, 'index'])->name('suporte');
Route::post('/suporteegarantia', [App\Http\Controllers\SuporteController::class, 'store'])->name('suporte.store');
Route::get('/blog', [App\Http\Controllers\BlogController::class, 'index'])->name('blog');
Route::get('/blog/{id}', [App\Http\Controllers\BlogController::class, 'post'])->name('blogPost');

Route::get('/eventos', [App\Http\Controllers\EventoController::class, 'index'])->name('eventos');
Route::get('/evento/{id}', [App\Http\Controllers\EventoController::class, 'show'])->name('evento');

Route::get('/ondecomprar', [App\Http\Controllers\OndeComprarController::class, 'index'])->name('ondeComprar');
Route::get('/faleconosco', [App\Http\Controllers\ContatoController::class, 'index'])->name('contato');
Route::post('/faleconosco', [App\Http\Controllers\ContatoController::class, 'store'])->name('contato.store');
Route::get('/registresuabike', [App\Http\Controllers\RegistroBikeController::class, 'index'])->name('registroBike');
Route::post('/registresuabike', [App\Http\Controllers\RegistroBikeController::class, 'store'])->name('registroBike.store');