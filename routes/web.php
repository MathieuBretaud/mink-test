<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');


Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('animal', \App\Http\Controllers\Admin\AnimalController::class)->except(['show']);
});
