<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;

// Rotas da área pública
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/produtos', [HomeController::class, 'products'])->name('products');

Route::get('/produtos/{product}', [HomeController::class, 'show'])->name('products.show');

// Rotas da área administrativa
Route::prefix('admin')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::resource('categories', CategoryController::class);

    Route::resource('products', ProductController::class);

});