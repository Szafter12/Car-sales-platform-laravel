<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\EmailVerifyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\SigninController;
use App\Http\Controllers\SignupController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/car/search', [CarController::class, 'search'])->name('car.search');

Route::middleware(['guest'])->group(function () {
    Route::get('/signup', [SignupController::class, 'create'])->name('signup');
    Route::post('/signup', [SignupController::class, 'store'])->name('signup.store');
    Route::get('/login', [SigninController::class, 'create'])->name('login');
    Route::post('/login', [SigninController::class, 'store'])->name('login.store');
});

Route::middleware(['auth'])->group(function () {
    Route::middleware(['verified'])->group(function() {
        Route::get('/car/watchlist', [CarController::class, 'watchlist'])
            ->name('car.watchlist');
        Route::resource('car', CarController::class)->except(['show']);
        Route::get('/car/{car}/images', [CarController::class, 'carImages'])
            ->name('car.images');
        Route::put('/car/{car}/images', [CarController::class, 'updateImages'])
            ->name('car.updateImages');
        Route::post('/car/{car}/images', [CarController::class, 'addImages'])
            ->name('car.addImages');
    });

    Route::post('/logout', [SigninController::class, 'logout'])->name('logout');
});

Route::get('/car/{car}', [CarController::class, 'show'])->name('car.show');

Route::get('/forgot-password', [PasswordResetController::class, 'showForgotPassword'])
    ->name('password.request');
Route::post('/forgot-password', [PasswordResetController::class, 'forgotPassword'])
    ->name('password.email');
Route::get('/reset-password/{token}', [PasswordResetController::class, 'showResetPassword'])
    ->name('password.reset');
Route::post('/reset-password', [PasswordResetController::class, 'resetPassword'])
    ->name('password.update');


Route::get('/email/verify/{id}/{hash}', [EmailVerifyController::class, 'verify'])
    ->middleware(['auth', 'signed'])
    ->name('verification.verify');

Route::get('/email/verify', [EmailVerifyController::class, 'notice'])
    ->middleware('auth')
    ->name('verification.notice');

Route::post('/email/verification-notification', [EmailVerifyController::class, 'send'])
    ->middleware(['auth', 'throttle:6,1'])
    ->name('verification.send');
