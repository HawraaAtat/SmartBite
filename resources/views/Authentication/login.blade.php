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
					<!-- <div class="logo">
						<img src="assets/logo.png" alt="logo" >
					</div> -->
				</div>
				<div class="section-head">
					<h3 class="title">Log In</h3>
				</div>
				<div class="account-section">
					<form class="m-b30" action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label class="form-label" for="email">Email</label>
                            <div class="input-group input-mini input-lg">
                                <input type="email" id="email" class="form-control" name="email" value="{{ old('email') }}">
                            </div>
                            @error('email')
                                <div class="alert alert-danger alert-dismissible alert-alt fade show" style="margin-top: 10px; margin-bottom: 10px;">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"><span><i class="icon feather icon-x"></i></span>
                                    </button>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="m-b30">
                            <label class="form-label" for="password">Password</label>
                            <div class="input-group input-mini input-lg">
                                <input type="password" id="password" class="form-control dz-password" name="password">
                                <span class="input-group-text show-pass">
                                    <i class="icon feather icon-eye-off eye-close"></i>
                                    <i class="icon feather icon-eye eye-open"></i>
                                </span>
                            </div>
                            @error('password')
                                <div class="alert alert-danger alert-dismissible alert-alt fade show" style="margin-top: 10px; margin-bottom: 10px;">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"><span><i class="icon feather icon-x"></i></span>
                                    </button>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-thin btn-lg w-100 btn-primary rounded-xl mb-3">Login</button>
                        <p class="form-text">Forgot Password? <a href="{{ route('forget.password') }}" class="link ms-2">Reset Password</a></p>
                    </form>
					<div class="text-center account-footer">
						<p class="text-light">Dont have any account?</p>
						<a href="{{ url('signup') }}" class="btn btn-secondary btn-lg btn-thin rounded-xl w-100">CREATE AN ACCOUNT</a>
					</div>
				</div>
			</div>
        </div>
	</main>
	<!-- Main Content End  -->

    @include('layout.script')