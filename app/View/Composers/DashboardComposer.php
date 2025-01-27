<?php

namespace App\View\Composers;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardComposer
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        // Constructor is empty here, but can be used for initialization if needed
    }

    public function compose(View $view): void
    {
        // Add app configuration details to the view
        // 'app' contains the name of the application and the current language locale
        $view->with('app', [
            'name' => config('app.name'), // Get app name from config
            'lang' => str_replace('_', '-', app()->getLocale()), // Current locale with underscore replaced by hyphen
        ]);

        // Add authenticated user information to the view
        $view->with('user', Auth::user()); // Inject the current authenticated user into the view

        // Define some routes and pass them to the view
        $view->with('route', [
            'dashboard' => route('dashboard.home'), // Route to the dashboard
            'profile' => '/', // Route to the user profile
            'logout' => route('auth.logout'), // Route to log the user out
        ]);

        // Add a side navigation menu to the view
        $view->with('sidenavmenu', $this->getMenus()); // Fetch and inject the menu structure
    }

     // This method returns the menu structure for the sidebar
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
