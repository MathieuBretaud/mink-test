<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/animals', \App\Http\Controllers\Api\AnimalApiController::class);

Route::prefix('admin')->name('admin.')->middleware('auth:sanctum')->group(function () {
    $idRegex = '[0-9]+';

    Route::get('/pictures/animal/{id}', [\App\Http\Controllers\Api\Admin\PictureController::class, 'picturesByAnimal'])->where([
        'id' => $idRegex,
    ]);

    Route::post('/pictures/animal/{id}', [\App\Http\Controllers\Api\Admin\PictureController::class, 'storePicturesByAnimal'])->where([
        'id' => $idRegex,
    ]);

    Route::delete('/picture/{picture}', [\App\Http\Controllers\Api\Admin\PictureController::class, 'delete'])->where([
        'picture' => $idRegex,
    ]);

    Route::get('/types', \App\Http\Controllers\Api\Admin\TypeController::class);
    Route::get('/breeds', \App\Http\Controllers\Api\Admin\BreedController::class);
});


