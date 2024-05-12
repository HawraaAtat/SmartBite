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
					<!-- <div class="logo">
						<img src="assets/images/app-logo/logo.png" alt="logo">
					</div> -->
				</div>
				<div class="main-logo">
					<!-- <div class="logo">
						<img src="assets/logo.png" alt="logo" >
					</div> -->
				</div>
				<div class="section-head">
					<h3 class="title">Reset Password</h3>
				</div>
                @if(session('success'))
                    <div class="alert alert-primary alert-dismissible fade show" style="margin-bottom: 20px;">
                        <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><circle cx="12" cy="12" r="10"></circle><path d="M8 14s1.5 2 4 2 4-2 4-2"></path><line x1="9" y1="9" x2="9.01" y2="9"></line><line x1="15" y1="9" x2="15.01" y2="9"></line></svg>
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                        <span><i class="icon feather icon-x"></i></span>
                        </button>
                    </div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" style="margin-bottom: 20px;">
                        <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"><span><i class="icon feather icon-x"></i></span>
                        </button>
                    </div>
                @endif
				<div class="account-section">
					<form class="m-b30" action="{{ route('forget.password.post') }}" method="POST">
						@csrf

						<div class="mb-4">
							<label class="form-label" for="name">Email</label>
							<div class="input-group input-mini input-lg">
								<input type="email" id="email" class="form-control" name="email" >
							</div>
                            @error('email')
                                <div class="alert alert-danger alert-dismissible alert-alt fade show" style="margin-top: 10px; margin-bottom: 10px;">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"><span><i class="icon feather icon-x"></i></span>
                                    </button>
                                    {{ $message }}
                                </div>
                            @enderror
						</div>
						<button type="submit" class="btn btn-thin btn-lg w-100 btn-primary rounded-xl">Continue</a>
					</form>
					<!-- <div class="text-center account-footer"> -->

								</div>
				<!-- </div>	 -->
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
