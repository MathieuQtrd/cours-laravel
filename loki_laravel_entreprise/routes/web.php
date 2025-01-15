<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EntrepriseController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\ServiceController;

Route::get('/', [EntrepriseController::class, 'index']);

Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/ajouter', [ServiceController::class, 'create'])->name('services.create');
Route::post('/services/ajouter', [ServiceController::class, 'store'])->name('services.store');
Route::get('/services/edit/{service}', [ServiceController::class, 'edit'])->name('services.edit');
Route::put('/services/{service}', [ServiceController::class, 'update'])->name('services.update');
