<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SigninController;
use App\Http\Controllers\SignupController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/signup', [SignupController::class, 'create'])->name('signup');
Route::post('/signup', [SignupController::class, 'store'])->name('signup.store');

Route::get('/signin', [SigninController::class, 'create'])->name('login');
Route::post('/signin', [SigninController::class, 'store'])->name('login.store');
Route::post('/logout', [SigninController::class, 'logout'])->name('logout');

Route::get('car/search', [CarController::class, 'search'])->name('car.search');

Route::get('car/watchlist', [CarController::class, 'watchlist'])->name('car.watchlist');

Route::resource('car', CarController::class);

Route::get('/car/{car}/images', [CarController::class, 'carImages'])->name('car.images');
Route::post('/car/{car}/images', [CarController::class, 'addImages'])->name('car.addImages');
Route::put('/car/{car}/images', [CarController::class, 'updateImages'])->name('car.updateImages');
