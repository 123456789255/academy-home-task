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

Route::get('/', [App\Http\Controllers\ProductController::class, 'about'])->name('about');

Auth::routes();

Route::get('/home', [App\Http\Controllers\ProductController::class, 'about'])->name('home');

Route::get('/catalog', [App\Http\Controllers\CatalogController::class, 'catalog']);
Route::get('/where', [App\Http\Controllers\WhereController::class, 'where']);

Route::get('/catalog/sort/{name}/{nap}',[App\Http\Controllers\CatalogController::class, "sort"]  );
Route::get('/catalog/filtr/{idCat}',[App\Http\Controllers\CatalogController::class, "prodCat"] );
Route::get('/cart', [App\Http\Controllers\CartController::class, 'showCart'])->name('cart.show');
Route::post('/add-to-cart/{productId}', [App\Http\Controllers\CartController::class, 'addToCart'])->name('cart.add');
Route::get('/add-on-cart/{productId}', [App\Http\Controllers\CartController::class, 'addOnCart'])->name('cart.add.inside');
Route::get('/remove-from-card/{productId}', [App\Http\Controllers\CartController::class, 'removeFromCart'])->name('cart.remove.one');
Route::get('/remove-all-from-card/{productId}', [App\Http\Controllers\CartController::class, 'removeAllFromCart'])->name('cart.remove.all');
Route::get('/product/{product}', [App\Http\Controllers\ProductController::class, 'show'])->name('product');
