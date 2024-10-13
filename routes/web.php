<?php

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\RoleMiddleware;

# User
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/products', [ProductController::class, 'find'])->name('products.find');

Route::get('product/{slug}', [ProductController::class, 'showDetailProduct']);

Route::post('/search-image', [ImageController::class, 'searchImage'])->name('search.image');


# Admin
Route::get('/dashboard', [ProductController::class, 'index'])
    ->middleware(['auth', 'verified', RoleMiddleware::class.':admin'])
    ->name('dashboard');

Route::get('/dashboard/product-add/', [ProductController::class, 'add'])
    ->middleware(['auth', 'verified', RoleMiddleware::class.':admin'])
    ->name('product.add');

Route::post('/dashboard/product-store', [ProductController::class, 'store'])
    ->middleware(['auth', 'verified', RoleMiddleware::class.':admin'])
    ->name('product.store');

Route::get('/dashboard/product-edit/{id}', [ProductController::class, 'edit'])
    ->middleware(['auth', 'verified', RoleMiddleware::class.':admin'])
    ->name('product.edit');

Route::put('/dashboard/product-update/{id}', [ProductController::class, 'update'])
    ->middleware(['auth', 'verified', RoleMiddleware::class.':admin'])
    ->name('product.update');

Route::delete('/dashboard/product-delete/{id}', [ProductController::class, 'destroy'])
    ->middleware(['auth', 'verified', RoleMiddleware::class.':admin'])
    ->name('product.destroy');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
