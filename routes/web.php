<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FeeController;
use App\Http\Controllers\UserController;

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected Routes
Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Fees Routes
    Route::get('/fees', [FeeController::class, 'index'])->name('fees.index');
    Route::get('/fees/calculator', [FeeController::class, 'calculator'])->name('fees.calculator');
    Route::post('/fees/calculate', [FeeController::class, 'calculateFees'])->name('fees.calculate');

    // Admin Only Routes
    Route::middleware('admin')->group(function () {
        // Fees Management
        Route::get('/admin/fees', [FeeController::class, 'manage'])->name('fees.manage');
        Route::post('/admin/fees', [FeeController::class, 'store'])->name('fees.store');
        Route::put('/admin/fees/{fee}', [FeeController::class, 'update'])->name('fees.update');
        Route::delete('/admin/fees/{fee}', [FeeController::class, 'destroy'])->name('fees.destroy');

        // User Management
        Route::get('/admin/users', [UserController::class, 'index'])->name('users.index');
        Route::put('/admin/users/{user}/role', [UserController::class, 'updateRole'])->name('users.updateRole');
        Route::delete('/admin/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    });
});

// Welcome page (public)
Route::get('/', function () {
    return view('welcome');
});
