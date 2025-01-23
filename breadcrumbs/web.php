<?php // routes/breadcrumbs.php
// Import the Breadcrumbs class from the Diglactic package.
use Diglactic\Breadcrumbs\Breadcrumbs;

// Import the Generator class for defining breadcrumb trails.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Define a breadcrumb for the "dashboard" route.
Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    // Add a breadcrumb link titled "Dashboard" that points to the 'dashboard.home' route.
    $trail->push('Dashboard', route('dashboard.home'));
});
