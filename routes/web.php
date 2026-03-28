<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductVariantController;
use App\Http\Controllers\ProductImageController;
use App\Http\Controllers\CartController;

use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/shirts', [HomeController::class, 'category_products_list'])->name('category_products_list');
Route::get('/pants', [HomeController::class, 'category_products_list'])->name('category_products_list');



// Route::prefix('admin')->middleware(['auth','admin'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('products', ProductController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('users', UserController::class);
    Route::resource('variants', ProductVariantController::class);
    Route::resource('productimages', ProductImageController::class)->except(['show']);
    Route::resource('carts', CartController::class);

    // Custom
    // Route::post('products/{id}/images', [ProductController::class, 'uploadImage']);
    // Route::post('orders/{id}/status', [OrderController::class, 'updateStatus']);
// });