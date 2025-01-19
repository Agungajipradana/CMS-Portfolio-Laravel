<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>|   @yield('title')</title>
    @vite(['resources/sass/app.scss'])
</head>

<body class="sb-nav-fixed">
    @include('layouts.dashboard._navbar')
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            @include('layouts.dashboard._sidenav')
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">
                      @yield('title')
                    </h1>
                    @include('layouts.dashboard._breadcrumb')
                    @yield('content')
                </div>
            </main>
            @include('layouts.dashboard._footer')
        </div>
    </div>
    @vite(['resources/js/app.js', 'resources/js/layouts/dashboard.js'])
</body>

</html>
