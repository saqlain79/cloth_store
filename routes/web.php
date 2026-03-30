<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductImageController;
use App\Http\Controllers\ProductVariantController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/categories/{category}/products', [HomeController::class, 'category_products_list'])->name('category_products_list');
Route::get('/products/{id}', [HomeController::class, 'show'])->name('show_product');

// Route::prefix('admin')->middleware(['auth','admin'])->group(function () {

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('products', ProductController::class)->except(['show']);
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
