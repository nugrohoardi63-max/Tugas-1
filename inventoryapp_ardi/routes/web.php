<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormController;

// Route Home - diatur oleh DashboardController
Route::get('/', [DashboardController::class, 'index'])->name('home');

// Route Register - diatur oleh FormController
Route::get('/register', [FormController::class, 'register'])->name('register');

// Route Welcome - diatur oleh FormController (menerima POST dari form register)
Route::post('/welcome', [FormController::class, 'welcome'])->name('welcome');
