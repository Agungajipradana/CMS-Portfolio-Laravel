<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\HomeController as SiteHomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Dashboard\HomeController;

Route::get('/', [SiteHomeController::class, 'index'])->name('site.home');

// not logged in
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('auth.login');
    Route::post('/login', [LoginController::class, 'action'])->name('auth.login.action');
});

// logged in
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard.home');
});
