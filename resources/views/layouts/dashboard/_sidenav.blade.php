<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            @foreach ($sidenavmenu as $menus)
                @foreach ($menus as $key => $value)
                    @if ($key == 'heading')
                        <div class="sb-sidenav-menu-heading">
                            {{ $value }}
                        </div>
                    @endif

                    @if ($key == 'menus')
                        @foreach ($value as $menu)
                            @isset($menu['dropdown'])
                                @php
                                    $databstarget = 'collapseLink' . $loop->index + 1;
                                @endphp
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                    data-bs-target="#{{ $databstarget }}" aria-expanded="false"
                                    aria-controls="{{ $databstarget }}">
                                    <div class="sb-nav-link-icon">
                                        <x-icon.bs-icon name="{{ $menu['icon'] }}" />
                                    </div>
                                    {{ $menu['title'] }}
                                    <div class="sb-sidenav-collapse-arrow">
                                        <x-icon.bs-icon name="bi-chevron-down" />
                                    </div>
                                </a>

                                <div class="collapse" id="{{ $databstarget }}" aria-labelledby="{{ $menu['title'] }}"
                                    data-bs-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        @foreach ($menu['dropdown'] as $dropdown)
                                            <a class="nav-link" href="{{ $dropdown['route'] }}">
                                                {{ $dropdown['title'] }}
                                            </a>
                                        @endforeach
                                    </nav>
                                </div>
                            @else
                                <a class="nav-link" href="{{ $menu['route'] }}">
                                    <div class="sb-nav-link-icon">
                                        <x-icon.bs-icon name="{{ $menu['icon'] }}" />
                                    </div>
                                    {{ $menu['title'] }}
                                </a>
                            @endisset
                        @endforeach
                    @endif
                @endforeach
            @endforeach
        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Logged in as:</div>
        {{ $user['email'] }}
    </div>
</nav>
