@include('layout.header')
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
						<h5 class="title mb-0">History</h5>
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
                        <a href=""><img src="{{ $recipe['image'] }}" alt=""></a>
                    </div>
                    <div class="dz-info">
                        <div class="dz-head">
                            <h6 class="title">{{ $recipe['title'] }}</h6>
                        </div>
                        <ul class="dz-meta">
                            <li>{{ $recipe['created_at']->format('d-m-Y') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</main>



	</script>

	<!-- Main Content End -->

	<!-- Menubar -->
	<div class="menubar-area footer-fixed">
          <div class="toolbar-inner menubar-nav">
            <a href="{{route('dashboard')}}" class="nav-link ">
              <i class="fi fi-rr-home"></i>
            </a>
            <a href="{{ route('favorites.index') }}" class="nav-link">
    <i class="fi fi-rr-heart"></i>
</a>

<a href="{{route('meal-history.index')}}" class="nav-link active">
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
