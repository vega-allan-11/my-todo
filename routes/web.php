<?php

use App\Http\Controllers\Auth\RegisterUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginUserController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\RequestPasswordResetController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\StatisticsController;


// Pages that doesn't require authentication
Route::get('/register', [RegisterUserController::class, 'show'])->name('register.show');
Route::post('/register', [RegisterUserController::class, 'store'])->name('register.store');

Route::get('/login', [LoginUserController::class, 'show'])->name('login');
Route::post('/login', [LoginUserController::class, 'store'])->name('login.store');

Route::get('/forgot-password', [RequestPasswordResetController::class, 'show'])->name('password-request.show');
Route::post('/forgot-password', [RequestPasswordResetController::class, 'store'])->name('password-request.store');
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'show'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'store'])->name('password.update');


// Pages that require authentication
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'show'])->name('home');

    Route::get('/tasks', [TaskController::class, 'show'])->name('tasks');
    Route::get('/tasks/{id}', [TaskController::class, 'showSpecific'])->name('tasks.showSpecific');
    Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
    Route::delete('/tasks/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');
    Route::put('/tasks/{id}', [TaskController::class, 'update'])->name('tasks.update');
    
    Route::get('/statistics', [StatisticsController::class, 'show'])->name('statistics');
    
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'updateGeneralInfo'])->name('profile.update-general-info');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.update-password');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.delete');
      
    Route::post('/logout', [LoginUserController::class, 'logout'])->name('logout');
});


