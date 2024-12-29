<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
// use Illuminate\Http\Request;

// Configures the application instance using the base path of the project.
return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php', // Specifies the path to the web routes file.
        commands: __DIR__ . '/../routes/console.php', // Specifies the path to the console commands routes file.
        health: '/up', // Defines a health check route.
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Middleware configuration to redirect unauthenticated users (guests) to the login page.
        $middleware->redirectGuestsTo(fn() => route('auth.login'));
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // Placeholder for handling custom exceptions. Add exception handling logic here if needed.
    })->create(); // Creates and returns the configured application instance.
