<?php

namespace App\Providers;

use Illuminate\Support\Facades\View; // Used for interacting with views
use App\View\Composers\DashboardComposer; // Import the DashboardComposer class to compose view data dynamically
use Illuminate\Support\ServiceProvider; // Base class for all service providers in Laravel

class DashboardProvider extends ServiceProvider
{
    /**
     * Register services.
     * 
     * This method is used to bind services into the container, 
     * but it is not needed in this example since no services are registered here.
     */
    public function register(): void
    {
        // No services are being registered in this provider, so the method remains empty.
    }

    /**
     * Bootstrap services.
     * This method is used to configure services after all the services have been registered.
     * Here, we are defining a view composer to inject dynamic data into the dashboard layout view.
     */
    public function boot(): void
    {
        // Register the DashboardComposer to compose the 'layouts.dashboard.dashboard-layout' view
        // This means whenever the 'dashboard-layout' view is rendered, the data injected by the DashboardComposer will be available
        View::composer('layouts.dashboard.dashboard-layout', DashboardComposer::class);
    }
}
