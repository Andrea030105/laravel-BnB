<?php

use App\Http\Controllers\Admin\ApartmentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\SponsorController;
use App\Http\Controllers\Admin\StatsController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('apartments', ApartmentController::class);
    Route::get('/apartments/{apartment}/stats', [StatsController::class, 'index'])->name('stats.index');
    Route::resource('messages', MessageController::class);
    Route::get('/sponsors/payment', [SponsorController::class, 'payment'])->name('sponsors.payment');
    Route::resource('sponsors', SponsorController::class);
    Route::get('/geocode', [ApartmentController::class, 'geocode'])->name('geocode');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
