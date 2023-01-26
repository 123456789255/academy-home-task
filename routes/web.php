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

Route::get('/welcome', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [App\Http\Controllers\IndexController::class, 'index'])->name('index');

Route::get('/katalog', [App\Http\Controllers\CatalogController::class, 'katalog'])->name('katalog');

Route::get('/busket', [App\Http\Controllers\BusketController::class, 'busket'])->name('busket');

Route::get('/katalog/{product}', function ($product) {
    return view('product', ['product' => $product]);
});
