<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\SigninController;
use App\Http\Controllers\SignupController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('car/search', [CarController::class, 'search'])->name('car.search');
Route::get('/car/{car}', [CarController::class, 'show'])->name('car.show');

Route::middleware(['auth'])->group(function () {
    Route::resource('car', CarController::class)->except('show');
    Route::get('car/watchlist', [CarController::class, 'watchlist'])->name('car.watchlist');
    Route::get('/car/{car}/images', [CarController::class, 'carImages'])->name('car.images');
    Route::post('/car/{car}/images', [CarController::class, 'addImages'])->name('car.addImages');
    Route::put('/car/{car}/images', [CarController::class, 'updateImages'])->name('car.updateImages');
});

Route::middleware(['guest'])->group(function () {
    Route::get('/signup', [SignupController::class, 'create'])->name('signup');
    Route::post('/signup', [SignupController::class, 'store'])->name('signup.store');
    Route::get('/signin', [SigninController::class, 'create'])->name('login');
    Route::post('/signin', [SigninController::class, 'store'])->name('login.store');
    Route::post('/logout', [SigninController::class, 'logout'])->name('logout');

    Route::get('/forgot-password', [PasswordResetController::class, 'showForgotPassword'])->name('password.request');
    Route::post('/forgot-password', [PasswordResetController::class, 'forgotPassword'])->name('password.email');
    Route::get('/reset-password/{token}', [PasswordResetController::class, 'showResetPassword'])->name('password.reset');
    Route::post('/reset-password', [PasswordResetController::class, 'resetPassword'])->name('password.update');
});




