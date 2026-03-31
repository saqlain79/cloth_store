<?php
use App\Http\Controllers\AuthController;
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
use Illuminate\Support\Facades\Auth;

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/categories/{category}/products', [HomeController::class, 'category_products_list'])->name('category_products_list');
Route::get('/products/{id}', [HomeController::class, 'show'])->name('show_product');

// Cart & Checkout Routes (Protected)
Route::middleware('customer')->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{product_id}', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/remove/{product_id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/cart/update/{product_id}', [CartController::class, 'update'])->name('cart.update');
    Route::post('/checkout', [OrderController::class, 'checkout'])->name('checkout');
});


// Admin Routes
Route::middleware(['admin'])->group(function () {

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
});
