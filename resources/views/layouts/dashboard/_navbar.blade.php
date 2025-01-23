<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="{{ $route['dashboard'] }}">{{ $app['name'] }}</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!">
        <x-icon.bs-icon name="bi-list" />
    </button>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                data-bs-toggle="dropdown" aria-expanded="true">
                <x-icon.bs-icon name="bi-person" />
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown" data-bs-popper="static">
                <li><a class="dropdown-item" href="{{ $route['profile'] }}">Profile</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a id="actionLogout" class="dropdown-item" href="#">Logout</a></li>
            </ul>
        </li>
    </ul>
    Dashboard page
    <form id="formLogout" action="{{ $route['logout'] }}" method="POST">
        @csrf
    </form>
</nav>
