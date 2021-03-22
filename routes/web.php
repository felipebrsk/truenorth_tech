<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Models\Product;
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

Route::get('/', function(){
    $produtos = Product::all();
    $randomProducts = Product::RandomProducts()->get();
    return view('home', compact('produtos', 'randomProducts'));
})->name('home');

Route::get('/search', [ShopController::class, 'search'])->name('search');
Route::get('/linha-3000', [ShopController::class, 'linhaRyzen'])->name('linha.3000');
Route::get('/linha-10thGen', [ShopController::class, 'linhaIntel'])->name('linha.intel');
Route::get('/linha-rtx-20', [ShopController::class, 'linhaRtx'])->name('linha.rtx');
Route::get('/product/search', [ProductController::class, 'search'])->name('product.search');
Route::resource('/shop', ShopController::class);

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::middleware(["admin.user"])->group(function (){
    Route::resource('/product', ProductController::class);
    Route::get('/product/excluir/{id}', [ProductController::class, 'excluir'])->name('product.excluir');
    Route::post('/product/images', [ImageController::class, 'store'])->name('images.store');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/empty', function(){
        \Cart::destroy();
        return back()->with('success_message', 'Carrinho limpo com sucesso.');
    })->name('cart.clear');
    Route::patch('/cart/remove/{rowId}', [CartController::class, 'retirar'])->name('cart.remove');
    Route::resource('/cart', CartController::class);
});