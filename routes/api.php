<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/animals', \App\Http\Controllers\Api\AnimalApiController::class);
