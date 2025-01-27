<?php

namespace App\View\Composers;

use Illuminate\Support\Facades\Auth; // Import Auth facade for accessing the authenticated user
use Illuminate\Support\Facades\Request; // Import Request facade to access the current request URL
use Illuminate\View\View; // Import the View class to work with views

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
        $view->with('sidenavmenu', $this->generateMenu()); // Fetch and inject the menu structure
    }

    // This method generates the side navigation menu and sets the active state based on the current route
    private function generateMenu()
    {
        $menus = $this->getMenus(); // Fetch the menu structure
        $this->setMenuActive($menus); // Set the active state for the menus based on the current route
        return $menus; // Return the modified menu structure
    }

    // This method sets the active state for the menus based on the current request URL
    private function setMenuActive(&$menus)
    {
        // Recursive function to traverse the menu items and mark them as active if their route matches the current URL
        $setMenuActive = function (&$menu) use (&$setMenuActive) {
            $isActive = false; // Variable to track if any menu item is active

            // Iterate through each menu item
            foreach ($menu as &$item) {
                // If the menu item has a dropdown, check its items
                if (isset($item['dropdown'])) {
                    // Recursively check the dropdown items
                    $item['active'] = $setMenuActive($item['dropdown']);
                    // If no dropdown, compare the route of the item with the current request URL
                } else {
                    // Set active if the route matches
                    $item['active'] = ($item['route'] == Request::fullUrl());
                }

                // Track if any item is active in this menu
                $isActive = $isActive || $item['active'];
            }

            // Return if any item in this menu is active
            return $isActive;
        };

        // Iterate through each menu to check and set active state for submenus
        foreach ($menus as &$menu) {
            // If the menu contains submenus
            if (isset($menu['menus'])) {
                // Recursively set the active state for the submenus
                $setMenuActive($menu['menus']);
            }
        }

        // Return the modified menus with active states set
        return $menus;
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
                        'route' => route('dashboard.home'),
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
