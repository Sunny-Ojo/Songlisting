<!DOCTYPE html>
<html lang="eng">
<head>

	<title>@yield('titles', 'Song Listing')</title>
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
			<li><a href="{{ route('songs.create') }}">Upload Songs</a></li>
		</ul>
    </header>

	<!-- Header section end -->

	<!-- Hero section -->
	<section class="hero-section">
		<div class="hero-slider owl-carousel">
			<div class="hs-item">
				<div class="container p-2">
					<div class="row">
						<div class="col-lg-6">
							<div class="hs-text">
                                @include('layouts.msg')

								<h2><span>Music</span> for everyone.</h2>
								<p>Play, Stream, Download And Upload Songs... </p>
								<a href="/songs/create" class="btn btn-primary">Upload Songs</a>
								<a href="/songs" class="btn btn-warning">All Songs</a>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="hr-img">
								<img src="{{asset('img/hero-bg.png')}}" alt="">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="hs-item">
				<div class="container">
					<div class="row">
						<div class="col-lg-6">
							<div class="hs-text">
                                @include('layouts.msg')

								<h2><span>Listen </span> to new Songs.</h2>
								<p >Play, Stream, Download And Upload Songs... </p>
                                <a href="/songs/create" class="btn btn-primary">Upload Songs</a>
								<a href="/songs" class="btn btn-warning">All Songs</a>
						</div>
						</div>
						<div class="col-lg-6">
							<div class="hr-img">
								<img src="{{asset('img/hero-bg.png')}}" alt="">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Hero section end -->

	<!-- Intro section -->
	<section class="bg-dark text-white pt-4">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 p-3">
					<div class="section-title">
						<h2>Unlimited Access to uploading, downloading and streaming  of songs.</h2>
					</div>
				</div>
				<div class="col-lg-6 p-3">
					<p>You have free access to uploading of contents, streaming and downloading  of your favorites songs.
                        It's free and easy to use.
                    </p>
					<a href="/songs/create" class="site-btn">Try it now</a>
				</div>
			</div>
		</div>
	</section>
	<!-- Intro section end -->


	<!-- Concept section -->
	<section class="concept-section  ">
		<div class="container">
			<div class="row p-5 mt-5">
				<div class="col-lg-6">
					<div class="section-title">
						<h2>New songs </h2>
					</div>
				</div>
				<div class="col-lg-6">

                    <p>These are the newest three songs released recently. <br>
                   Play, Donwload and Enjoy!</p>
				</div>
            </div>
        </div>
        <hr>
        <div class="container">
                          	<div class="row ">
    	     @if (count($song)> 0 )
            @foreach ($song as $songs)
				<div class="col-lg-4 col-sm-6 mb-4">
					<div class="concept-item">
                    <img  style="height:200px; width:100%" src="/storage/cover_images/{{$songs->cover_image}}" alt="Cover image">
                </div>
                <audio class="audio" src="/storage/songs/{{$songs->song}}" type="audio/mp3" controls style="width:100%"></audio>

                <h5 class="text-center"><a href="/songs/{{$songs->id}}">{{ $songs->author }} - {{ $songs->name }}</a></h5>

				</div>


            @endforeach
                   <h2> <a href="/songs"class="btn btn-warning mt-2 mb-3 ml-3" >All songs </a> </h2>
 @else
           <h4 class="p-4 text-center text-danger" >Sorry, we don't have any song at the moment... Kindly check back later.</h4>
            @endif

        </div>
    </div>

	</section>
	<!-- Concept section end -->
<!-- How section -->
<section class="how-section spad set-bg" data-setbg="{{asset('img/how-to-bg.jpg')}}">
    <div class="container text-white">
        <div class="section-title">
            <h2>How it works</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="how-item">
                    <div class="hi-icon">
                        <img src="{{asset('img/icons/brain.png')}}" alt="">
                    </div>
                    <h4>Create an account</h4>
                    <p>It's a good thing you register in other to have access to the full features of our app</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="how-item">
                    <div class="hi-icon">
                        <img src="{{asset('img/icons/pointer.png')}}" alt="">
                    </div>
                    <h4>Find the songs you love</h4>
                    <p>You can search for songs, play and download them. </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="how-item">
                    <div class="hi-icon">
                        <img src="{{asset('img/icons/smartphone.png')}}" alt="">
                    </div>
                    <h4>Upload Song</h4>
                    <p>You must have an account with us in other to be able to upload songs. <br>
                    Don't worry, It's simple and free to use </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- How section end -->
 <br class="bg-white">


	<!-- Footer section -->
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
	<!-- Audio Players js -->
	<script src="{{asset('js1/jquery.jplayer.min.js')}}"></script>
	<script src="{{asset('js1/wavesurfer.min.js')}}"></script>

	<!-- Audio Players Initialization -->
	<script src="{{asset('js1/WaveSurferInit.js')}}"></script>
	<script src="{{asset('js1/jplayerInit.js')}}"></script>

	</body>
</html>
