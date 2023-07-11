<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index.html" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{asset('adminasset/assets/images/logo-sm.png')}}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{asset('adminasset/assets/images/logo-dark.png')}}" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="index.html" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{asset('adminasset/assets/images/logo-sm.png')}}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{asset('adminasset/assets/images/logo-light.png')}}" alt="" height="17">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                @foreach ($items as $item)
                    <li class="nav-item">
                        <a class="nav-link menu-link {{ Route::is($item['active']) ? 'active':''}}"   @if (isset($item['child']))
                        href="#{{ $item['route'] }}" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="{{ $item['route'] }}"
                        @else
                        href="{{ route($item['route']) }}"
                        @endif>
                            <i class="{{ $item['icon'] }}"></i> <span data-key="t-apps">{{ $item['title'] }}</span>
                        </a>
                        @if (isset($item['child']))
                            <div class="collapse menu-dropdown" id="{{ $item['route'] }}">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ route($item['one_route']) }}" class="nav-link {{ Route::is($item['active']) ? 'active':''}}" data-key="t-calendar"> {{ $item['one_child'] }} </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route($item['two_route']) }}" class="nav-link {{ Route::is($item['active']) ? 'active':''}}" data-key="t-chat"> {{ $item['two_child'] }} </a>
                                    </li>
                                </ul>
                            </div>
                        @endif

                    </li>
                @endforeach


            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
