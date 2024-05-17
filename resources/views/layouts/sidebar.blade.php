<!-- ========== Left Sidebar Start ========== -->
@php
$main = [
    // 'product_customer' =>  [
    //     'title'  => 'Produk',
    //     'url'    => '/settings',
    //     'name'   => 'settings',
    //     'icon'   => 'box',
    //     'role'   => ['customer']
    // ],
    'sales' =>  [
        'title'  => 'Penjualan',
        'url'    => '/sales',
        'name'   => 'sales',
        'icon'   => 'apps',
        'role'   => ['admin', 'customer']
    ],
    'comision' =>  [
        'title'  => 'Komisi',
        'url'    => '/sales',
        'name'   => 'sales',
        'icon'   => 'check-circle',
        'role'   => ['admin', 'customer']
    ],
    'category' =>  [
        'title'  => 'Kategori',
        'url'    => '/categories',
        'name'   => 'categories',
        'icon'   => 'briefcase',
        'role'   => ['admin']
    ],
    'product' =>  [
        'title'  => 'Produk',
        'url'    => '/products',
        'name'   => 'products',
        'icon'   => 'box',
        'role'   => ['admin', 'customer']
    ],
    'reseller' =>  [
        'title'  => 'Reseller',
        'url'    => '/users',
        'name'   => 'users',
        'icon'   => 'bag',
        'role'   => ['admin']
    ],
    'admin' =>  [
        'title'  => 'Admin',
        'url'    => '/admins',
        'name'   => 'admins',
        'icon'   => 'lock-alt',
        'role'   => ['admin']
    ],
    'setting' =>  [
        'title'  => 'Setting',
        'url'    => '/settings',
        'name'   => 'settings',
        'icon'   => 'exclamation-triangle',
        'role'   => ['admin']
    ],
    
    // 'tryout'   => [
    //     'title'    => 'Tryout',
    //     'name'     => 'admin/tryout',
    //     'icon'     => 'notebook-outline',
    //     'role'     => [],
    //     'children' => [
    //         [
    //         'title' => 'soal',
    //         'url' => '/admin/tryout/quizes',
    //         ],
    //         [
    //         'title' => 'tipe soal',
    //         'url' => '/admin/tryout/types',
    //         ],
    //         [
    //         'title' => 'nilai tryout',
    //         'url' => '/bo/',
    //         ],
    //     ]
    // ],
    
];

@endphp

<div class="vertical-menu">

    <!-- LOGO -->
    <div class="navbar-brand-box">
        <a href="index" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ URL::asset('build/images/logo-sm-dark.png') }}" alt="logo-sm-dark" height="24">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('build/images/logo-dark.png') }}" alt="logo-dark" height="22">
            </span>
        </a>

        <a href="index" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ URL::asset('build/images/logo-sm-light.png') }}" alt="logo-sm-light" height="24">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('build/images/logo-light.png') }}" alt="logo-light" height="22">
            </span>
        </a>
    </div>

    <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect vertical-menu-btn"
        id="vertical-menu-btn">
        <i class="ri-menu-2-line align-middle"></i>
    </button>

    <div data-simplebar class="vertical-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <div class="dropdown mx-3 sidebar-user user-dropdown select-dropdown">
                <button type="button" class="btn btn-light w-100 waves-effect waves-light border-0"
                    id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <div class="avatar-xs rounded-circle flex-shrink-0">
                                <div
                                    class="avatar-title border bg-light text-primary rounded-circle text-uppercase user-sort-name">
                                    R</div>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-2 text-start">
                            <h6 class="mb-1 fw-medium user-name-text"> Reporting </h6>
                            <p class="font-size-13 text-muted user-name-sub-text mb-0"> Team Reporting </p>
                        </div>
                        <div class="flex-shrink-0 text-end">
                            <i class="uim uim-chevron-down font-size-16"></i>
                        </div>
                    </span>
                </button>
                <div class="dropdown-menu dropdown-menu-end w-100">
                    <!-- item-->
                    <a class="dropdown-item d-flex align-items-center px-3" href="#">
                        <div class="flex-shrink-0 me-2">
                            <div class="avatar-xs rounded-circle flex-shrink-0">
                                <div class="avatar-title border rounded-circle text-uppercase dropdown-sort-name">R
                                </div>
                            </div>
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="mb-0 dropdown-name">Reporting</h6>
                            <p class="text-muted font-size-13 mb-0 dropdown-sub-desc">Team Reporting</p>
                        </div>
                    </a>
                </div>
            </div>
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>
                <li>
                    <a href="/home" class="waves-effect {{ request()->is('admin/home') ? 'mm-active' : '' }}">
                        <i class="uim uim-airplay"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                @foreach ($main as $main_menu)
                    @if(empty($main_menu["children"]))
                    @if (in_array(Auth::user()->role, $main_menu["role"]))
                        <li class="{{ request()->is($main_menu['name'].'*') ? 'mm-active' : '' }}">
                            <a href="{{ $main_menu["url"] }}" class=" waves-effect">
                                <i class="uim uim-{{ $main_menu["icon"] }}"></i>
                                <span>{{ $main_menu["title"] }}</span>
                            </a>
                        </li>
                    @endif
                    @else
                        @if (in_array(Auth::user()->role, $main_menu["role"]))
                            <li  class="{{ request()->is($main_menu['name'].'*') ? 'mm-acctive' : '' }}">
                                <a href="javascript: void(0);" class="has-arrow waves-effect {{ request()->is($main_menu['name'].'*') ? 'mm-acctive' : '' }}">
                                    <i class="uim uim-{{ $main_menu["icon"] }}"></i>
                                    <span>{{ $main_menu["title"] }}</span>
                                </a>
                                <ul class="sub-menu
                                    {{ request()->is($main_menu['name'].'*') ? 'mm-show' : '' }}
                                " aria-expanded="false">
                                    @foreach ($main_menu["children"] as $main_child)
                                    <li
                                        class="
                                            @if (
                                                request()->is(substr($main_child["url"], 1)) ||
                                                request()->is(substr($main_child["url"], 1) . '/*')
                                            )
                                                mm-active
                                            @endif
                                        "
                                    ><a class="
                                        @if (
                                            request()->is(substr($main_child["url"], 1)) ||
                                            request()->is(substr($main_child["url"], 1) . '/*')
                                        )
                                            active
                                        @endif
                                        " 
                                        href="{{ $main_child["url"] }}">{{ $main_child["title"] }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                        @endif
                    @endif
                @endforeach
\
                {{-- <li class="menu-title">Pages</li> --}}
                {{-- <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="uim uim-window-grid"></i>
                        <span>Layouts</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li>
                            <a href="javascript: void(0);" class="has-arrow">Vertical</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="layouts-dark-sidebar">Dark Sidebar</a></li>
                                <li><a href="layouts-light-sidebar">Light Sidebar</a></li>
                                <li><a href="layouts-compact-sidebar">Compact Sidebar</a></li>
                                <li><a href="layouts-icon-sidebar">Icon Sidebar</a></li>
                                <li><a href="layouts-boxed">Boxed Layout</a></li>
                                <li><a href="layouts-preloader">Preloader</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow">Horizontal</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="layouts-horizontal">Horizontal</a></li>
                                <li><a href="layouts-hori-light-header">Light Header</a></li>
                                <li><a href="layouts-hori-topbar-dark">Topbar Dark</a></li>
                                <li><a href="layouts-hori-boxed-width">Boxed width</a></li>
                                <li><a href="layouts-hori-preloader">Preloader</a></li>
                            </ul>
                        </li>
                    </ul>
                </li> --}}


            </ul>

        </div>
        <!-- Sidebar -->
    </div>

    <div class="dropdown px-3 sidebar-user sidebar-user-info">
        <button type="button" class="btn w-100 px-0 border-0" id="page-header-user-dropdown"
            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="d-flex align-items-center">
                <div class="flex-shrink-0">
                    <img src="{{ URL::asset('build/images/users/avatar-2.jpg') }}"
                        class="img-fluid header-profile-user rounded-circle" alt="">
                </div>

                <div class="flex-grow-1 ms-2 text-start">
                    <span class="ms-1 fw-medium user-name-text">{{ Auth::user()->name }}</span>
                </div>

                <div class="flex-shrink-0 text-end">
                    <i class="mdi mdi-dots-vertical font-size-16"></i>
                </div>
            </span>
        </button>
        <div class="dropdown-menu dropdown-menu-end">
            <!-- item-->
            {{-- <a class="dropdown-item" href="javascript:void(0)"><i
                    class="uim uim-account-circle text-muted font-size-16 align-middle me-1"></i> <span
                    class="align-middle">Profile</span></a> --}}
            @if (Auth::user()->role == 'admin')
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#"><i
                    class="uim uim-cog-outline text-muted font-size-16 align-middle me-1"></i> <span
                    class="align-middle">Settings</span></a>
            @endif
            <a class="dropdown-item" href="javascript:void();"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                    class="uim uim-lock text-muted font-size-16 align-middle me-1"></i> <span
                    class="align-middle">Logout</span></a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>

</div>
<!-- Left Sidebar End -->
