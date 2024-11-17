<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('animal', \App\Http\Controllers\Admin\AnimalController::class)->except(['show']);
});
