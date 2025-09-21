<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Web\{DashboardController, CartController};
use App\Http\Controllers\Web\ProductController;
use App\Http\Controllers\Web\ClientController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Carro
    Route::get('cart', [CartController::class,'show'])->name('cart.show');
    Route::post('cart/items', [CartController::class,'add'])->name('cart.add');
    Route::patch('cart/items/{item}', [CartController::class,'update'])->name('cart.update');
    Route::delete('cart/items/{item}', [CartController::class,'remove'])->name('cart.remove');
    Route::post('cart/convert', [CartController::class,'convert'])->name('cart.convert');
    
    Route::get('/', DashboardController::class)->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/phpver', fn() => phpversion());

    //rutas web
    Route::resource('clients', ClientController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy', 'show']);
});

require __DIR__.'/auth.php';
