<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        use App\Http\Controllers\CartController;
    ?>

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
                    <a class="nav-link" href={{ route('index2') }}>
                        <div class="sb-nav-link-icon"><i class="fa fa-shopping-cart"></i></div>
                        Cart &nbsp; <span class="disabled">(
{{--<!--                            --><?php--}}
{{--                                     echo CartController::cartItem();--}}
{{--//                                  ?>--}}
                            {{ \Gloudemans\Shoppingcart\Facades\Cart::count() }}
                            )</span>
                    </a>
                    <a class="nav-link" href={{ route('goShopping') }}>
                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                        Shopping
                    </a>
                    <a class="nav-link" href={{ route('history') }}>
                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                        History
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
        <div class="card border-top align-content-center bg-secondary">
            <div class="card-header align-content-center text-center">
                <div class="card-body">
                    @yield('content')
                </div>
                    <div class="row row-cols-3" id="myrow">
                        @yield('shopping')
                    </div>
            </div>
        </div>

        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid ">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Grocer 2020</div>
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
@yield('extra.js')
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
