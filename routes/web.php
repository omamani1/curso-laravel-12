<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('tasks', TaskController::class);
    Route::get('tasks/export/pdf', [TaskController::class, 'exportarPDF'])->name('export-task-pdf');
    Route::get('tasks/export/xls', [TaskController::class, 'exportarExcel'])->name('export-task-excel');
    Route::resource('tags', TagController::class)->except(['show']);
});

require __DIR__ . '/auth.php';
