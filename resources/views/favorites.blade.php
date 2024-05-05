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

	<meta property="og:image" content="{{ asset('assets/images/app-logo/favicon.png') }}">

	<meta name="format-detection" content="telephone=no">

	<meta name="twitter:title" content="Ombe- Coffee Shop Mobile App Template (Bootstrap + PWA) | DexignZone">
	<meta name="twitter:description" content="Discover the perfect blend of design and functionality with Ombe, a Coffee Shop Mobile App Template crafted with Bootstrap and enhanced with Progressive Web App (PWA) capabilities. Elevate your coffee shop's online presence with a seamless, responsive, and feature-rich template. Explore a modern design, user-friendly interface, and PWA technology for an immersive mobile experience. Brew success for your coffee shop effortlessly – Ombe is the ideal template to caffeinate your digital presence.">

	<meta name="twitter:image" content="{{ asset('assets/images/app-logo/favicon.png') }}">
	<meta name="twitter:card" content="summary_large_image">

	<!-- Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover">

	<!-- Favicons Icon -->
	<link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/app-logo/favicon.png') }}">
    
    <!-- Global CSS -->
	<link href="{{ asset('assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}">
    
	<!-- Stylesheets -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
	
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
	
	<!-- Header -->
		<header class="header header-fixed shadow">
			<div class="header-content">
				<div class="left-content">
					<div class="dz-head-items">
						<h5 class="title mb-0">Favorites</h5>
						<ul class="dz-meta">
			
						</ul>
					</div>
				</div>
				<div class="mid-content"></div>
				
			</div>
		</header>
	<!-- Header -->
	
	<!-- Main Content Start -->
	<main class="page-content space-top p-b60">
    <div class="container">
        <div class="row g-3">
            @foreach($filteredRecipes as $recipe)
            <div class="col-12 col-sm-6">
                <div class="dz-wishlist-bx">
                    <div class="dz-media">
                        <a href=""><img src= "{{ $recipe['image'] }}" alt=""></a>
                    </div>
                    <div class="dz-info">
                        <div class="dz-head">
                            <h6 class="title">{{ $recipe['title'] }}</a></h6>
                            
                        </div>
                        <ul class="dz-meta">
                            <li>
							@php
                                    $isFavorite = Auth::user()->favorites->contains('item_id', $recipe['id']);
                                @endphp
                                <i class="heart-icon fa fa-heart{{ $isFavorite ? ' active' : '' }}" style="color: {{ $isFavorite ? 'red' : 'black' }};" data-recipe-id="{{ $recipe['id'] }}"></i>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</main>
<script>
    document.querySelectorAll('.heart-icon').forEach(icon => {
        icon.addEventListener('click', function() {
            const recipeId = this.getAttribute('data-recipe-id');
            const token = '{{ csrf_token() }}';

            if (this.classList.contains('active')) {
                fetch(`/favorites/${recipeId}`, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': token
                    }
                })
                .then(response => {
                    if (response.ok) {
                        this.classList.remove('active');
                        this.style.color = 'black';
                    }
                })
                .catch(error => console.error('Error:', error));
            } else {
                fetch(`/favorites/${recipeId}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': token
                    }
                })
                .then(response => {
                    if (response.ok) {
                        this.classList.add('active');
                        this.style.color = 'red';
                    }
                })
                .catch(error => console.error('Error:', error));
            }
        });
    });
	</script>

	<!-- Main Content End -->
	
	<!-- Menubar -->
	<div class="menubar-area footer-fixed">
          <div class="toolbar-inner menubar-nav">
            <a href="{{route('dashboard')}}" class="nav-link ">
              <i class="fi fi-rr-home"></i>
            </a>
            <a href="{{ route('favorites.index') }}" class="nav-link active">
    <i class="fi fi-rr-heart"></i>
</a>

<a href="{{route('meal-history.index')}}" class="nav-link">
<i class="fi fi-rr-document"></i>
            </a>
            <a href="{{route('profile')}}" class="nav-link ">
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
<script src="{{ asset('assets/vendor/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js') }}"></script>
<script src="{{ asset('assets/js/dz.carousel.js') }}"></script>
<script src="{{ asset('assets/js/settings.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>
</body>
</html>
