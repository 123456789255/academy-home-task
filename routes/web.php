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

Route::get('/', [App\Http\Controllers\ProductController::class, 'about'])->name('about');
Route::get('/home', [App\Http\Controllers\ProductController::class, 'about'])->name('home');
Route::get('/where', [App\Http\Controllers\WhereController::class, 'where']);

Route::get('/catalog', [App\Http\Controllers\CatalogController::class, 'catalog'])->name('catalog');
Route::get('/catalog/sort/{name}/{nap}', [App\Http\Controllers\CatalogController::class, "sort"]);
Route::get('/catalog/filtr/{idCat}', [App\Http\Controllers\CatalogController::class, "prodCat"]);
Route::get('/product/{product}', [App\Http\Controllers\ProductController::class, 'show'])->name('product');

Route::get('/cart', [App\Http\Controllers\CartController::class, 'showCart'])->name('cart.show');
Route::post('/add-to-cart/{productId}', [App\Http\Controllers\CartController::class, 'addToCart'])->name('cart.add');
Route::get('/add-on-cart/{productId}', [App\Http\Controllers\CartController::class, 'addOnCart'])->name('cart.add.inside');
Route::get('/remove-from-card/{productId}', [App\Http\Controllers\CartController::class, 'removeFromCart'])->name('cart.remove.one');
Route::get('/remove-all-from-card/{cartId}', [App\Http\Controllers\CartController::class, 'removeAllFromCart'])->name('cart.remove.all');

Route::get('/orders', [App\Http\Controllers\OrderController::class, 'index'])->name('orders.index')->middleware('auth');
Route::get('/orders/{order}', [App\Http\Controllers\OrderController::class, 'show'])->name('orders.show')->middleware('auth');
Route::post('/orders', [App\Http\Controllers\OrderController::class, 'store'])->name('orders.store')->middleware('auth');
Route::delete('/orders/{order}', [App\Http\Controllers\OrderController::class, 'destroy'])->name('orders.destroy')->middleware('auth');