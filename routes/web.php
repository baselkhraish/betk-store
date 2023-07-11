<?php

use App\Http\Controllers\front\CartController;
use App\Http\Controllers\front\CategoryController;
use App\Http\Controllers\front\CheckoutController;
use App\Http\Controllers\front\ProductController;
use App\Http\Controllers\front\HomeController;
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

Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/about-us', [HomeController::class,'about'])->name('about');

Route::get('/products', [ProductController::class,'index'])->name('product.index');
Route::get('/products/{product:slug}', [ProductController::class,'show'])->name('product.show');

Route::resource('cart',CartController::class);

Route::get('/categories', [CategoryController::class,'index'])->name('category.index');
Route::get('/categories/{category:slug}', [CategoryController::class,'show'])->name('category.show');



Route::resource('cart',CartController::class);

Route::get('checkout',[CheckoutController::class,'create'])->name('checkout');
Route::post('checkout',[CheckoutController::class,'store']);


require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
