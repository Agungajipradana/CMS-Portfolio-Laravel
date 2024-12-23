<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\HomeController as SiteHomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Dashboard\HomeController;

Route::get('/', [SiteHomeController::class, 'index'])->name('site.home');
Route::get('/login', [LoginController::class, 'index'])->name('auth.login');
Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard.home');
