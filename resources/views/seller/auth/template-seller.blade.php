<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main-seller.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/css-hamburgers/hamburgers.min.css')}}">
    @yield('style')
</head>
<body>

    <header>
        <div class="container-menu-header">
            <div class="topbar">
                <div class="topbar-social">
                    <a href="#" class="topbar-social-item fa fa-facebook"></a>
                    <a href="#" class="topbar-social-item fa fa-instagram"></a>
                    <a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
                    <a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
                    <a href="#" class="topbar-social-item fa fa-youtube-play"></a>
                </div>

                <span class="topbar-child1">
                    Free shipping for standard order over $100
                </span>

                <div class="topbar-child2">
                    <span class="topbar-email">
                        fashe@example.com
                    </span>
                </div>
            </div>

            <div class="wrap_header">
                <!-- Logo -->
                <a href="#hero" class="logo">
                    <img src="{{ asset('img/index/nav_logo.png')}}">
                </a>

                <!-- Menu -->
                <div class="wrap_menu">
                    <nav class="menu">
                        <ul class="main_menu">
                            <li class="@yield('active1')">
                                <a href="/">Home</a>
                            </li>

                            <li class="@yield('active2')">
                                <a href="/sale">Sale</a>
                            </li>

                            <li class="@yield('active3')">
                                <a href="/about">About</a>
                            </li>

                            <li class="@yield('active4')">
                                <a href="/contact">Contact</a>
                            </li>
                        </ul>
                    </nav>
                </div>

                <!-- Header Icon -->
                <div class="header-icons">
                    <a href="#" class="header-wrapicon1 dis-block">
                        <img src="{{asset('images/icons/icon-header-01.png')}}" class="header-icon1" alt="ICON">
                    </a>


                    <div class="header-wrapicon2">

                    </div>
                </div>
            </div>
        </div>

        <div class="wrap_header_mobile">
            <!-- Logo moblie -->
            <a href="#hero" class="logo-mobile">
                <img src="{{ asset('img/index/nav_logo.png')}}" alt="IMG-LOGO">
            </a>

            <!-- Button show menu -->
            <div class="btn-show-menu">
                <!-- Header Icon mobile -->
                <div class="header-icons-mobile">
                    <a href="#" class="header-wrapicon1 dis-block">
                        <img src="{{asset   ("images/icons/icon-header-01.png")}}" class="header-icon1" alt="ICON">
                    </a>

                </div>

                <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </div>
            </div>
        </div>
        <div class="wrap-side-menu">
            <nav class="side-menu">
                <ul class="main-menu">
                    <li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
                        <span class="topbar-child1">
                            Free shipping for standard order over $100
                        </span>
                    </li>

                    <li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
                        <div class="topbar-child2-mobile">
                            <span class="topbar-email">
                                fashe@example.com
                            </span>
                        </div>
                    </li>

                    <li class="item-topbar-mobile p-l-10">
                        <div class="topbar-social-mobile">
                            <a href="#" class="topbar-social-item fa fa-facebook"></a>
                            <a href="#" class="topbar-social-item fa fa-instagram"></a>
                            <a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
                            <a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
                            <a href="#" class="topbar-social-item fa fa-youtube-play"></a>
                        </div>
                    </li>

                    <li class="item-menu-mobile">
                        <a href="/">Home</a>
                    </li>

                    <li class="item-menu-mobile">
                        <a href="/sale">Sale</a>
                    </li>

                    <li class="item-menu-mobile">
                        <a href="/about">About</a>
                    </li>

                    <li class="item-menu-mobile">
                        <a href="/contact">Contact</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    @yield('content')

    <footer>

    </footer>

        <!-- Container Selection1 -->
        <div id="dropDownSelect1"></div>
        <div id="dropDownSelect2"></div>
        <script type="text/javascript" src="{{ asset('vendor/jquery/jquery-3.2.1.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('vendor/animsition/js/animsition.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('vendor/bootstrap/js/popper.js')}}"></script>
        <script type="text/javascript" src="{{ asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('vendor/slick/slick.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('vendor/lightbox2/js/lightbox.min.js')}}"></script>
        <script src="{{ asset('js/main.js')}}"></script>
</body>
</html>