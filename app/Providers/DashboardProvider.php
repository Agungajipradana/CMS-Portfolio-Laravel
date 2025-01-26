<?php

namespace App\Providers;

use Illuminate\Support\Facades\View as FView;  // Alias for View facade
use Illuminate\Support\Facades\Auth; // For handling user authentication
use Illuminate\View\View; // For type hinting in view
use Illuminate\Support\ServiceProvider; // Base class for all service providers

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
        //
    }

    /**
     * Bootstrap services.
     * This method is used to configure services after all the services have been registered.
     * Here, we are composing the layout with some dynamic data for the dashboard.
     */
    public function boot(): void
    {
        // Using FView (alias for View) to compose a view
        // This will inject the data into 'layouts.dashboard.dashboard-layout' view
        FView::composer('layouts.dashboard.dashboard-layout', function (View $view) {

            // Add app configuration details to the view
            // 'app' contains the name of the application and the current language locale
            $view->with('app', [
                'name' => config('app.name'), // Get app name from config
                'lang' => str_replace('_', '-', app()->getLocale()), // Current locale with underscore replaced by hyphen
            ]);

            // Add authenticated user information to the view
            $view->with('user', Auth::user()); // Inject the current authenticated user

            // Define some routes and pass them to the view
            $view->with('route', [
                'dashboard' => route('dashboard.home'), // Route to the dashboard
                'profile' => '/', // Route to the user profile
                'logout' => route('auth.logout'), // Route to log the user out
            ]);

            // Add a side navigation menu to the view
            $view->with('sidenavmenu', $this->getMenus()); // Fetch and inject the menu structure
        });
    }

    /**
     * Generate the menu structure for the sidebar.
     * 
     * This function returns an array that contains the structure for the navigation menu.
     * It is divided into categories like 'Core' and 'Dropdown', with specific links under each category.
     */
    private function getMenus(): array
    {
        return [
            [
                'heading' => 'Core',
                'menus' => [
                    [
                        'title' => 'Dashboard',
                        'icon' => 'bi-speedometer2',
                        'route' => '/',
                    ],
                ],
            ],
            [
                'heading' => 'Dropdown',
                'menus' => [
                    [
                        'title' => 'Link 1',
                        'icon' => 'bi-share',
                        'dropdown' => [
                            [
                                'title' => 'Link 1.1',
                                'route' => '/',
                            ],
                            [
                                'title' => 'Link 1.2',
                                'route' => '/',
                            ],
                        ],
                    ],
                    [
                        'title' => 'Link 2',
                        'icon' => 'bi-share',
                        'dropdown' => [
                            [
                                'title' => 'Link 2.1',
                                'route' => '/',
                            ],
                            [
                                'title' => 'Link 2.2',
                                'route' => '/',
                            ],
                        ],
                    ],
                    [
                        'title' => 'Link 3',
                        'icon' => 'bi-share',
                        'route' => '/',
                    ],
                ],
            ],
        ];
    }
}
