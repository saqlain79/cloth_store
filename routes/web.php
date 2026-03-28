<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductVariantController;
use App\Http\Controllers\ProductImageController;



// Route::prefix('admin')->middleware(['auth','admin'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('products', ProductController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('users', UserController::class);
    Route::resource('variants', ProductVariantController::class);
    Route::resource('productimages', ProductImageController::class)->except(['show']);

    // Custom
    // Route::post('products/{id}/images', [ProductController::class, 'uploadImage']);
    // Route::post('orders/{id}/status', [OrderController::class, 'updateStatus']);
// });