<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\HomeController as SiteHomeController;
use App\Http\Controllers\Auth\{LoginController, LogoutController};
use App\Http\Controllers\Dashboard\HomeController;

// Defines the route for the homepage, handled by the index method of SiteHomeController.
Route::get('/', [SiteHomeController::class, 'index'])->name('site.home');

// Routes for guests (not logged-in users).
Route::middleware(['guest'])->group(function () {
    // Route for displaying the login page, handled by the index method of LoginController.
    Route::get('/login', [LoginController::class, 'index'])->name('auth.login');
    // Route for handling the login form submission, handled by the action method of LoginController.
    Route::post('/login', [LoginController::class, 'action'])->name('auth.login.action');
});

// Routes for authenticated users (logged-in users).
Route::middleware(['auth'])->group(function () {
    // Route for handling logout, handled by LogoutController.
    Route::post('/logout', LogoutController::class)->name('auth.logout');
    // Route for displaying the dashboard homepage, handled by the index method of HomeController.
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard.home');
});
