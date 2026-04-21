<?php

use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Api\ApartmentController;
use Illuminate\Support\Facades\Route;

Route::get('/apartments', [ApartmentController::class, 'index']);
Route::get('/apartments/{slug}', [ApartmentController::class, 'show']);
Route::post('/send-mail', [MessageController::class, 'send']);
Route::post('/apartments/{apartment}/views', [ApartmentController::class, 'incrementViews']);
