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

Route::get('product/{product:slug}', function (Product $product) {
    return view('product-detail', ["product" => $product]);
});

Route::post('/search-image', [ImageController::class, 'searchImage'])->name('search.image');


# Admin
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', RoleMiddleware::class.':admin'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
