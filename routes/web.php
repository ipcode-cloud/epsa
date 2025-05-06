<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\StockInController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.app');
});

Route::get('/login', function(){
    return view(('auth.login'));
});
Route::get('/register', function(){
    return view(('auth.register'));
});

Route::resource('products',ProductController::class);
Route::resource('stockin',StockInController::class);
