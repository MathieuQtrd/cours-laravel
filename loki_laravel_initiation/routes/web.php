<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;

Route::get('/', [IndexController::class, 'index']);

Route::get('/mentions', function () {
    return view('mentions');
});

Route::get('/galerie', function () {
    return view('galerie');
});
