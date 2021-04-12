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

use App\Models\Product;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\CidadeController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\PessoaController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('initialPage');
})->name('index');

Route::resource('/estados', EstadoController::class);
Route::resource('/cidades', CidadeController::class);
Route::resource('/produtos', ProdutoController::class);
Route::resource('/pessoas', PessoaController::class)->middleware('auth');
Route::resource('/compras', CompraController::class)->middleware('auth');

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
