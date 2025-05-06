<?php

use App\Http\Controllers\ChiefController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StockInController;
use App\Http\Controllers\StockOutController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.app');
});

Route::get('/login', ChiefController::class . '@index')->name('login');
Route::get('/login', ChiefController::class . '@register')->name('register');
Route::post('/login', ChiefController::class . '@login')->name('login');
Route::post('/register', ChiefController::class . '@store')->name('register');
Route::get('/', function(){
    return view(('dashboard.index'));
})->name('dashboard');

Route::resource('products', ProductController::class);
Route::resource('stockin', StockInController::class);
Route::resource('stockout', StockOutController::class);
