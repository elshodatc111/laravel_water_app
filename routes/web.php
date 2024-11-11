<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/farm', [HomeController::class, 'farm'])->name('farm');
Route::post('/farm_create', [HomeController::class, 'farm_create'])->name('farm_create');
Route::get('/farm_show/{id}', [HomeController::class, 'farm_show'])->name('farm_show');
Route::put('/farm_update/{id}', [HomeController::class, 'farm_update'])->name('farm_update');
Route::put('/farm_create_hodim/{id}', [HomeController::class, 'farm_create_hodim'])->name('farm_create_hodim');
Route::delete('/farm_delete_hodim/{id}', [HomeController::class, 'farm_delete_hodim'])->name('farm_delete_hodim');

