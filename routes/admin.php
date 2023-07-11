<?php

use App\Http\Controllers\admin\AboutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\ProductController;

Route::prefix('admin/')->name('admin.')->middleware(['auth'])->group(function (){
    Route::get('',[AdminController::class,'index'])->name('index');
    Route::get('about',[AdminController::class,'about'])->name('about');
    Route::get('about/edit/{id}',[AboutController::class,'edit'])->name('about.edit');
    Route::put('about/update/{id}',[AboutController::class,'update'])->name('about.update');


    Route::get('categories/trash',[CategoryController::class,'trash'])->name('categories.trash');
    Route::put('categories/{category}/restore',[CategoryController::class,'restore'])->name('categories.restore');
    Route::delete('categories/{category}/force-delete',[CategoryController::class,'forceDelete'])->name('categories.force-delete');
    Route::resource('categories',CategoryController::class);


    Route::get('products/trash',[ProductController::class,'trash'])->name('products.trash');
    Route::put('products/{product}/restore',[ProductController::class,'restore'])->name('products.restore');
    Route::delete('products/{product}/force-delete',[ProductController::class,'forceDelete'])->name('products.force-delete');
    Route::resource('products',ProductController::class);

    Route::get('orders',[OrderController::class,'index'])->name('orders');
    Route::get('orders/{id}',[OrderController::class,'show'])->name('orders.show');
});
