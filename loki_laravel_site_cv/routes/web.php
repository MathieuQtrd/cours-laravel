<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\DevisController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});
Route::get('/competences', function () {
    return view('competences');
});
Route::get('/projets', function () {
    return view('projets');
});
Route::get('/contact', [ContactController::class, 'index']);
Route::post('/contact', [ContactController::class, 'sendContactMail']);
Route::get('/contacts', [ContactController::class, 'listeContacts']);

Route::get('/devis', [DevisController::class, 'create']);
Route::post('/devis', [DevisController::class, 'store']);
Route::get('/liste_devis', [DevisController::class, 'listeDevis']);
