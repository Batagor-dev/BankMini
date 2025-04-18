<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\RoleMiddleware;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::middleware([RoleMiddleware::class . ':admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});
Route::middleware([RoleMiddleware::class . ':teller'])->group(function () {
    Route::get('/teller/dashboard', function () {
        return view('teller.dashboard');
    })->name('teller.dashboard');
});
Route::middleware([RoleMiddleware::class . ':user'])->group(function () {
    Route::get('/user/dashboard', function () {
        return view('user.dashboard');
    })->name('user.dashboard');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
