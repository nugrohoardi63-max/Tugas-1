<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormController;

// Route Home - diatur oleh DashboardController
Route::get('/', [DashboardController::class, 'index'])->name('home');

// Route Register - diatur oleh FormController
Route::get('/register', [FormController::class, 'register'])->name('register');

// Route Welcome - diatur oleh FormController (menerima POST dari form register)
Route::post('/welcome', [FormController::class, 'welcome'])->name('welcome');

// Route CRUD Category - diatur oleh CategoryController
Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
Route::get('/category/{id}', [CategoryController::class, 'show'])->name('category.show');
Route::get('/category/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
Route::put('/category/{id}', [CategoryController::class, 'update'])->name('category.update');
Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
