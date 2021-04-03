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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/produtos', function () {
    $produtos = Product::all();
    return view('produtos', ['output' => $produtos]);
});

Route::get('/produtos/{id}', function ($id) {
    $produto = Product::find($id);
    if ($produto == null) {
        return view('produtos', ['output' => 'Produto não encontrado!']);
    }
    return view('produtos', ['output' => $produto]);
});