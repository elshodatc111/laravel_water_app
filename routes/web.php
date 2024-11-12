<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;


Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/farm', [HomeController::class, 'farm'])->name('farm');
Route::post('/farm_create', [HomeController::class, 'farm_create'])->name('farm_create');
Route::get('/farm_show/{id}', [HomeController::class, 'farm_show'])->name('farm_show');
Route::put('/farm_update/{id}', [HomeController::class, 'farm_update'])->name('farm_update');
Route::put('/farm_create_hodim/{id}', [HomeController::class, 'farm_create_hodim'])->name('farm_create_hodim');
Route::delete('/farm_delete_hodim/{id}', [HomeController::class, 'farm_delete_hodim'])->name('farm_delete_hodim');
Route::put('/farm_create_paymart/{id}', [HomeController::class, 'farm_create_paymart'])->name('farm_create_paymart');
Route::delete('/farm_delete_paymart/{id}', [HomeController::class, 'farm_delete_paymart'])->name('farm_delete_paymart');


Route::get('/balans', [UserController::class, 'balans'])->name('balans');
Route::get('/hodim', [UserController::class, 'hodim'])->name('hodim');
Route::post('/hodim_create', [UserController::class, 'hodim_create'])->name('hodim_create');
Route::put('/hodim_create_look/{id}', [UserController::class, 'hodim_create_look'])->name('hodim_create_look');
Route::put('/hodim_update_password/{id}', [UserController::class, 'hodim_update_password'])->name('hodim_update_password');
Route::get('/hudud', [UserController::class, 'hudud'])->name('hudud');
Route::post('/hudud_create', [UserController::class, 'hudud_create'])->name('hudud_create');
Route::put('/hudud_look/{id}', [UserController::class, 'hudud_look'])->name('hudud_look');


Route::get('/orders', [UserController::class, 'orders'])->name('orders');
Route::post('/orders_create', [UserController::class, 'orders_create'])->name('orders_create');
Route::put('/order_delete/{id}', [UserController::class, 'order_delete'])->name('order_delete');
Route::get('/report', [UserController::class, 'report'])->name('report');
Route::post('/report_show', [UserController::class, 'report_show'])->name('report_show');


Route::get('/charts', [UserController::class, 'charts'])->name('charts');
