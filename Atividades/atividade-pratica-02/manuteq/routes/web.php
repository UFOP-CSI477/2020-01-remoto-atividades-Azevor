<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipamentoController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\HomeController;

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

Route::get('/', function () {
    return view('principal');
})->name('index');

Route::get('/home', function () {
    return view('principal');
})->middleware('auth');

// Route::get('/home', function () {
//     return redirect()->route('home');
// })->middleware('auth');

Route::resource('/equipamentos', EquipamentoController::class);
Route::resource('/registros', RegistroController::class);
Route::resource('/users', HomeController::class)->middleware('auth');
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
