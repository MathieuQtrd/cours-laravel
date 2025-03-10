<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ConcertController;
use App\Models\Concert;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function() {
    Route::resource('concerts', ConcertController::class);
    // resource nous crée toutes les routes suivantes 
    // GET      /admin/concerts             admin.concerts.index
    // GET      /admin/concerts/create      admin.concerts.create
    // POST     /admin/concerts             admin.concerts.store
    // GET      /admin/concerts/{concert}   admin.concerts.edit
    // PUT      /admin/concerts/{concert}   admin.concerts.update
    // DELETE   /admin/concerts/{concert}   admin.concerts.destroy
});

Route::get('/concerts', function() {
    return view('concerts.index');
})->name('concerts.index');

Route::get('/concerts/{id}', function($id) {
    return view('concerts.show', ['id' => $id]);
})->name('concerts.show');

