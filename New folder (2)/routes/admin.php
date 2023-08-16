<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;

// Admin
Route::prefix('auth')->group(function () {
    Route::get('login', [AuthController::class, 'getLogin'])->name('admin.auth.login');
});

Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

Route::resource('category', CategoryController::class)->names('admin.category');
Route::resource('product', ProductController::class)->names('admin.product');
Route::resource('order', OrderController::class)->names('admin.order');
