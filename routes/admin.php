<?php

use App\Http\Controllers\PruebaController;
use Illuminate\Support\Facades\Route;

Route::prefix('')->group(function () {
    Route::get('/tasks', [PruebaController::class, 'index']);
    Route::get('/function', [PruebaController::class, 'miMetodo']);
    Route::post('/function', [PruebaController::class, 'prueba']);
    Route::put('/update_test/{id}', [PruebaController::class, 'updatePrueba']);
});
