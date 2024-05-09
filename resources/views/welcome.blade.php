<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Title -->
	<title>Ombe- Coffee Shop Mobile App Template (Bootstrap + PWA) | DexignZone</title>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="author" content="DexignZone">
	<meta name="robots" content="index, follow">

	<meta name="keywords" content="android, ios, mobile, mobile template, mobile app, ui kit, dark layout, app, delivery, ecommerce, material design, mobile, mobile web, order, phonegap, pwa, store, web app, Ombe, coffee app, coffee template, coffee shop, mobile UI, coffee design, app template, responsive design, coffee showcase, style app, trendy app, modern UI, technology, User-Friendly Interface, Coffee Shop App, PWA (Progressive Web App), Mobile Ordering, Coffee Experience, Digital Menu, Innovative Technology, App Development, Coffee Experience, cafe, bootatrap, Bootstrap Framework, UI/UX Design, Coffee Shop Technology, Online Presence, Coffee Shop Website, Cafe Template, Mobile App Design, Web Application, Digital Presence, ">

	<meta name="description" content="Discover the perfect blend of design and functionality with Ombe, a Coffee Shop Mobile App Template crafted with Bootstrap and enhanced with Progressive Web App (PWA) capabilities. Elevate your coffee shop's online presence with a seamless, responsive, and feature-rich template. Explore a modern design, user-friendly interface, and PWA technology for an immersive mobile experience. Brew success for your coffee shop effortlessly – Ombe is the ideal template to caffeinate your digital presence.">

	<meta property="og:title" content="Ombe- Coffee Shop Mobile App Template (Bootstrap + PWA) | DexignZone">
	<meta property="og:description" content="Discover the perfect blend of design and functionality with Ombe, a Coffee Shop Mobile App Template crafted with Bootstrap and enhanced with Progressive Web App (PWA) capabilities. Elevate your coffee shop's online presence with a seamless, responsive, and feature-rich template. Explore a modern design, user-friendly interface, and PWA technology for an immersive mobile experience. Brew success for your coffee shop effortlessly – Ombe is the ideal template to caffeinate your digital presence.">

	<meta property="og:image" content="https://ombe.dexignzone.com/xhtml/social-image.png">

	<meta name="format-detection" content="telephone=no">

	<meta name="twitter:title" content="Ombe- Coffee Shop Mobile App Template (Bootstrap + PWA) | DexignZone">
	<meta name="twitter:description" content="Discover the perfect blend of design and functionality with Ombe, a Coffee Shop Mobile App Template crafted with Bootstrap and enhanced with Progressive Web App (PWA) capabilities. Elevate your coffee shop's online presence with a seamless, responsive, and feature-rich template. Explore a modern design, user-friendly interface, and PWA technology for an immersive mobile experience. Brew success for your coffee shop effortlessly – Ombe is the ideal template to caffeinate your digital presence.">

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

</head>
<body>
<div class="page-wrapper">

    <!-- Preloader -->
	<div id="preloader">
		<div class="loader">
			<div class="spinner-border text-primary" role="status">
				<span class="visually-hidden">Loading...</span>
			</div>
		</div>
	</div>

    <!-- Preloader end-->

    <!-- Welcome Start -->
	<main class="page-content">
    <div class="container py-0">
        <div class="welcome-area row">
            <div class="welcome-inner-2 col" style="background-color: white; background-size: cover; background-repeat: no-repeat;">
                <div class="main-wrapper">
                    <div class="bg-shape">
                        <img class="vector-1" src="assets/images/welcome/vector1.svg" alt="">
                        <img class="vector-2" src="assets/images/welcome/vector2.svg" alt="">
                    </div>
                    <div class="main-logo">
                        <div class="logo-icon">
                            <img src="assets/logo.png" alt="logo">
                        </div>
                    </div>
                </div>
                <div class="dz-button-group" style="display: flex; flex-direction: column; align-items: center; justify-content: flex-start; height: 100%; margin-top: -20px;">
                    <h3 class="title">Welcome</h3>
                    <a href="{{ url('login') }}" class="btn btn-primary btn-social btn-thin rounded-xl btn-lg w-100" style="display: flex; align-items: center;"><img src="assets/images/social/inbox.png" alt="" style="margin-right: 10px;"><span>Login With Email</span></a>
                </div>
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
</body>
</html>
