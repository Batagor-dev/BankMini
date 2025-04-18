<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\TellerController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Middleware\RoleMiddleware;

// Route untuk halaman utama
Route::get('/', function () {
    return view('welcome');
});

// Route untuk login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Route untuk admin
Route::middleware([RoleMiddleware::class . ':admin'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard admin
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // Manajemen user
    Route::resource('users', UserController::class);

    // Manajemen teller
    Route::resource('tellers', TellerController::class);

    // Manajemen admin
    Route::resource('admins', AdminController::class)->except(['create', 'store', 'destroy']);
    Route::get('reset-password', [AdminController::class, 'resetPasswordForm'])->name('admins.reset-password');
    Route::post('reset-password', [AdminController::class, 'resetPassword'])->name('admins.reset-password');
});

// Route untuk teller
Route::middleware([RoleMiddleware::class . ':teller'])->group(function () {
    Route::get('/teller/dashboard', function () {
        return view('teller.dashboard');
    })->name('teller.dashboard');
});

// Route untuk user
Route::middleware([RoleMiddleware::class . ':user'])->group(function () {
    Route::get('/user/dashboard', function () {
        return view('user.dashboard');
    })->name('user.dashboard');
});

// Route untuk logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
