<?php

use App\Http\Controllers\Api\ApartmentController;
use Illuminate\Support\Facades\Route;

Route::get('/apartments', [ApartmentController::class, 'index']);
Route::get('/apartments/{slug}', [ApartmentController::class, 'show']);
