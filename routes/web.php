<?php

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/products', [ProductController::class, 'find'])->name('products.find');

Route::get('product/{product:slug}', function (Product $product) {
    return view('product-detail', ["product" => $product]);
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
