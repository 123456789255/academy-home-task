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


/*??????????????*/
Route::get('/admin', function () {
    if(Auth::user()->role == 2)
        return view('admin.admin');
    else
        return view('admin.none-admin');
});

// ???????????????? ???????????? ???????? ??????????????
Route::get('/admin/orders', [App\Http\Controllers\AdminController::class, 'orders'])->name('admin.orders');

// ???????????????? ???????????????????? ?? ???????????????????? ???????????? ?? ?????? ??????????????????
Route::get('/admin/order/{id}', [App\Http\Controllers\AdminController::class, 'viewOrder'])->name('admin.viewOrder');

// ???????????? ???????????? ??????????????????????????????
Route::post('/admin/order/cancel/{id}', [App\Http\Controllers\AdminController::class, 'cancelOrder'])->name('admin.cancelOrder');

// ?????????????????????????? ???????????? ??????????????????????????????
Route::post('/admin/order/confirm/{id}', [App\Http\Controllers\AdminController::class, 'confirmOrder'])->name('admin.confirmOrder');

// ???????????????? ???????????? ???????? ??????????????
Route::get('/admin/products',[App\Http\Controllers\AdminController::class, 'products'])->name('admin.products');

// ???????????????????? ????????????
Route::post('/admin/product', [App\Http\Controllers\AdminController::class, 'addProduct'])->name('admin.addProduct');

// ???????????????? ????????????
Route::delete('/admin/product/delete/{id}', [App\Http\Controllers\AdminController::class, 'deleteProduct'])->name('admin.deleteProduct');

// ???????????????????????????? ????????????
Route::get('/admin/product/edit/{id}', [App\Http\Controllers\AdminController::class, 'editProduct'])->name('admin.editProduct');
Route::put('/admin/product/update/{id}', [App\Http\Controllers\AdminController::class, 'updateProduct'])->name('admin.updateProduct');

//??????????????????
Route::get('/admin/category', [App\Http\Controllers\AdminController::class, 'categories'])->name('admin.category');
Route::post('/admin/category/add/', [App\Http\Controllers\AdminController::class, 'addCategory'])->name('admin.addCategory');
Route::delete('/admin/category/delete/{id}', [App\Http\Controllers\AdminController::class, 'deleteCategory'])->name('admin.deleteCategories');
Route::get('/admin/category/edit/{id}', [App\Http\Controllers\AdminController::class, 'editCategory'])->name('admin.editCategories');
Route::put('/admin/category/update/{id}', [App\Http\Controllers\AdminController::class, 'updateCategory'])->name('admin.updateCategories');
