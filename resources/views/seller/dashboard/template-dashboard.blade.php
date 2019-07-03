<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"    crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/simple-sidebar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/css-hamburgers/hamburgers.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard.css')}}">
    {{--
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main-seller.css')}}"> --}}
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    @yield('style')
</head>

<body>

    <header>
        <div class="container-menu-header">
            <div class="wrap_header">
                <!-- Logo -->
                <a href="#hero" class="logo">
                    <img src="{{ asset('img/index/nav_logo.png')}}">
                </a>

                <!-- Menu -->


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

    </header>


    <section class="fixed-pos">
        <div id="wrapper" class="toggled">

            <!-- Sidebar -->
            <div id="sidebar-wrapper">
                <ul class="sidebar-nav">
                    <li class="sidebar-brand">
                        <div class="my-img-wrapper">
                            <img src='https://avataaars.io/?avatarStyle=Circle&topType=ShortHairShortWaved&accessoriesType=Prescription02&hairColor=BrownDark&facialHairType=Blank&clotheType=BlazerShirt&eyeType=Default&eyebrowType=Default&mouthType=Default&skinColor=Light' />
                        </div>
                        <a href="#">
                            Hello Nama-Seller
                        </a>
                    </li>
                    <li>
                        <a href="{{route('seller.dashboard')}}"><i class="zmdi zmdi-home zmdi-hc-lg"></i>Dashboard</a>
                    </li>
                    <li>
                        <a href="{{route('seller.barang')}}"><i class="zmdi zmdi-card-giftcard zmdi-hc-lg"></i>Barang</a>
                    </li>
                    <li>
                        <a href="{{route('seller.transaksi')}}"><i class="zmdi zmdi-money-box zmdi-hc-lg"></i>Transaksi</a>
                    </li>
                    <li>
                        <a href="{{route('seller.profil')}}"><i class="zmdi zmdi-face zmdi-hc-lg"></i>Profil</a>
                    </li>
                    <li>
                        <a href="{{route('seller.chat')}}"><i class="zmdi zmdi-card-giftcard zmdi-hc-lg"></i>Chat</a>
                    </li>

                </ul>
            </div>

    </section>

    @yield('content')


    <footer>

    </footer>

    <!-- Container Selection1 -->
    <div id="dropDownSelect1"></div>
    <div id="dropDownSelect2"></div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

    {{-- <script type="text/javascript" src="{{ asset('vendor/animsition/js/animsition.min.js')}}"></script> --}}
    {{-- <script type="text/javascript" src="{{ asset('vendor/slick/slick.min.js')}}"></script> --}}
    {{-- <script type="text/javascript" src="{{ asset('vendor/lightbox2/js/lightbox.min.js')}}"></script> --}}
    {{-- <script src="{{ asset('js/main.js')}}"></script> --}}

    @yield('javascript')
</body>

</html>