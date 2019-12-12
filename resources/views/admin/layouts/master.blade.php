<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
<head>
    <title>@yield('page-title')</title>
    <meta name="csrf-token" content="{{ csrf_token()}}"> <!--key bao mat  du lieu dang post-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="description" content="Responsive Admin Template" />
    <meta name="author" content="SmartUniversity" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

 
    <!-- Slick -->
    <link type="text/css" href="{{ asset('css/slick.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('css/slick-theme.css') }}" rel="stylesheet">
    <!-- nouislider -->
    <link type="text/css" href="{{ asset('css/nouislider.min.css') }}" rel="stylesheet">


    <!-- Font Awesome Icon -->
    <link type="text/css" href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    

    <!-- Custom stlylesheet -->
    <link type="text/css" href="{{ asset('css/style.css') }}" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    @yield('custom-css')
</head>

<body>
    <header>
        <!-- MAIN HEADER -->
        <div id="header">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- LOGO -->
                    <div class="col-md-3">
                        <div class="header-logoadmin">
                            <a href="{{ route('admin') }}" class="logo">
                                <img src="{{ asset('admin_assets/img/admin.png') }}" alt="">
                            </a>
                        </div>
                    </div>
                    <!-- /LOGO -->
                </div>
                <!-- row -->
            </div>
            <!-- container -->
        </div>
        <!-- /MAIN HEADER -->
        <!-- NAVIGATION -->
        <nav id="navigation">
            <!-- container -->
            <div class="container">
                <!-- responsive-nav -->
                <div id="responsive-nav">
                    <!-- NAV -->
                    <ul class="main-nav nav navbar-nav">
                        <li class="{{Request::is('admin') ? 'active' : ''}}"><a href="{{ route('admin') }}">MEMBER</a></li>
                        <li><a href="{{ route('viewType') }}">TYPE</a></li>
                        <li><a href="{{ route('viewCategory') }}">CATEGORY</a></li>
                        <li><a href="{{ route('viewAuthor') }}">AUTHOR</a></li>
                        <li><a href="{{ route('viewProduct') }}">PRODUCT</a></li>
                        <li><a href="{{ route('viewCartManager') }}">CART MANAGER</a></li>
                        <li><a href="{{ route('welcome') }}">B-USER</a></li>
                        <li><a href="#}">SOCIETY</a></li>
                        @if(Auth::check())
                            <li><a href="{{ route('logout') }}">Logout</a></li>
                        @else
                            <li class="{{Request::is('login') ? 'active' : ''}}"><a href="{{ route('login') }}">Login</a></li>
                            <li class="{{Request::is('register') ? 'active' : ''}}"><a href="{{ route('register') }}">Register</a></li>
                        @endif
                    </ul>
                    <!-- /NAV -->
                </div>
                <!-- /responsive-nav -->
            </div>
            <!-- /container -->
        </nav>
        <!-- /NAVIGATION -->
    </header>

    @yield('content')

    <footer>
    <!-- NEWSLETTER -->
        <div id="newsletter" class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="newsletter">
                            <p>Sign Up for the <strong>NEWSLETTER</strong></p>
                            <form>
                                <input class="input" type="email" placeholder="Enter Your Email">
                                <button class="newsletter-btn"><i class="fa fa-envelope"></i> Subscribe</button>
                            </form>
                            <ul class="newsletter-follow">
                                <li>
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
    <!-- /NEWSLETTER -->
    </footer>
    <!-- Footer -->
    <!-- jQuery Plugins -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/slick.min.js') }}"></script>
    <script src="{{ asset('js/nouislider.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/jquery.zoom.min.js') }}"></script>
    @yield('cutom-js')
</body>
</html>