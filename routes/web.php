<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;


/** Vitrine Pública */
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/produto/{product}', [HomeController::class, 'show'])->name('catalog.product');

Route::get('/dashboard', [DashboardController::class,'index'])->middleware(['auth','verified'])->name('dashboard');

/**Rotas dos Produtos */
Route::prefix('admin')->group(function(){
    
Route::resource('products', ProductController::class);
Route::get('products/{product}/delete',[ProductController::class, 'delete'])->name('products.delete');
});

/** Categorias */
Route::prefix('admin')->group(function () {

    Route::resource('categories', CategoryController::class)->except('show');
    Route::get('categories/{category}/delete',[CategoryController::class, 'delete'])->name('categories.delete');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
