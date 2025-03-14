<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StripeCheckoutController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', [AuthController::class, 'user']);
});

Route::middleware(['auth:sanctum', 'role:admin'])->group(function () {
    Route::get('products', [ProductController::class, 'index']);
    Route::post('products', [ProductController::class, 'store']);
    Route::delete('products/{id}', [ProductController::class, 'destroy']);
});

Route::get('products/list', [ProductController::class, 'index']);
Route::get('products/{id}', [ProductController::class, 'show']);

Route::post('/checkout-session', [StripeCheckoutController::class, 'createCheckoutSession']);
