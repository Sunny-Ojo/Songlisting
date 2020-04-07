<!DOCTYPE html>
<html lang="eng">
<head>

	<title>@yield('title', 'Song Listing')</title>
	<meta charset="UTF-8">
	<meta name="description" content="Song listing music website by sunshinecoder">
	<meta name="keywords" content="music, songlisting, upload songs, streaming, download songs  ">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="{{ asset('js/app.js') }}" defer></script>
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

	<!-- Favicon -->
	<link href="{{asset('img/favicon.ico')}}" rel="shortcut icon"/>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i&display=swap" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="{{asset('css1/bootstrap.min.css')}}"/>
	<link rel="stylesheet" href="{{asset('css1/font-awesome.min.css')}}"/>
	<link rel="stylesheet" href="{{asset('css1/owl.carousel.min.css')}}"/>
	<link rel="stylesheet" href="{{asset('css1/slicknav.min.css')}}"/>

	<!-- Main Stylesheets -->
	<link rel="stylesheet" href="{{asset('css1/style.css')}}"/>


</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- Header section -->
	<header class="header-section clearfix">
		<a href="/" class="site-logo">
			<img src="{{asset('img/logo.png')}}" alt="">
		</a>
		<div class="header-right">

			<div class="user-panel">
                @guest
                    <a class="login" href="{{ route('login') }}">{{ __('Login') }}</a>
                @if (Route::has('register'))
                        <a class="register" href="{{ route('register') }}">{{ __('Register') }}</a>
                @endif
            @else
                {{-- <li class=" dropdown"> --}}
                    <ul class="">
                  <li><a href="/logout " class="text-warning">logout</a></li>

                    </ul>
  {{-- </li> --}}
            @endguest

        </div>
		</div>
		<ul class="main-menu">
			<li><a href="/">Home</a></li>
        <li><a href="{{route('about')}}">About</a></li>
            <li><a href="{{ route('contact') }}">Contact</a></li>
          <li><a href="{{route('songs.index')}}">All Songs</a></li>
			<li><a href="{{ route('songs.create') }}">Upload Songs</a></li>
		</ul>
    </header>
<div class="container">
        @yield('content')

</div>
	<footer class="footer-section">
		<div class="container">
			<div class="row">
				<div class="col-xl-6 col-lg-7 order-lg-2">
					<div class="row">
						<div class="col-sm-4 col-lg-12">
							<div class="footer-widget">
								<h2>Useful Links</h2>
								<ul>
                                <li><a href="{{route('about')}}">About Us</a></li>
                                <li><a href="{{route('contact')}}">Contact Us</a></li>
                                <li><a href="{{route('songs.index')}}">All Songs</a></li>
                                <li><a href="{{route('songs.create')}}">Upload Songs</a></li>
								</ul>
							</div>
						</div>

					</div>
				</div>
				<div class="col-xl-6 col-lg-5 order-lg-1">
					<img src="{{asset('img/logo.png')}}" alt="">
					<div class="copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></div>
					<div class="social-links">
						<a href=""><i class="fa fa-instagram"></i></a>
						<a href=""><i class="fa fa-pinterest"></i></a>
						<a href=""><i class="fa fa-facebook"></i></a>
						<a href=""><i class="fa fa-twitter"></i></a>
						<a href=""><i class="fa fa-youtube"></i></a>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- Footer section end -->

	<!--====== Javascripts & Jquery ======-->
	<script src="{{asset('js1/jquery-3.2.1.min.js')}}"></script>
	<script src="{{asset('js1/bootstrap.min.js')}}"></script>
	<script src="{{asset('js1/jquery.slicknav.min.js')}}"></script>
	<script src="{{asset('js1/owl.carousel.min.js')}}"></script>
	<script src="{{asset('js1/mixitup.min.js')}}"></script>
	<script src="{{asset('js1/main.js')}}"></script>
    <script src="{{asset('js1/jquery.jplayer.min.js')}}"></script>
	<script src="{{asset('js1/wavesurfer.min.js')}}"></script>

		<!-- Audio Players js -->
        <script src="{{asset('js1/jquery.jplayer.min.js')}}"></script>
        <script src="{{asset('js1/wavesurfer.min.js')}}"></script>

        <!-- Audio Players Initialization -->
        <script src="{{asset('js1/WaveSurferInit.js')}}"></script>
        <script src="{{asset('js1/jplayerInit.js')}}"></script>

</body>
</html>
