<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>@yield('page-title')</title>
    <meta name="csrf-token" content="{{ csrf_token()}}">
    <!--key bao mat  du lieu dang post-->
    <meta charset="utf-8"> 
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
                        <div class="header-logo">
                            <a href="{{ route('welcome') }}" class="logo">
                                <img src="image/logo.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="header-search" style="border-radius: 50px 100px;">
                            <form>
                                <select class="input-select">
                                    
                                    <option value="-1">All Categories</option>
                                    @foreach(App\Categories::all() as $category)
                                    @if(isset($category_id) && $category->id == $category_id)
                                    <option value="{{ $category->id }}" selected>{{$category->name}}</option>
                                    @else
                                    <option value="{{ $category->id }}">{{$category->name}}</option>
                                    @endif
                                    @endforeach
                                </select>
                                <input id="input_search" class="input select" placeholder="Search here" value="{{isset($search) ? $search : ''}}">
                                <button class="search-btn select" default>Search</button>
                            </form>

                        </div>
                    </div>
                    <!-- /SEARCH BAR -->

                    <!-- ACCOUNT -->
                    <div class="col-md-3 clearfix">
                        <div class="header-ctn">
                            <!-- Wishlist -->
                            <div>
                                <a href="#">
                                    <i class="fa fa-heart-o"></i>
                                    <span>Your Wishlist</span>
                                    <div class="qty">2</div>
                                </a>
                            </div>
                            <!-- /Wishlist -->

                            <!-- Cart -->
                            <div class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                    <i class="fa fa-shopping-cart"></i>
                                    <div class="qty">
                                    </div>
                                    <span>
                                        <a href="{{ route('checkOut') }}">
                                            Cart
                                    </span>
                                </a>
                            </div>
                            <!-- /Cart -->
                            <!-- Menu Toogle -->
                            <div class="menu-toggle">
                                <a href="#">
                                    <i class="fa fa-bars"></i>
                                    <span>Menu</span>
                                </a>
                            </div>
                            <!-- /Menu Toogle -->
                        </div>
                    </div>
                    <!-- /ACCOUNT --> 
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
                        <li class="{{Request::is('welcome') ? 'active' : ''}}"><a href="{{ route('welcome') }}">Trang chủ</a></li>
                        <li><a href="{{route('sale')}}">Flash Sale</a></li>
                        <li><a href="#">B-POINT</a></li>
                        <li><a href="#">B-Blog</a></li>
                        <li><a href="{{route('store')}}">B-POINT Store</a></li>
                        
                        @if(Auth::check())
                        <li><a href="{{ route('listOrder') }}">MY-ORDER</a></li>
                        <li><a href="{{ route('account') }}">B-ACOUNT</a></li>
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
    </header @yield('content') <footer>
    <!-- NEWSLETTER -->
    <div id="newsletter" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="newsletter">
                        <p>Sign Up for the <strong>BOOKSTORE</strong></p>
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
                        <br>
                        <div><small>120 Xô Viết Nghệ Tĩnh, Đà Nẵng - Công Ty Cổ Phần Phát Hành Sách TP Đà Nẵnng - BOOKSTORE - Bookstore.com nhận đặt hàng trực tuyến và giao hàng tận nơi. KHÔNG hỗ trợ đặt mua và nhận hàng trực tiếp tại văn phòng cũng như tất cả Hệ Thống BookStore trên toàn quốc.</small></div>
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
    <script src="{{ asset('js/slick.min.js') }}"></script>
    <script src="{{ asset('s/jquery.zoom.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/layout.js') }}"></script>

    @yield('cutom-js')
</body>

</html>