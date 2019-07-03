<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link href="{{ asset('img//index/favicon.png')}} " rel="icon">
    
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css')}}">
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/themify/themify-icons.css')}}">

    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/elegant-font/html-css/style.css')}}">

    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/animate/animate.css')}}">

    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/css-hamburgers/hamburgers.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/animsition/css/animsition.min.css')}}">

	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/select2/select2.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/daterangepicker/daterangepicker.css')}}">

	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/slick/slick.css')}}">
	
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/lightbox2/css/lightbox.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/main.css')}}">
	<link href="{{ asset('css/style.css') }}" rel="stylesheet">

	<style>
		.ui-state-hover, .ui-state-active {
			color: #ffffff;
			background-color: #E5418B !important;
			text-decoration: none !important;
			border: #E5418B !important;
		}
		.page-item.active .page-link {
			color: #ffffff !important;
			background-color: #E5418B !important;
			border-color: #E5418B !important;
		}

		.page-link{
			color: #E5418B !important;
		}
		
		.image-wrapper {
			padding-top: 100%;
			position: relative;
			width: 100%;
		}
		.image-wrapper img {
			bottom: 0;
			left: 0;
			margin: auto;
			max-height: 100%;
			max-width: 100%;
			right: 0;
			position: absolute;
			top: 0;
		}
	</style>
	
	@yield('custom-css')

    <title>{{ config('app.name', 'Gifuto') }}</title>
</head>
<body class="animsition">
	<header class="header1">
		<!-- Header desktop -->
		<div class="container-menu-header">
			<div class="topbar">
				<div class="topbar-social">
					<a href="https://www.facebook.com/gifutoofficial/" target="_blank" class="topbar-social-item fa fa-facebook"></a>
					<a href="https://www.instagram.com/gifutoofficial/" target="_blank" class="topbar-social-item fa fa-instagram"></a>
					{{-- <a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
					<a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a> 
					<a href="#" class="topbar-social-item fa fa-youtube-play"></a> --}}
				</div>

				<span class="topbar-child1">
					{{-- Free shipping for standard order over $100 --}}
				</span>

				<div class="topbar-child2">
					<span class="topbar-email">
						gifuto.id
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
							@guest
							
							@else
								<li class="@yield('active1')">
									<a href="/kadoku">Kadoku</a>
								</li>
							@endguest

							<li class="@yield('active2')">
								<a href="/sale">Sale</a>
							</li>

							<li class="@yield('active3')">
								<a href="/about">Tentang</a>
							</li>

							<li class="@yield('active4')">
								<a href="/contact">Kontak</a>
							</li>
						</ul>
					</nav>
				</div>

				<!-- Header Icon -->
				<div class="header-icons">
					{{-- <a href="#" class="header-wrapicon1 dis-block">
						<img src="{{ asset('images/icons/icon-header-01.png')}}" class="header-icon1" alt="ICON">
					</a> --}}

					<!-- Authentication Links -->
					@guest
					<ul class="main_menu">
						<li>
							<a href="{{ route('login') }}">{{ __('Masuk') }}</a>
						</li>
						<li>
							<a  href="{{ route('register') }}">{{ __('Daftar') }}</a>
						</li>
						<li>
						<a href="{{ route('seller.login')}}">{{ __('Masuk Seller') }}</a>
						</li>
					</ul>
						
					@else
						<li class="nav-item dropdown">
							<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
								{{-- {{ Auth::user()->nama_depan }}  --}}
								<img src="{{ asset('images/icons/icon-header-01.png')}}" class="header-icon1" alt="ICON">
							</a>

							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
							<a href="/kadoku" class="dropdown-item">
									Kadoku
								</a>
							<a href="{{route('user.profile')}}" class="dropdown-item">
									Profil
										{{ Auth::user()->nama_depan }} 
								</a>
								{{-- <hr> --}}
								<a class="dropdown-item" href="{{ route('logout') }}"
									onclick="event.preventDefault();
													document.getElementById('logout-form').submit();">
									{{ __('Logout') }}
								</a>
								

								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									@csrf
								</form>
							</div>
						</li>
					@endguest
				</div>
			</div>
		</div>

		<!-- Header Mobile -->
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
						<img src="{{ asset('images/icons/icon-header-01.png')}}" class="header-icon1" alt="ICON">
					</a>

					<span class="linedivide2"></span>

					<div class="header-wrapicon2">
						<img src="{{ asset('images/icons/icon-header-02.png')}}" class="header-icon1 js-show-header-dropdown" alt="ICON">
						<span class="header-icons-noti">0</span>

						<!-- Header cart noti -->
						<div class="header-cart header-dropdown">
							<ul class="header-cart-wrapitem">
								<li class="header-cart-item">
									<div class="header-cart-item-img">
										<img src="{{ asset('images/item-cart-01.jpg')}}" alt="IMG">
									</div>

									<div class="header-cart-item-txt">
										<a href="#" class="header-cart-item-name">
											White Shirt With Pleat Detail Back
										</a>

										<span class="header-cart-item-info">
											1 x $19.00
										</span>
									</div>
								</li>

								<li class="header-cart-item">
									<div class="header-cart-item-img">
										<img src="{{ asset('images/item-cart-02.jpg')}}" alt="IMG">
									</div>

									<div class="header-cart-item-txt">
										<a href="#" class="header-cart-item-name">
											Converse All Star Hi Black Canvas
										</a>

										<span class="header-cart-item-info">
											1 x $39.00
										</span>
									</div>
								</li>

								<li class="header-cart-item">
									<div class="header-cart-item-img">
										<img src="{{ asset('images/item-cart-03.jpg')}}" alt="IMG">
									</div>

									<div class="header-cart-item-txt">
										<a href="#" class="header-cart-item-name">
											Nixon Porter Leather Watch In Tan
										</a>

										<span class="header-cart-item-info">
											1 x $17.00
										</span>
									</div>
								</li>
							</ul>

							<div class="header-cart-total">
								Total: $75.00
							</div>

							<div class="header-cart-buttons">
								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="cart.html" class="flex-c-m size1 bg0 bo-rad-20 hov1 s-text1 trans-0-4">
										View Cart
									</a>
								</div>

								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="#" class="flex-c-m size1 bg0 bo-rad-20 hov1 s-text1 trans-0-4">
										Check Out
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</div>
			</div>
		</div>

		<!-- Menu Mobile -->
		<div class="wrap-side-menu" >
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
								gifuto.id
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
    
    <!-- Footer -->
	<div class="bg6 container-fluid pt-5 pb-5">
		<div class="row justify-content-center">
			<div class="col-md-3 col-sm-12">
				<h4 class="s-text12 p-b-30">
					GET IN TOUCH
				</h4>

				<div>
					<p class="s-text7 w-size27">
						Jl. WR Supratman No.302, Kesiman Kertalangu, Denpasar Tim., Kota Denpasar, Bali 80237
					</p>

					<div class="flex-m p-t-30">
						<a href="https://www.facebook.com/gifutoofficial/" target="_blank" class="fs-18 color1 p-r-20 fa fa-facebook"></a>
						<a href="https://www.instagram.com/gifutoofficial/" target="_blank" class="fs-18 color1 p-r-20 fa fa-instagram"></a>
						{{-- <a href="#" class="fs-18 color1 p-r-20 fa fa-pinterest-p"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-snapchat-ghost"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-youtube-play"></a> --}}
					</div>
				</div>
			</div>

			<div class="col-md-3 col-sm-12">
				<h4 class="s-text12 p-b-30">
					Categories
				</h4>

				<ul>
					<li class="p-b-9">
						<a href="#" class="s-text7">
							Fashion
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Decoration
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Dolls
						</a>
					</li>
				</ul>
			</div>

			<div class="col-md-3 col-sm-12">
				<h4 class="s-text12 p-b-30">
					Help
				</h4>

				<ul>
					<li class="p-b-9">
						<a href="#" class="s-text7">
							Track Order
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Returns
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Shipping
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							FAQs
						</a>
					</li>
				</ul>
			</div>

			<div class="col-md-3 col-sm-12">
				<h4 class="s-text12 p-b-30">
					Newsletter
				</h4>

				<form>
					<div class="effect1 w-size9">
						<input class="s-text7 bg6 w-full p-b-5" type="text" name="email" placeholder="email@example.com">
						<span class="effect1-line"></span>
					</div>

					<div class="w-size2 p-t-20">
						<!-- Button -->
						<button class="flex-c-m size2 bg0 bo-rad-23 hov1 m-text3 trans-0-4">
							Subscribe
						</button>
					</div>

				</form>
			</div>
		</div>

		<div class="t-center p-l-15 p-r-15">
		
			<div class="t-center s-text8 p-t-20">
				Copyright © Gifuto 2019 All rights reserved.
			</div>
		</div>
	</div>



	<!-- Back to top -->
	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
	</div>

	<!-- Container Selection1 -->
	<div id="dropDownSelect1"></div>
	<div id="dropDownSelect2"></div>
    
    <!--===============================================================================================-->
	<script type="text/javascript" src="{{ asset('vendor/jquery/jquery-3.2.1.min.js')}}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <!--===============================================================================================-->
        <script type="text/javascript" src="{{ asset('vendor/animsition/js/animsition.min.js')}}"></script>
    <!--===============================================================================================-->
        <script type="text/javascript" src="{{ asset('vendor/bootstrap/js/popper.js')}}"></script>
        <script type="text/javascript" src="{{ asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <!--===============================================================================================-->
		<script type="text/javascript" src="{{ asset('vendor/select2/select2.min.js')}}"></script>
		<script>
			$(".selection-1").select2({
				minimumResultsForSearch: 20,
				dropdownParent: $('#dropDownSelect1')
			});
			$(".selection-2").select2({
				minimumResultsForSearch: 20,
				dropdownParent: $('#dropDownSelect2')
			});
		</script>

	<!--===============================================================================================-->
		<script type="text/javascript" src="{{ asset('vendor/daterangepicker/moment.min.js')}}"></script>
		<script type="text/javascript" src="{{ asset('vendor/daterangepicker/daterangepicker.js')}}"></script>
    <!--===============================================================================================-->
        <script type="text/javascript" src="{{ asset('vendor/slick/slick.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('js/slick-custom.js')}}"></script>
    <!--===============================================================================================-->
        <script type="text/javascript" src="{{ asset('vendor/lightbox2/js/lightbox.min.js')}}"></script>
    <!--===============================================================================================-->
        <script type="text/javascript" src="{{ asset('vendor/sweetalert/sweetalert.min.js')}}"></script>
        <script type="text/javascript">
            $('.block2-btn-addcart').each(function(){
                var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
                $(this).on('click', function(){
                    swal(nameProduct, "is added to cart !", "success");
                });
            });
    
            $('.block2-btn-addwishlist').each(function(){
                var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
                $(this).on('click', function(){
                    swal(nameProduct, "is added to wishlist !", "success");
                });
            });
		</script>
		
		<script src="{{ asset('js/main.js')}}"></script>

		<script>
			$(document).ready(function(){
				$('ul li a.kategori').click(function(e){
					e.preventDefault();
					var baseUrl = window.location.protocol+"//"+window.location.host
					var id = this.id;
					var ajaxUrl = baseUrl+'/sale/ajax?filter='+id;
					var url = baseUrl+'/sale?filter='+id;;
					// console.log(ajaxUrl);
					$.ajax({
						url : ajaxUrl,
						success: function(data){
							$('#posts').html(data);
							window.history.pushState("object or string", "Title", url);
						}
					});
				});
				$(document).on("click", ".pagination a",function(e){
					e.preventDefault();
					var url = $(this).attr('href');

					var baseUrl = window.location.protocol+"//"+window.location.host;

					const urlParams = new URLSearchParams(window.location.search);
					const urlPageParams = new URL(url);

					const pageParam = urlPageParams.searchParams.get('page');
					const filterParam = urlParams.get('filter');
					const searchParam = urlParams.get('term');

					// console.log(searchParam);

					var ajaxUrl = "";

					if (searchParam !== null) {
						ajaxUrl = baseUrl+'/sale/search/ajax?term='+searchParam+'&page='+pageParam;
						baseUrl = baseUrl+'/sale/search?term='+searchParam+'&page='+pageParam;
					} else {
						ajaxUrl = baseUrl+'/sale/ajax?filter='+filterParam+'&page='+pageParam;
						baseUrl = baseUrl+'/sale?filter='+filterParam+'&page='+pageParam;
					}

					// console.log(ajaxUrl);
					// console.log(window.location.search);

					$.ajax({
						url : ajaxUrl,
						success: function(data){
							$('#posts').html(data);
							window.history.pushState("object or string", "Title", baseUrl);
						}
					});
				});
				
				$(document).on("submit", "#searchField", function(e){
					e.preventDefault();
					var baseUrl = window.location.protocol+"//"+window.location.host
					var term = $("#searchProduct").val();
					$.ajax({
						url: baseUrl+"/sale/search/ajax?term="+term,
						success: function(data){
							// console.log(": "+data);
							$('#posts').html(data);
							window.history.pushState("object or string", "Title", baseUrl+"/sale/search?term="+term);
						}
					});
				});

				$(document).on("input", "#searchProduct", function() {
					var url = window.location.protocol+"//"+window.location.host+"/sale/search/autocomplete/"
					$( "#searchProduct" ).autocomplete({
						source: url
					});
				});
			});
			// pagination
			

		</script>


</body>
</html>