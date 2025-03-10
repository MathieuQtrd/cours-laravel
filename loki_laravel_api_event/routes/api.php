<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ConcertController;

Route::apiResource('concerts', ConcertController::class);
// apiResource nous crée toutes les routes suivantes 
// GET      /api/concerts             api.concerts.index
// GET      /api/concerts/{concert}   api.concerts.show

// POST     /api/concerts             api.concerts.store
// PUT      /api/concerts/{concert}   api.concerts.update
// DELETE   /api/concerts/{concert}   api.concerts.destroy