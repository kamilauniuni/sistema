<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('proveedores', App\Http\Controllers\proveedoreController::class);

Route::resource('productos', App\Http\Controllers\productoController::class);