<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ombe- Coffee Shop Mobile App Template (Bootstrap + PWA) | DexignZone</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="DexignZone">
    <meta name="robots" content="index, follow">
    <meta name="keywords" content="android, ios, mobile, mobile template, mobile app, ui kit, dark layout, app, delivery, ecommerce, material design, mobile, mobile web, order, phonegap, pwa, store, web app, Ombe, coffee app, coffee template, coffee shop, mobile UI, coffee design, app template, responsive design, coffee showcase, style app, trendy app, modern UI, technology, User-Friendly Interface, Coffee Shop App, PWA (Progressive Web App), Mobile Ordering, Coffee Experience, Digital Menu, Innovative Technology, App Development, Coffee Experience, cafe, bootatrap, Bootstrap Framework, UI/UX Design, Coffee Shop Technology, Online Presence, Coffee Shop Website, Cafe Template, Mobile App Design, Web Application, Digital Presence, Bootstrap, caffine">
    <meta name="description" content="Discover the perfect blend of design and functionality with Ombe, a Coffee Shop Mobile App Template crafted with Bootstrap and enhanced with Progressive Web App (PWA) capabilities. Elevate your coffee shop's online presence with a seamless, responsive, and feature-rich template. Explore a modern design, user-friendly interface, and PWA technology for an immersive mobile experience. Brew success for your coffee shop effortlessly – Ombe is the ideal template to caffeinate your digital presence.">
    <meta property="og:title" content="Ombe- Coffee Shop Mobile App Template (Bootstrap + PWA) | DexignZone">
    <meta property="og:description" content="Discover the perfect blend of design and functionality with Ombe, a Coffee Shop Mobile App Template crafted with Bootstrap and enhanced with Progressive Web App (PWA) capabilities. Elevate your coffee shop's online presence with a seamless, responsive, and feature-rich template. Explore a modern design, user-friendly interface, and PWA technology for an immersive mobile experience. Brew success for your coffee shop effortlessly – Ombe is the ideal template to caffeinate your digital presence.">
    <meta property="og:image" content="{{ asset('assets/images/app-logo/favicon.png') }}">
    <meta name="format-detection" content="telephone=no">
    <meta name="twitter:title" content="Ombe- Coffee Shop Mobile App Template (Bootstrap + PWA) | DexignZone">
    <meta name="twitter:description" content="Discover the perfect blend of design and functionality with Ombe, a Coffee Shop Mobile App Template crafted with Bootstrap and enhanced with Progressive Web App (PWA) capabilities. Elevate your coffee shop's online presence with a seamless, responsive, and feature-rich template. Explore a modern design, user-friendly interface, and PWA technology for an immersive mobile experience. Brew success for your coffee shop effortlessly – Ombe is the ideal template to caffeinate your digital presence.">
    <meta name="twitter:image" content="{{ asset('assets/images/app-logo/favicon.png') }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/app-logo/favicon.png') }}">
    <link rel="manifest" href="{{ asset('manifest.json') }}">
    <link href="{{ asset('assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />
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
	
	<!-- Header -->
	<header class="header header-fixed">
		<div class="header-content">
			<div class="left-content">
				<a href="javascript:void(0);" class="back-btn">
					<i class="feather icon-arrow-left"></i>
				</a>
			</div>
			<div class="mid-content">
				<h4 class="title">Profile</h4>
			</div>
			<div class="right-content d-flex align-items-center gap-4">
				<a href="{{route('edit-profile')}}">
					<svg enable-background="new 0 0 461.75 461.75" height="24" viewBox="0 0 461.75 461.75" width="24" xmlns="http://www.w3.org/2000/svg">
						<path d="m23.099 461.612c2.479-.004 4.941-.401 7.296-1.177l113.358-37.771c3.391-1.146 6.472-3.058 9.004-5.587l226.67-226.693 75.564-75.541c9.013-9.016 9.013-23.63 0-32.645l-75.565-75.565c-9.159-8.661-23.487-8.661-32.645 0l-75.541 75.565-226.693 226.67c-2.527 2.53-4.432 5.612-5.564 9.004l-37.794 113.358c-4.029 12.097 2.511 25.171 14.609 29.2 2.354.784 4.82 1.183 7.301 1.182zm340.005-406.011 42.919 42.919-42.919 42.896-42.896-42.896zm-282.056 282.056 206.515-206.492 42.896 42.896-206.492 206.515-64.367 21.448z" fill="#4A3749"></path>
					</svg>
				</a>
			</div>
		</div>
	</header>
	<!-- Header -->
	
	<!-- Main Content Start -->
	<main class="page-content space-top p-b40">
		<div class="container pt-0">
			<div class="profile-area">
				<div class="author-bx">
					<div class="dz-content">
						<h2 class="name">{{$user->first_name}} {{$user->last_name}}</h2>
					</div>
				</div>
				<div class="widget_getintuch pb-15">
					<ul>
						<li>
							<div class="icon-bx">
								<svg class="svg-primary" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M22 3H2C1.73478 3 1.48043 3.10536 1.29289 3.29289C1.10536 3.48043 1 3.73478 1 4V20C1 20.2652 1.10536 20.5196 1.29289 20.7071C1.48043 20.8946 1.73478 21 2 21H22C22.2652 21 22.5196 20.8946 22.7071 20.7071C22.8946 20.5196 23 20.2652 23 20V4C23 3.73478 22.8946 3.48043 22.7071 3.29289C22.5196 3.10536 22.2652 3 22 3ZM21 19H3V9.477L11.628 12.929C11.867 13.0237 12.133 13.0237 12.372 12.929L21 9.477V19ZM21 7.323L12 10.923L3 7.323V5H21V7.323Z" fill="#4A3749"></path>
								</svg>
							</div>
							<div class="dz-content">
								<p class="sub-title">Email Address</p>
								<h6 class="title">{{$user->email}}</h6>
							</div>
						</li>
						
                        <li>
							<div class="icon-bx">
								
							</div>
							<div class="dz-content">
								<p class="sub-title">Intelorances</p>
								@if($user->allergies != null)
                                @foreach($user->allergies as $a)
                                    <h6 class="title">{{ $a }}</h6>
                                @endforeach
								@endif
							</div>
						</li>
                        <li>
							<div class="icon-bx">




							</div>
							<div class="dz-content">
								<p class="sub-title">Chronic Diseases</p>
								@if($user->chronic_diseases != null)
                                @foreach($user->chronic_diseases as $cd)
                                <?php $cd = (int)$cd ?>
                                <?php $diseaseName = \App\Enums\ChronicDiseasesEnum::getDescription($cd) ?>
                                     <h6 class="title">{{$diseaseName}}</h6>
                                @endforeach
								@endif
							</div>
						</li>
					</ul>
				</div>

				<!-- Most Ordered -->
				<div class="title-bar">
					<h5 class="title">Most Ordered</h5>
				</div>
				<div class="swiper overlay-swiper2">
					<div class="swiper-wrapper">
						<div class="swiper-slide">
							<div class="dz-card list style-4">
								<div class="dz-media">
									<img src="assets/images/order/pic1.png" alt="">
								</div>
								<div class="dz-content">
									<h6 class="title"><a href="product-detail.html">Creamy Latte Coffee</a></h6>
									<ul class="dz-meta">
										<li class="category flex-1">Beverages</li>
										<li><a href="javascript:void(0);"><i class="fa-solid fa-arrow-up-right-from-square"></i></a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="swiper-slide">
							<div class="dz-card list style-4">
								<div class="dz-media">
									<img src="assets/images/order/pic2.png" alt="">
								</div>
								<div class="dz-content">
									<h6 class="title"><a href="product-detail.html">Ombe Ice Coffee Latte</a></h6>
									<ul class="dz-meta">
										<li class="category flex-1">Beverages</li>
										<li><a href="javascript:void(0);"><i class="fa-solid fa-arrow-up-right-from-square"></i></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
	<!-- Main Content End -->

	<!-- Menubar -->
	<div class="menubar-area footer-fixed">
          <div class="toolbar-inner menubar-nav">
            <a href="{{route('dashboard')}}" class="nav-link ">
              <i class="fi fi-rr-home"></i>
            </a>
			<a href="{{ route('favorites.index') }}" class="nav-link ">
    <i class="fi fi-rr-heart"></i>
</a>

<a href="{{route('meal-history.index')}}" class="nav-link">
<i class="fi fi-rr-document"></i>
            </a>
            <a href="{{route('profile')}}" class="nav-link active">
              <i class="fi fi-rr-user"></i>
            </a>
          </div>
        </div>
	<!-- Menubar -->
</div>  
<!--**********************************
    Scripts
***********************************-->
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/dz.carousel.js') }}"></script>
    <script src="{{ asset('assets/js/settings.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js') }}"></script>
</body>
</html>