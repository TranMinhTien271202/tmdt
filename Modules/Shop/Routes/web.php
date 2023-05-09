<?php

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

use Modules\Shop\Http\Controllers\BrandController;
use Illuminate\Support\Facades\Route;
use Modules\Shop\Http\Controllers\AuthController;
use Modules\Shop\Http\Controllers\CategoryController;
use Modules\Shop\Http\Controllers\ProductController;
use Modules\Shop\Http\Controllers\ShopController;
use Modules\Shop\Http\Middleware\Check;

Route::prefix('shop')->group(function () {
    Route::get('/', [AuthController::class, 'index'])->name('shop.login');
    Route::get('register', [AuthController::class, 'create'])->name('shop.register');
    // Route::middleware('auth:sanctum')->group(function () {
    //     Route::get('dashboard', [ShopController::class, 'index'])->name('dashboard');
    //     Route::get('brand', [BrandController::class, 'index'])->name('brand.index');
    // });
    Route::middleware('auth:sanctum', 'shop')->group(function () {
        // Route::get('checkToken', [AuthController::class, 'checkToken'])->name('check');
        Route::get('dashboard', [ShopController::class, 'index'])->name('dashboard');
        Route::get('logout', [AuthController::class, 'logout'])->name('logout');
        Route::resource('brand', BrandController::class)->only('index', 'destroy');
        Route::resource('category', CategoryController::class)->only('index', 'destroy');
        Route::resource('product', ProductController::class)->only('index', 'destroy');
    });
});
