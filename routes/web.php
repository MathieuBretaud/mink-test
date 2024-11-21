<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');


Route::get('/images/{path}', [ImageController::class, 'show'])->where('path', '.*');


Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::resource('animal', \App\Http\Controllers\Admin\AnimalController::class)->except(['show']);
});

Route::get('/login', [\App\Http\Controllers\AuthController::class, 'login'])
    ->middleware('guest')
    ->name('login');
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'doLogin']);
Route::delete('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');
