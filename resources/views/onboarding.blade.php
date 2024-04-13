<!DOCTYPE html>
<!-- <html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> -->
    <head>
         <!-- Title -->
	<title>Smart Bite</title>

<!-- Meta -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="author" content="DexignZone">
<meta name="robots" content="index, follow">



<meta name="format-detection" content="telephone=no">



<meta name="twitter:image" content="https://ombe.dexignzone.com/xhtml/social-image.png">
<meta name="twitter:card" content="summary_large_image">

<!-- Mobile Specific -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover">

<!-- Favicons Icon -->
<link rel="shortcut icon" type="image/x-icon" href="assets/images/app-logo/favicon.png">

<!-- Stylesheets -->
<link rel="stylesheet" href="assets/vendor/swiper/swiper-bundle.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/style.css">

<!-- Animte -->
<link rel="stylesheet" href="assets/vendor/wow/css/libs/animate.css">

<!-- Google Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&family=Raleway:wght@300;400;500&display=swap" rel="stylesheet">


        <!-- PWA  -->
<meta name="theme-color" content="#ffffff"/>
<link rel="apple-touch-icon" href="{{ asset('logo.PNG') }}">
<link rel="manifest" href="{{ asset('/manifest.json') }}">
    </head>
   
    <body>
<div class="page-wrapper">
    
    <!-- splash -->        
	<div class="loader-screen" id="splashscreen" style="background-image: url('assets/images/background/bg.jpg');">
		<img src="assets/images/preloader/circle1.png" class="circle-1" alt="">
		<img src="assets/images/preloader/circle2.png" class="circle-2" alt="">
		<div class="main-screen">
		<div class="loader">
    <img src="{{ asset('assets/logo.png') }}" class="wow zoomInDown" style="width: 25em; height: 25em;" alt="">
</div>
		
		</div>
		<p class="version wow bounceIn" data-wow-duration="0.5s" data-wow-delay="1s">Version 1.0</p>                                        
	</div>
	<!-- splash-->

    <!-- Welcome Start -->
	<main class="page-content">
		<div class="container p-0">
			<div class="welcome-area">
				<div class="bg-shape">
					<img class="vector-1" src="assets/images/welcome/vector1.svg" alt="">
					<img class="vector-2" src="assets/images/welcome/vector2.svg" alt="">
				</div>
				<div class="welcome-inner fixed-wrapper">
					<div class="swiper get-started">
						<div class="swiper-wrapper">
							<div class="swiper-slide">
								<div class="slide-info">
									<div class="dz-media">
										<img src="assets/images/svg/onboarding1.svg" alt="">
									</div>
									<div class="slide-content">
										<h3 class="dz-title" data-swiper-parallax="-300">Welcome to Smart Bite!</h3>
										<p data-swiper-parallax="-100">Let's cook up something delicious together.</p>
									</div>
								</div>
							</div>
							<div class="swiper-slide">
								<div class="slide-info">
									<div class="dz-media">
										<img src="assets/images/svg/onboarding2.svg" alt="">
									</div>
									<div class="slide-content">
										<h3 class="dz-title" data-swiper-parallax="-300">Cook With Confidence!</h3>
										<p data-swiper-parallax="-100">Connect your smartwatch to unlock a world of vibrant recipes tailored to your health metrics, mood, and activity.</p>
									</div>
								</div>
							</div>
							<div class="swiper-slide">
								<div class="slide-info">
									<div class="dz-media">
										<img src="assets/images/svg/onboarding3.svg" alt="">
									</div>
									<div class="slide-content">
										<h3 class="dz-title" data-swiper-parallax="-300">Culinary Joy Awaits!</h3>
										<p data-swiper-parallax="-100">Let's dive into a culinary adventure that promises to tantalize your taste buds.</p>
									</div>
								</div>
							</div>
						</div>
						<div class="swiper-btn">
							<div class="swiper-pagination style-1 flex-1"></div>
						</div>
					</div>
				</div>
				<div class="bottom-btn">
					<a href="{{ url('welcome') }}" class="btn btn-thin rounded-xl text-uppercase btn-lg w-100 btn-primary">Get Started</a>
				</div>
			</div>
		</div>
	</main>
    <!-- Welcome End -->
    
</div>
<!--**********************************
    Scripts
***********************************-->
<script src="assets/js/jquery.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script><!-- Swiper -->
<script src="assets/js/dz.carousel.js"></script><!-- Swiper -->
<script src="assets/vendor/wow/dist/wow.min.js"></script>
<script src="assets/js/settings.js"></script>
<script src="assets/js/custom.js"></script>
<script>
    new WOW().init();
    
    var wow = new WOW(
    {
      boxClass:     'wow',       // animated element css class (default is wow)
      animateClass: 'animated',  // animation css class (default is animated)
      offset:       50,          // distance to the element when triggering the animation (default is 0)
      mobile:       false        // trigger animations on mobile devices (true is default)
    });
    wow.init();
</script>
    <script src="{{ asset('/sw.js') }}"></script>
<script>
   if ("serviceWorker" in navigator) {
      // Register a service worker hosted at the root of the
      // site using the default scope.
      navigator.serviceWorker.register("/sw.js").then(
      (registration) => {
         console.log("Service worker registration succeeded:", registration);
      },
      (error) => {
         console.error(`Service worker registration failed: ${error}`);
      },
    );
  } else {
     console.error("Service workers are not supported.");
  }
</script>
</html>
