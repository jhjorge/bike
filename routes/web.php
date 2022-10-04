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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/sobre', [App\Http\Controllers\SobreController::class, 'index'])->name('sobre');
Route::get('/suporteegarantia', [App\Http\Controllers\SuporteController::class, 'index'])->name('suporte');
Route::get('/blog', [App\Http\Controllers\BlogController::class, 'index'])->name('blog');
Route::get('/blog/{id}', [App\Http\Controllers\BlogController::class, 'post'])->name('blogPost');
Route::get('/eventos', function () {
    return view('app.eventos');
})->name('eventos');
Route::get('/ondecomprar', [App\Http\Controllers\OndeComprarController::class, 'index'])->name('ondeComprar');
Route::get('/faleconosco', [App\Http\Controllers\ContatoController::class, 'index'])->name('contato');
Route::get('/registresuabike', [App\Http\Controllers\RegistroBikeController::class, 'index'])->name('registroBike');