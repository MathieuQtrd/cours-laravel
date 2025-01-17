<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/gestion', function () {
    return view('gestion');
})->name('gestion');

Route::prefix('categories')->name('categories.')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('index');
    Route::get('/add', [CategoryController::class, 'create'])->name('create');
    Route::post('/add', [CategoryController::class, 'store'])->name('store');
    Route::get('/edit/{category}', [CategoryController::class, 'edit'])->name('edit');
    Route::put('/edit/{category}', [CategoryController::class, 'update'])->name('update');
    Route::delete('/delete/{category}', [CategoryController::class, 'destroy'])->name('destroy');
    // Route::get('/details/{employe}', [CategoryController::class, 'show'])->name('show');
});

Route::prefix('posts')->name('posts.')->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('index');
    Route::get('/add', [PostController::class, 'create'])->name('create');
    Route::post('/add', [PostController::class, 'store'])->name('store');
    Route::get('/edit/{post}', [PostController::class, 'edit'])->name('edit');
    Route::put('/edit/{post}', [PostController::class, 'update'])->name('update');
    Route::delete('/delete/{post}', [PostController::class, 'destroy'])->name('destroy');
    // Route::get('/fiche/{employe}', [PostController::class, 'show'])->name('show');
});