{{--<!doctype html>--}}
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
{{--<head>--}}
{{--    <meta charset="utf-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1">--}}

{{--    <!-- CSRF Token -->--}}
{{--    <meta name="csrf-token" content="{{ csrf_token() }}">--}}

{{--    <title>{{ config('app.name', 'Laravel') }}</title>--}}

{{--    <!-- Scripts -->--}}
{{--    <script src="{{ asset('js/app.js') }}" defer></script>--}}

{{--    <!-- Fonts -->--}}
{{--    <link rel="dns-prefetch" href="//fonts.gstatic.com">--}}
{{--    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">--}}
{{--    @yield('header')--}}

{{--    <!-- Styles -->--}}
{{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
{{--</head>--}}
{{--<body>--}}
{{--    <div id="app">--}}
{{--        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">--}}
{{--            <div class="container">--}}
{{--                <a class="navbar-brand" href="{{ url('/') }}">--}}
{{--                    {{ config('app.name', 'Laravel') }}--}}
{{--                </a>--}}
{{--                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">--}}
{{--                    <span class="navbar-toggler-icon"></span>--}}
{{--                </button>--}}

{{--                <div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
{{--                    <!-- Left Side Of Navbar -->--}}
{{--                    <ul class="navbar-nav mr-auto">--}}

{{--                    </ul>--}}

{{--                    <!-- Right Side Of Navbar -->--}}
{{--                    <ul class="navbar-nav ml-auto">--}}
{{--                        <!-- Authentication Links -->--}}
{{--                        @guest--}}
{{--                            @if (Route::has('login'))--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>--}}
{{--                                </li>--}}
{{--                            @endif--}}

{{--                            @if (Route::has('register'))--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
{{--                                </li>--}}
{{--                            @endif--}}
{{--                        @else--}}
{{--                            <li class="nav-item dropdown">--}}
{{--                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
{{--                                    {{ Auth::user()->name }}--}}
{{--                                </a>--}}

{{--                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">--}}
{{--                                    @if(!Auth::user()->admin == 1)--}}
{{--                                        <a class="dropdown-item" href="{{ route('admin.dashboard') }}">--}}
{{--                                            Dashboard--}}
{{--                                        </a>--}}
{{--                                    @else--}}
{{--                                        <a class="dropdown-item">--}}
{{--                                            Cart--}}
{{--                                        </a>--}}
{{--                                    @endif--}}



{{--                                    <a class="dropdown-item">--}}
{{--                                        Profile--}}
{{--                                    </a>--}}

{{--                                    <a class="dropdown-item" href="{{ route('logout') }}"--}}
{{--                                       onclick="event.preventDefault();--}}
{{--                                                     document.getElementById('logout-form').submit();">--}}
{{--                                        {{ __('Logout') }}--}}
{{--                                    </a>--}}


{{--                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">--}}
{{--                                        @csrf--}}
{{--                                    </form>--}}
{{--                                </div>--}}
{{--                            </li>--}}

{{--                        @endguest--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </nav>--}}

{{--        <div class="wrapper bg-dark">--}}
{{--            <div id="sidebar">--}}
{{--                <div class="sidebar-header">--}}
{{--                    <h3>Bootstrap</h3>--}}
{{--                </div>--}}
{{--                <ul class="list-unstyled-components">--}}
{{--                    <p>The providers</p>--}}
{{--                <li class="active">--}}
{{--                        <a href="#" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> Home</a>--}}
{{--                    <ul class="collapse list-unstyled" id="HomeSubmenu">--}}
{{--                        <li>--}}
{{--                            <a href="#">Home 1</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="#">Home 1</a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
{{--                    <li>--}}
{{--                        <a href="#">Home 1</a>--}}
{{--                    </li>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="wrapper">--}}
{{--            <div class="sb-sidenav-menu" id="sidebar">--}}
{{--                <div id="sidebar-wrapper">--}}
{{--                    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">--}}
{{--                        <div class="sb-sidenav-menu">--}}
{{--                            <div class="nav">--}}
{{--                                <div class="sb-sidenav-menu-heading">Addons</div>--}}
{{--                                <a class="nav-link" href="/admin/adduser">--}}
{{--                                    <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>--}}
{{--                                    Add User--}}
{{--                                </a>--}}
{{--                                <a class="nav-link" href={{ route('admin.dashboard') }}>--}}
{{--                                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>--}}
{{--                                    Users--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        @if(Auth::user())--}}
{{--                            <div class="sb-sidenav-footer">--}}
{{--                                <div class="small">Logged in as:</div>--}}
{{--                                {{Auth::user()->name}}--}}
{{--                            </div>--}}
{{--                            @endif--}}
{{--                    </nav>--}}


{{--                </div>--}}

{{--        <main class="py-4">--}}
{{--            @yield('content')--}}
{{--        </main>--}}
{{--    </div>--}}
{{--</body>--}}
{{--@yield('footer')--}}

{{--<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>--}}
{{--<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>--}}
{{--<script src={{ asset('js/scripts.js') }}></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>--}}
{{--<script src={{ asset('js/chart-area-demo.js') }}></script>--}}
{{--<script src={{asset('js/chart-bar-demo.js')}}></script>--}}
{{--<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>--}}
{{--<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>--}}
{{--<script src={{asset('js/datatables-demo.js')}}></script>--}}
{{--</html>--}}
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - Grocer Admin</title>
    <link href={{ asset('css/styles.css') }} rel="stylesheet" />
    @yield('header')
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <a class="navbar-brand" href="index.html">Grocer</a>
    <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    @if(Request::path() === 'dashboard')
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search user..." aria-label="Search" aria-describedby="basic-addon2" />
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </form>
    @endif
    <ul class="navbar-nav ml-auto">
        <!-- Authentication Links -->
        @guest
            @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
            @endif

            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @endif
        @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    @if(Auth::user()->admin == 1)
                        <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                            Dashboard
                        </a>
                        <a class="dropdown-item">
                            Profile
                        </a>
                    @endif

                    <a class="dropdown-item">
                        Profile
                    </a>

                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>


                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
    @endguest
    <!-- Navbar-->
    {{--    <ul class="navbar-nav ml-auto ml-md-0">--}}
    {{--        <li class="nav-item dropdown">--}}
    {{--            <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>--}}
    {{--            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">--}}
    {{--                <a class="dropdown-item" href="#">Settings</a>--}}
    {{--                <a class="dropdown-item" href="#">Activity Log</a>--}}
    {{--                <div class="dropdown-divider"></div>--}}
    {{--                <a class="dropdown-item" href="login.html">Logout</a>--}}
    {{--            </div>--}}
    {{--        </li>--}}
    {{--    </ul>--}}
</nav>

<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    @if(Auth::user())
                        @if(Auth::user()->admin === 1)
                    <div class="sb-sidenav-menu-heading">Addons</div>
                    <a class="nav-link" href="/admin/adduser">
                        <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                        Add User
                    </a>
                    <a class="nav-link" href={{ route('admin.dashboard') }}>
                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                        Users
                    </a>
                        @endif
                    <div class="sb-sidenav-menu-heading">Addons</div>
                    <a class="nav-link" href="">
                        <div class="sb-nav-link-icon"><i class="fa fa-shopping-cart"></i></div>
                        Cart
                    </a>
                    <a class="nav-link" href="">
                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                        Shopping
                    </a>
                    @endif
                </div>
            </div>
            @if(Auth::user())
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                {{Auth::user()->name}}
            </div>
            @endif
        </nav>
    </div>
    <div id="layoutSidenav_content">
        <div class="card border-top align-content-center">
            <div class="card-header align-content-center text-center">
                <div class="card-body">
                    @yield('content')
                </div>
            </div>
        </div>

        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Your Website 2020</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src={{ asset('js/scripts.js') }}></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src={{ asset('js/chart-area-demo.js') }}></script>
<script src={{asset('js/chart-bar-demo.js')}}></script>
<script type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script src={{asset('js/datatables-demo.js')}}></script>
</body>
</html>
