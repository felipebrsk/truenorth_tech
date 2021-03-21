<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::get('/', function(){
    $produtos = Product::all();
    $randomProducts = Product::RandomProducts()->get();
    return view('home', compact('produtos', 'randomProducts'));
})->name('home');

Route::get('/search', 'App\Http\Controllers\ShopController@search')->name('search');
Route::get('/linha-3000', 'App\Http\Controllers\ShopController@linhaRyzen')->name('linha.3000');
Route::get('/linha-10thGen', 'App\Http\Controllers\ShopController@linhaIntel')->name('linha.intel');
Route::get('/linha-rtx-20', 'App\Http\Controllers\ShopController@linhaRtx')->name('linha.rtx');
Route::get('/product/search', 'App\Http\Controllers\ProdutoController@search')->name('product.search');
Route::resource('/shop', 'App\Http\Controllers\ShopController');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::middleware(["admin.user"])->group(function (){
    Route::resource('/product', 'App\Http\Controllers\ProdutoController');
    Route::get('/product/excluir/{id}', 'App\Http\Controllers\ProdutoController@excluir')->name('product.excluir');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/empty', function(){
        \Cart::destroy();
        return back()->with('success_message', 'Carrinho limpo com sucesso.');
    })->name('cart.clear');
    Route::patch('/cart/remove/{rowId}', 'App\Http\Controllers\CarrinhoController@retirar')->name('cart.remove');
    Route::resource('/cart', 'App\Http\Controllers\CarrinhoController');
});