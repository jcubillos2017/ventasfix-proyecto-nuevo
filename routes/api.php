<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\{UserController, ProductController, ClientController, CartController};
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController as ApiUserController;
use App\Http\Controllers\Api\ProductController as ApiProductController;
use App\Http\Controllers\Api\ClientController as ApiClientController;

Route::prefix('v1')->group(function () {


//Auth Publico

Route::post('auth/login', [AuthController::class, 'login'])->name('api.auth.login');

Route::middleware('auth:sanctum')->group(function () {
    Route::post('auth/login', [AuthController::class, 'login'])->name('api.auth.login');

    Route::apiResource('users', UserController::class);
    Route::apiResource('products', ProductController::class);
    Route::apiResource('clients', ClientController::class);

    // CRUD Users / Products / Clients
    Route::apiResource('users', ApiUserController::class);
    Route::apiResource('products', ApiProductController::class);
    Route::apiResource('clients', ApiClientController::class);


    Route::get('cart', [CartController::class,'show']);
    Route::post('cart/items', [CartController::class,'addItem']);
    Route::patch('cart/items/{item}', [CartController::class,'updateQty']);
    Route::delete('cart/items/{item}', [CartController::class,'removeItem']);
    Route::delete('cart', [CartController::class,'clear']);
    Route::post('cart/convert', [CartController::class,'convert']);

    Route::post('auth/logout', [AuthController::class, 'logout'])->name('api.auth.logout');
});
});