
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>@yield('title', 'SIMKA')</title>
	<meta name="description" content="">
	<meta name="keywords" content="">

	<!-- favicon -->
	<link rel="shortcut icon" type="image/png" href="{{ asset('frontend/image/favicon.png') }}">

	<!-- Fonts -->
	<link href="https://fonts.googleapis.com" rel="preconnect">
	<link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&family=Poppins:wght@300;400;600;700&family=Nunito:wght@300;400;600;700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('frontend/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

  <!-- Main CSS -->
  <link href="{{ asset('frontend/css/main.css') }}" rel="stylesheet">
	<link href="{{ asset('frontend/css/main.css') }}" rel="stylesheet">
	<link href="{{ asset('frontend/css/responsive.css') }}" rel="stylesheet">
<link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
/>

	@stack('style')
</head>

<body class="@yield('body-class', 'index-page')">

	<!-- ======= Header ======= -->
	<header id="header" class="header d-flex align-items-center fixed-top">
		<div class="container-fluid container-xl position-relative d-flex align-items-center">

			<a href="{{ url('/') }}" class="logo d-flex align-items-center me-auto">
				<img src="{{ asset('frontend/image/logo-ika.webp') }}" alt="FlexStart Logo" style="height:40px;">
				<h1 class="sitename ms-2"></h1>
			</a>

			@if (Auth::check())
			<nav id="navmenu" class="navmenu">
				<ul>
					<li><a href="#home" class="active">Home</a></li>
					<li><a href="#">Data Korban</a></li>
					<li><a href="#">Kasus</a></li>
					<li><a href="#">Tindakan</a></li>
					<li>
						<form action="{{ route('auth.logout') }}" method="POST" style="margin: 0;">
							@csrf
							<button type="submit" class="btn btn-link text-decoration-none p-0" style="color: inherit;">Logout</button>
						</form>
					</li>
				</ul>
				<i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
			</nav>
			@else
			<nav id="navmenu" class="navmenu">
				<ul>
					<li><a href="#home" class="active">Home</a></li>
					<li><a href="#statistics">Statistik Kasus</a></li>
					<li><a href="#about">About</a></li>
					<li><a href="#contact">Contact</a></li>
					<li><a href="{{ url('/auth/login') }}">Login</a></li>
				</ul>
				<i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
			</nav>
			@endif

			{{-- <a class="btn-getstarted flex-md-shrink-0" href="#about">Get Started</a> --}}

		</div>
	</header>
	<!-- End Header -->

	<!-- ======= Main Content ======= -->
	<main id="main" style="margin-top:90px;">

		@yield('content')

	</main>
	<!-- End Main Content -->

	<!-- ======= Footer ======= -->
	<footer id="footer" class="footer mt-5">
		{{-- <div class="footer-newsletter py-5">
			<div class="container">
				<div class="row justify-content-center text-center">
					<div class="col-lg-8">
						<h4>Join Our Newsletter</h4>
						<p>Subscribe to our newsletter and receive the latest news about our products and services!</p>
						<form action="#" method="post" class="php-email-form">
							<div class="newsletter-form d-flex">
								<input type="email" name="email" class="form-control me-2" placeholder="Enter your email">
								<input type="submit" value="Subscribe" class="btn btn-primary">
							</div>
							<div class="loading">Loading</div>
							<div class="error-message"></div>
							<div class="sent-message">Your subscription request has been sent. Thank you!</div>
						</form>
					</div>
				</div>
			</div>
		</div> --}}

		<div class="container footer-top py-5 ">
			<div class="row gy-4 bg-teal-500">
				<div class="col-lg-4 col-md-6 footer-about">
					<a href="{{ url('/') }}" class="d-flex align-items-center">
						<span class="sitename">EduCarrer Tracker</span>
					</a>
					<div class="footer-contact pt-3">
						<p>State University Of Malang</p>
						<p>Jl. Cakrawala No.5, Sumbersari, Kec. Lowokwaru, Kota Malang, Jawa Timur 65145</p>
						<p class="mt-3"><strong>Phone:</strong> <span>(0341) 551312</span></p>
						<p><strong>Website:</strong> <span>https://um.ac.id/</span></p>
					</div>
				</div>

				<div class="col-lg-2 col-md-3 footer-links">
					<h4>Useful Links</h4>
					<ul>
						<li><i class="bi bi-chevron-right"></i> <a href="#">Home</a></li>
						<li><i class="bi bi-chevron-right"></i> <a href="#about">Statistik</a></li>
						<li><i class="bi bi-chevron-right"></i> <a href="#services">About</a></li>
						<li><i class="bi bi-chevron-right"></i> <a href="#">Alumni Tracer</a></li>
					</ul>
				</div>

				<div class="col-lg-2 col-md-3 footer-links">
					<h4>Our Services</h4>
					<ul>
						<li><i class="bi bi-chevron-right"></i> <a href="#">Analisis Statistik</a></li>
						<li><i class="bi bi-chevron-right"></i> <a href="#">Data Alumni</a></li>
						<li><i class="bi bi-chevron-right"></i> <a href="#">Data Pekerjaan</a></li>
					</ul>
				</div>

				<div class="col-lg-4 col-md-12">
					<h4>Follow Us</h4>
					<p>Follow our social media to stay updated.</p>
					<div class="social-links d-flex">
						<a href="#"><i class="bi bi-twitter"></i></a>
						<a href="#"><i class="bi bi-facebook"></i></a>
						<a href="#"><i class="bi bi-instagram"></i></a>
						<a href="#"><i class="bi bi-linkedin"></i></a>
					</div>
				</div>
			</div>
		</div>

		<div class="container text-center py-3">
			<p>© <strong class="sitename">EduCarrer Tracker</strong>. All Rights Reserved.</p>
			<p class="small">Designed by <a href="https://bootstrapmade.com/">Kelompok </a>. Education <a href="https://themewagon.com">Information</a></p>
		</div>
	</footer>
	<!-- End Footer -->

	@stack('scripts')

	<!-- Vendor JS Files -->
	<script src="{{ asset('frontend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ asset('frontend/vendor/aos/aos.js') }}"></script>
	<script src="{{ asset('frontend/vendor/glightbox/js/glightbox.min.js') }}"></script>
	<script src="{{ asset('frontend/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
	<script src="{{ asset('frontend/vendor/swiper/swiper-bundle.min.js') }}"></script>
	<script src="{{ asset('frontend/vendor/php-email-form/validate.js') }}"></script>
	<script src="{{ asset('frontend/vendor/purecounter/purecounter_vanilla.js') }}"></script>
	<script src="{{ asset('frontend/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
	<script src="{{ asset('frontend/js/main.js') }}"></script>

	<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
		<script>
		AOS.init({
			duration: 800,  // durasi animasi (ms)
			offset: 100,    // jarak dari bawah viewport sebelum mulai animasi
			once: true,     // animasi hanya sekali saat scroll ke area
		});
		</script>

	<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
		<script>
		AOS.init({
			duration: 900,   // durasi animasi (ms)
			offset: 120,     // jarak sebelum animasi aktif
			easing: 'ease-in-out',
			once: true,      // hanya animasi sekali
		});
		</script>

</body>
</html>
