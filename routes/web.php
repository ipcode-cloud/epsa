<?php

use App\Http\Controllers\ChiefController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\StockInController;
use App\Http\Controllers\StockOutController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.app');
});

Route::get('/login', function(){
    return view(('auth.login'));
});
Route::get('/register', [ChiefController::class, 'register']);
Route::post('/login', [ChiefController::class, 'login'])->name('login');
Route::post('/logout', [ChiefController::class, 'logout'])->name('logout');
// Route::post('/register', [ChiefController::class, 'store'])->name('registerUser');
Route::resource('/auth', ChiefController::class);
Route::resource('/auth', ChiefController::class);

Route::middleware('auth')->group(function () {
    Route::resource('products',ProductController::class);
    Route::resource('stockin',StockInController::class);
    Route::resource('stockout',StockOutController::class);
    Route::resource('report', ReportController::class);
    Route::get('/dashboard', function () {
        return view('dashboard.index');
    })->name('dashboard');
});
