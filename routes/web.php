<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\indexController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('web.welcome');
});
Route::resource('/', indexController::class);
Route::get('detail/{id}', [ProductController::class, 'detail'])->name('product.detail');
Route::get('about', function () {
    return view('web.about');
});
Route::get('product', function () {
    return view('product.shop');
});
Route::get('product-detail', function () {
    return view('product.detail');
});
Route::get('post', function () {
    return view('post.index');
});
Route::get('cart', [CartController::class, 'index'])->name('cart.index');
