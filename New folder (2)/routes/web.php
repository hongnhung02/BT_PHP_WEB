<?php

use App\Http\Controllers\Address\AddressController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Cart\CartController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Order\OrderController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Profile\ProfileController;
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

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('category', [CategoryController::class, 'index'])->name('category');
Route::get('product/{slug}', [ProductController::class, 'index'])->name('product');

Route::prefix('auth')->group(function () {
    Route::get('register', [AuthController::class, 'getRegister'])->name('auth.register');
    Route::post('register', [AuthController::class, 'postRegister'])->name('auth.register');
    Route::get('login', [AuthController::class, 'getLogin'])->name('auth.login');
    Route::post('login', [AuthController::class, 'postLogin'])->name('auth.login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile');
    Route::put('address', [ProfileController::class, 'update'])->name('address');
    Route::resource('address', AddressController::class)->names('user.address');
    Route::resource('order', OrderController::class)->names('user.order');
    Route::resource('cart', CartController::class)->names('user.cart');
    Route::prefix('auth')->group(function() {
        Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');
    });
});
