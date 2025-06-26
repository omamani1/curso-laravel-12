<?php

use App\Http\Controllers\PruebaController;
use App\Http\Controllers\Test1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;


Route::get('/saludo', [PruebaController::class, 'saludo']);

Route::get('/tareas1', [PruebaController::class, 'index'])->middleware('AuthToken');

Route::get('/mi', [PruebaController::class, 'miMetodo']);

Route::prefix('admin')->group(function () {
    Route::get('/tareas', [PruebaController::class, 'index'])->name('lista_tareas2');
    Route::get('/miMetodo', [PruebaController::class, 'miMetodo'])->name('lista_tareas3');
});

Route::get('/invoke', Test1::class)->name('lista_tareas2');
Route::get('/nombre/{name}', function (Request $request, $name) {
    Log::info("nombre : " . $name);
    return view('welcome', ['name' => $name]);
});

Route::get('/prueba', function (Request $request) {
    $name = $request->name;
    $email = $request->email;
    return "Prueba de ruta " . $name .  " Email : " . $email;
});

Route::post('/prueba', function (Request $request) {
    $name = $request->name;
    $email = $request->email;
    return "Prueba de ruta " . $name .  " Email : " . $email;
});
Route::view('/home', 'welcome');
