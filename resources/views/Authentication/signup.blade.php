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

	<!-- Globle Stylesheets -->

	<!-- Stylesheets -->
    <link rel="stylesheet" class="main-css" type="text/css" href="assets/css/style.css">

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

	<!-- Main Content Start  -->
	<main class="page-content">
		<div class="container py-0">
			<div class="dz-authentication-area">
				<div class="main-logo">
					<a href="javascript:void(0);" class="back-btn">
						<i class="feather icon-arrow-left"></i>
					</a>
					<!-- <div class="logo">
						<img src="assets/images/app-logo/logo.png" alt="logo">
					</div> -->
				</div>
				<div class="section-head">
					<h3 class="title">Create an account</h3>
				</div>
				<div class="account-section">
					<form class="m-b20" action="{{route('register')}}" method="POSt">
						@csrf
						<!-- First Name -->
                        <div class="mb-4">
                            <label class="form-label" for="first_name">First Name</label>
                            <div class="input-group input-mini input-lg">
                                <input type="text" id="first_name" class="form-control" name="first_name" value="{{ old('first_name') }}">
                                @error('first_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Last Name -->
                        <div class="mb-4">
                            <label class="form-label" for="last_name">Last Name</label>
                            <div class="input-group input-mini input-lg">
                                <input type="text" id="last_name" class="form-control" name="last_name" value="{{ old('last_name') }}">
                                @error('last_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        {{-- <!-- Date of Birth -->
                        <div class="mb-4">
                            <label class="form-label" for="dob">Date Of Birth</label>
                            <div class="input-group input-mini input-lg">
                                <input type="date" id="dob" class="form-control datepicker" name="date_of_birth" value="{{ old('date_of_birth') }}">
                                @error('date_of_birth')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div> --}}

                        <!-- Email -->
                        <div class="mb-4">
                            <label class="form-label" for="email">Email</label>
                            <div class="input-group input-mini input-lg">
                                <input type="email" id="email" class="form-control" name="email" value="{{ old('email') }}">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="mb-4">
                            <label class="form-label" for="password">Password</label>
                            <div class="input-group input-mini input-lg">
                                <input type="password" id="password" class="form-control dz-password" name="password">
                                <span class="input-group-text show-pass">
                                    <i class="icon feather icon-eye-off eye-close"></i>
                                    <i class="icon feather icon-eye eye-open"></i>
                                </span>
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-4">
                            <label class="form-label" for="password_confirmation">Confirm Password</label>
                            <div class="input-group input-mini input-lg">
                                <input type="password" id="password_confirmation" class="form-control dz-password" name="password_confirmation">
                                <span class="input-group-text show-pass">
                                    <i class="icon feather icon-eye-off eye-close"></i>
                                    <i class="icon feather icon-eye eye-open"></i>
                                </span>
                                @error('password_confirmation')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <div class="input-group input-mini input-lg">
                                <select class="form-control select2" name="allergies[]" multiple>
                                    <option value=""></option>
                                    @foreach(App\Enums\AllergensEnum::getValues() as $allergen)
                                        <option value="{{ $allergen }}">{{ $allergen }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mb-4">
                            <div class="input-group input-mini input-lg">
                                <select class="form-control select2" name="chronic_diseases[]" multiple>
                                    <option value=""></option>
                                    @foreach(App\Enums\ChronicDiseasesEnum::getValues() as $diseases)
                                        <option value="{{ $diseases }}">{{ App\Enums\ChronicDiseasesEnum::getDescription($diseases) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

						<button type="submit"  class="btn btn-thin btn-lg w-100 btn-primary rounded-xl">Sign up</button>
					</form>
					<div class="text-center">
						<p class="form-text">By tapping “Sign Up” you accept our <a href="javascript:void(0);" class="link">terms</a> and <a href="javascript:void(0);" class="link">condition</a></p>
					</div>
				</div>
			</div>
        </div>
	</main>
	<!-- Main Content End  -->


</div>
<!--**********************************
    Scripts
***********************************-->
<script src="assets/js/jquery.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script><!-- Swiper -->
<script src="assets/js/dz.carousel.js"></script><!-- Swiper -->
<script src="assets/js/settings.js"></script>
<script src="assets/js/custom.js"></script>

</body>
</html>
