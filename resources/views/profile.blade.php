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
			
			<div class="mid-content">
				<h4 class="title">Profile</h4>
			</div>
			<!-- <div class="right-content d-flex align-items-center gap-4">
				<a href="{{route('edit-profile')}}">
					<svg enable-background="new 0 0 461.75 461.75" height="24" viewBox="0 0 461.75 461.75" width="24" xmlns="http://www.w3.org/2000/svg">
						<path d="m23.099 461.612c2.479-.004 4.941-.401 7.296-1.177l113.358-37.771c3.391-1.146 6.472-3.058 9.004-5.587l226.67-226.693 75.564-75.541c9.013-9.016 9.013-23.63 0-32.645l-75.565-75.565c-9.159-8.661-23.487-8.661-32.645 0l-75.541 75.565-226.693 226.67c-2.527 2.53-4.432 5.612-5.564 9.004l-37.794 113.358c-4.029 12.097 2.511 25.171 14.609 29.2 2.354.784 4.82 1.183 7.301 1.182zm340.005-406.011 42.919 42.919-42.919 42.896-42.896-42.896zm-282.056 282.056 206.515-206.492 42.896 42.896-206.492 206.515-64.367 21.448z" fill="#4A3749"></path>
					</svg>
				</a>
			</div> -->
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
	<span style="display: flex; align-items: center;">Personal Details
    <a href="{{route('edit-profile')}}" style="margin-left: 5px;">
        <svg enable-background="new 0 0 461.75 461.75" height="15" viewBox="0 0 461.75 461.75" width="24" xmlns="http://www.w3.org/2000/svg">
            <path d="m23.099 461.612c2.479-.004 4.941-.401 7.296-1.177l113.358-37.771c3.391-1.146 6.472-3.058 9.004-5.587l226.67-226.693 75.564-75.541c9.013-9.016 9.013-23.63 0-32.645l-75.565-75.565c-9.159-8.661-23.487-8.661-32.645 0l-75.541 75.565-226.693 226.67c-2.527 2.53-4.432 5.612-5.564 9.004l-37.794 113.358c-4.029 12.097 2.511 25.171 14.609 29.2 2.354.784 4.82 1.183 7.301 1.182zm340.005-406.011 42.919 42.919-42.919 42.896-42.896-42.896zm-282.056 282.056 206.515-206.492 42.896 42.896-206.492 206.515-64.367 21.448z" fill="#4A3749"></path>
        </svg>
    </a>
</span>

		
    </li>
	

    <li style="margin-bottom: 20px;"> <!-- Add margin-bottom to create space -->
        <div class="icon-bx">
            <!-- Icon for Email Address -->
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
        <!-- Icon for Chronic Diseases -->
		<svg class="svg-primary" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M17.25 7.00017C17.25 6.58595 16.9142 6.25017 16.5 6.25017C16.0858 6.25017 15.75 6.58595 15.75 7.00017V8.25018H14.5C14.0858 8.25018 13.75 8.58597 13.75 9.00018C13.75 9.4144 14.0858 9.75018 14.5 9.75018L15.75 9.75018V11.0002C15.75 11.4144 16.0858 11.7502 16.5 11.7502C16.9142 11.7502 17.25 11.4144 17.25 11.0002V9.75018H18.5C18.9142 9.75018 19.25 9.4144 19.25 9.00018C19.25 8.58597 18.9142 8.25018 18.5 8.25018H17.25V7.00017Z" fill="#4A3749"></path>
    <path fill-rule="evenodd" clip-rule="evenodd" d="M22.75 9.31763C22.75 5.99224 21.2676 3.50983 18.9609 2.60661C16.8252 1.77035 14.2618 2.39603 12 4.51334C9.73815 2.39603 7.17479 1.77035 5.0391 2.60662C2.73242 3.50984 1.25 5.99226 1.25 9.31767C1.25 11.4356 2.38041 13.5198 3.78729 15.3141C5.20863 17.1269 6.99671 18.7501 8.48914 19.9612L8.62327 20.0701C9.82386 21.0458 10.6906 21.7502 12 21.7502C13.3094 21.7502 14.1762 21.0458 15.3767 20.0702L15.5109 19.9612C17.0033 18.7501 18.7914 17.1269 20.2127 15.3141C21.6196 13.5198 22.75 11.4356 22.75 9.31763ZM12.5478 6.08652C14.6596 3.82795 16.8491 3.39059 18.414 4.00335C19.9823 4.61747 21.25 6.41304 21.25 9.31763C21.25 10.9291 20.3707 12.6816 19.0323 14.3886C17.7084 16.0772 16.0156 17.6199 14.5657 18.7965C13.1731 19.9265 12.7229 20.2502 12 20.2502C11.2771 20.2502 10.8269 19.9265 9.43432 18.7964C7.98445 17.6199 6.29166 16.0771 4.96771 14.3886C3.62931 12.6816 2.75 10.929 2.75 9.31767C2.75 6.41306 4.01766 4.61747 5.58602 4.00336C7.15092 3.39059 9.34039 3.82795 11.4522 6.08652C11.594 6.2382 11.7923 6.32429 12 6.32429C12.2077 6.32429 12.406 6.2382 12.5478 6.08652Z" fill="#4A3749"></path>
</svg>

    </div>
    <div class="dz-content">
    <p class="sub-title">Chronic Diseases</p>
    @if($user->chronic_diseases != null && count($user->chronic_diseases) > 0)
        @foreach($user->chronic_diseases as $cd)
            <?php $cd = (int)$cd ?>
            <?php $diseaseName = \App\Enums\ChronicDiseasesEnum::getDescription($cd) ?>
            <h6 class="title">{{$diseaseName}}</h6>
        @endforeach
    @else
        <h6 class="title">None</h6>
    @endif
</div>

</li>

<li>
    <div class="icon-bx">
        <!-- Icon for Food Intolerances -->
		<svg class="svg-primary" stroke-width="1.8432" fill="none" width="24" height="24" viewBox="0 0 122.88 122.88" xmlns="http://www.w3.org/2000/svg">
    <path fill-rule="evenodd" clip-rule="evenodd" d="M97.34,0.74c0.86-0.93,2.3-0.99,3.23-0.13c0.93,0.86,0.99,2.3,0.13,3.23L81.98,24.1l-0.03,0.04 c-2.29,2.77-3.86,5.33-4.56,7.67c-0.62,2.07-0.53,3.95,0.39,5.59c0.49,0.88,0.33,1.96-0.32,2.67l0,0l-8.89,9.62 c-0.87-0.95-1.56-1.72-2.02-2.22c-0.21-0.28-0.45-0.55-0.7-0.81l-0.02,0.02c-0.12-0.13-0.25-0.25-0.38-0.37l7.6-8.23 c-0.89-2.38-0.88-4.91-0.06-7.6c0.88-2.92,2.75-6.03,5.44-9.27c0.06-0.08,0.11-0.16,0.18-0.23L97.32,0.72L97.34,0.74L97.34,0.74z M57.13,55.01c-0.84-0.94-0.76-2.39,0.18-3.23c0.94-0.84,2.39-0.76,3.23,0.18c9.41,10.54,38.5,41.73,46.56,53.39 c10.63,15.05-5.83,19.79-11.29,14.31c-13.64-13.19-42.6-46.82-55.33-61.08c-4.58,1.94-9.03,2.24-13.5,0.96 c-4.81-1.37-9.52-4.58-14.3-9.51l-0.06-0.06c-3.64-3.84-6.49-7.63-8.55-11.38c-2.11-3.86-3.4-7.68-3.86-11.47 c-0.49-4.08-0.11-7.88,0.99-11.25c1.29-3.96,3.58-7.31,6.58-9.8c3.02-2.5,6.73-4.12,10.87-4.62c3.44-0.41,7.19-0.06,11.07,1.21 c5.37,1.75,11.63,6.1,16.82,11.68c3.83,4.11,7.11,8.92,9.06,13.87c2.03,5.16,2.65,10.5,1.02,15.5c-0.96,2.96-2.7,5.74-5.4,8.25 c-0.93,0.86-2.37,0.8-3.23-0.12c-0.86-0.93-0.8-2.37,0.12-3.23c2.09-1.95,3.43-4.08,4.16-6.33c1.26-3.87,0.73-8.16-0.93-12.38 c-1.74-4.42-4.69-8.74-8.15-12.45c-4.68-5.02-10.23-8.91-14.91-10.44c-3.21-1.04-6.28-1.34-9.09-1c-3.26,0.4-6.18,1.65-8.51,3.6 c-2.34,1.95-4.13,4.58-5.16,7.71c-0.89,2.73-1.2,5.87-0.79,9.26c0.39,3.2,1.5,6.47,3.32,9.81c1.91,3.43,4.53,6.9,7.9,10.45 l0.02,0.03c4.22,4.35,8.27,7.15,12.28,8.29c3.79,1.08,7.65,0.66,11.68-1.35c0.92-0.53,2.11-0.35,2.84,0.47 c12.42,13.91,42.63,48.92,56.01,61.89c5.81,2.37,9.03-0.55,6.25-5.7C100.7,102.43,63.5,62.17,57.13,55.01L57.13,55.01L57.13,55.01z M45.07,75.12l-29.16,31.55c-0.06,0.06-0.11,0.12-0.18,0.18c-4.26,4.6,3.28,11.3,7.96,6.82l28.32-30.65l3.04,3.45l-28.1,30.41l0,0 c-0.06,0.07-0.12,0.13-0.2,0.2c-1.68,1.41-3.37,2.33-5.08,2.71c-1.76,0.4-3.49,0.22-5.15-0.56c-0.28-0.11-0.54-0.25-0.77-0.46 l-4.03-3.73l0,0c-0.06-0.06-0.12-0.11-0.18-0.18c-1.56-1.8-2.3-3.72-2.1-5.75c0.19-1.92,1.21-3.79,3.14-5.59l29.44-31.86 L45.07,75.12L45.07,75.12z M75.63,57.46l1.73-1.87c0.86-0.93,2.31-0.99,3.23-0.13s0.99,2.3,0.13,3.23l-2,2.16L75.63,57.46 L75.63,57.46z M104.45,7.43c0.86-0.93,2.3-0.99,3.23-0.13c0.93,0.86,0.99,2.3,0.13,3.23L91.4,28.3c-0.86,0.93-2.3,0.99-3.23,0.13 c-0.93-0.86-0.99-2.3-0.13-3.23L104.45,7.43L104.45,7.43L104.45,7.43z M111.55,14c0.86-0.93,2.3-0.99,3.23-0.13 c0.93,0.86,0.99,2.3,0.13,3.23L98.51,34.86c-0.86,0.93-2.3,0.99-3.23,0.13c-0.93-0.86-0.99-2.3-0.13-3.23L111.55,14L111.55,14 L111.55,14z M118.91,20.83c0.86-0.93,2.3-0.99,3.23-0.13c0.93,0.86,0.99,2.31,0.13,3.23L103.55,44.2c-0.07,0.07-0.14,0.13-0.21,0.2 c-4.26,4.1-8.33,6.47-12.22,7.14c-4.22,0.73-8.09-0.47-11.64-3.57c-0.95-0.83-1.04-2.28-0.22-3.22c0.83-0.95,2.28-1.04,3.22-0.22 c2.45,2.14,5.07,2.98,7.84,2.49c2.98-0.51,6.26-2.48,9.84-5.93l0.02-0.02l18.71-20.25L118.91,20.83L118.91,20.83z" stroke="##04764E" stroke-width="10"></path>
</svg>



    </div>
	<div class="dz-content">
    <p class="sub-title">Food Intolerances</p>
    @if($user->intolerances != null && count($user->intolerances) > 0)
        @foreach($user->intolerances as $intolerance)
            <h6 class="title">{{ $intolerance }}</h6>
        @endforeach
    @else
        <h6 class="title">None</h6>
    @endif
</div>

</li>
<li>
    <div class="icon-bx">
<svg fill="#04764E" height="24px" width="24px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 370.063 370.063" xml:space="preserve" stroke="#04764E"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path id="XMLID_1293_" d="M176.916,114.962c3.515,3.515,3.516,9.213,0.002,12.729l-3.441,3.442 c-1.758,1.758-4.062,2.637-6.365,2.637c-2.303,0-4.605-0.878-6.363-2.635c-3.515-3.515-3.516-9.213-0.002-12.729l3.441-3.442 C167.702,111.449,173.399,111.447,176.916,114.962z M100.619,196.049c-9.687-15.641-14.807-33.621-14.807-51.996V31.691 C85.813,0.89,174.896,0,185.054,0c10.157,0,99.236,0.89,99.236,31.691c0,30.803-89.079,31.692-99.236,31.692 c-7.246,0-54.657-0.452-81.241-11.895v92.563c0,15.024,4.188,29.728,12.109,42.52c2.617,4.226,1.313,9.772-2.913,12.39 c-1.476,0.914-3.112,1.35-4.729,1.35C105.266,200.312,102.322,198.799,100.619,196.049z M104.809,31.691 c2.613,1.971,9.322,5.375,23.235,8.394c15.751,3.417,35.997,5.299,57.01,5.299c21.012,0,41.258-1.882,57.008-5.299 c13.913-3.019,20.62-6.423,23.232-8.394c-2.612-1.97-9.32-5.374-23.232-8.393C226.312,19.882,206.065,18,185.054,18 s-41.258,1.882-57.01,5.299C114.131,26.316,107.423,29.722,104.809,31.691z M144.029,85.689l-3.441-3.442 c-3.515-3.515-9.212-3.515-12.729-0.002c-3.515,3.515-3.516,9.213-0.002,12.729l3.441,3.442c1.758,1.758,4.062,2.637,6.365,2.637 c2.303,0,4.605-0.879,6.363-2.635C147.542,94.903,147.543,89.205,144.029,85.689z M275.29,130.25c-4.971,0-9,4.029-9,9 c0,1.783-0.022,6.949-0.052,7.741c-1.546,43.175-37.967,78.301-81.187,78.301c-2.387,0-4.676,0.948-6.364,2.636 c-1.688,1.688-2.636,3.978-2.636,6.364l0.002,96.496c0,4.971,4.029,9,9,9s9-4.029,9-9l-0.002-87.902 c22.389-2.03,43.36-11.61,59.821-27.484c18.653-17.988,29.433-42.055,30.354-67.754c0.053-1.427,0.063-8.331,0.063-8.397 C284.29,134.279,280.261,130.25,275.29,130.25z M363.625,2.636c-3.516-3.514-9.213-3.514-12.729,0L6.438,347.096 c-3.515,3.515-3.515,9.214,0,12.729c1.758,1.757,4.061,2.636,6.364,2.636s4.606-0.879,6.364-2.636l344.459-344.46 C367.14,11.85,367.14,6.15,363.625,2.636z M226.289,315.44c-4.919-0.726-9.496,2.662-10.228,7.577 c-0.731,4.916,2.661,9.495,7.577,10.228c16.638,2.477,25.354,5.938,29.113,8.136c-7.383,4.396-30.689,10.682-67.698,10.682 c-37.012,0-60.318-6.286-67.699-10.682c3.759-2.198,12.474-5.659,29.114-8.136c4.916-0.732,8.309-5.311,7.577-10.228 c-0.731-4.915-5.31-8.308-10.228-7.577c-30.674,4.565-46.227,13.276-46.227,25.892c0,27.346,72.856,28.73,87.462,28.73 c14.604,0,87.461-1.385,87.461-28.73C272.515,328.718,256.962,320.007,226.289,315.44z M127.859,147.681 c-3.515,3.515-3.516,9.213-0.002,12.729l3.441,3.442c1.758,1.758,4.062,2.637,6.365,2.637c2.303,0,4.605-0.879,6.363-2.635 c3.515-3.515,3.516-9.213,0.002-12.729l-3.441-3.442C137.073,144.168,131.376,144.168,127.859,147.681z"></path> </g></svg>



    </div>
	<div class="dz-content">
    <p class="sub-title">Halal</p>
    <h6 class="title">{{ $user->ethical_meal_considerations == 1 ? 'Yes' : 'No' }}</h6>
</div>
</li>


<span style="display: flex; align-items: center;">Change Your Password
    <a href="{{route('edit-password')}}" style="margin-left: 5px;">
        <svg enable-background="new 0 0 461.75 461.75" height="15" viewBox="0 0 461.75 461.75" width="24" xmlns="http://www.w3.org/2000/svg">
            <path d="m23.099 461.612c2.479-.004 4.941-.401 7.296-1.177l113.358-37.771c3.391-1.146 6.472-3.058 9.004-5.587l226.67-226.693 75.564-75.541c9.013-9.016 9.013-23.63 0-32.645l-75.565-75.565c-9.159-8.661-23.487-8.661-32.645 0l-75.541 75.565-226.693 226.67c-2.527 2.53-4.432 5.612-5.564 9.004l-37.794 113.358c-4.029 12.097 2.511 25.171 14.609 29.2 2.354.784 4.82 1.183 7.301 1.182zm340.005-406.011 42.919 42.919-42.919 42.896-42.896-42.896zm-282.056 282.056 206.515-206.492 42.896 42.896-206.492 206.515-64.367 21.448z" fill="#4A3749"></path>
        </svg>
    </a>
</span>
					</ul>
					<div style="display: flex; justify-content: center;">
                  
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