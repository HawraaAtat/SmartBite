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
				<h3 class="title">New Password</h3>
			</div>
			<div class="account-section">
				<form class="m-b30" action="{{ route('reset.password.post') }}" method="POST">
					@csrf
					@method('POST')
					<input type="text" hidden value="{{$token}}" name="token">
					<div class="mb-4">
						<label class="form-label" for="name">Email</label>
						<div class="input-group input-mini input-lg">
							<input type="email" id="email" class="form-control" name="email" value="{{old('email')}}">
						</div>
						@error('email')
						<div class="alert alert-danger alert-dismissible alert-alt fade show"
							style="margin-top: 10px; margin-bottom: 10px;">
							<button type="button" class="btn-close" data-bs-dismiss="alert"
								aria-label="btn-close"><span><i class="icon feather icon-x"></i></span>
							</button>
							{{ $message }}
						</div>
						@enderror
					</div>
					<div class="mb-4">
						<label class="form-label" for="password">Password</label>
						<div class="input-group input-mini input-lg">
							<input type="password" id="password" class="form-control" name="password">
						</div>
						@error('password')
						<div class="alert alert-danger alert-dismissible alert-alt fade show"
							style="margin-top: 10px; margin-bottom: 10px;">
							<button type="button" class="btn-close" data-bs-dismiss="alert"
								aria-label="btn-close"><span><i class="icon feather icon-x"></i></span>
							</button>
							{{ $message }}
						</div>
						@enderror
					</div>
					<div class="mb-4">
						<label class="form-label" for="password_confirmation">Confirm Password</label>
						<div class="input-group input-mini input-lg">
							<input type="password" id="password" class="form-control" name="password_confirmation">
						</div>
						@error('password_confirmation')
						<div class="alert alert-danger alert-dismissible alert-alt fade show"
							style="margin-top: 10px; margin-bottom: 10px;">
							<button type="button" class="btn-close" data-bs-dismiss="alert"
								aria-label="btn-close"><span><i class="icon feather icon-x"></i></span>
							</button>
							{{ $message }}
						</div>
						@enderror
					</div>
					<button type="submit" class="btn btn-thin btn-lg w-100 btn-primary rounded-xl">Submit</button>
				</form>
				<div class="text-center account-footer">

				</div>
			</div>
		</div>
	</main>
	<!-- Main Content End  -->

	@include('layout.script')