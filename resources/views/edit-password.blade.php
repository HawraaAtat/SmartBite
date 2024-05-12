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
				<div class="section-head">
					<h3 class="title">Change Password</h3>
				</div>
				<div class="account-section">
                <form class="m-b20" action="{{ route('update-password', $user->id) }}" method="POST">
    @csrf
    <!-- Current Password -->
    <div class="mb-4">
        <label class="form-label" for="current_password">Current Password</label>
        <div class="input-group input-mini input-lg">
            <input type="password" id="current_password" class="form-control" name="current_password" required>
            <span class="input-group-text show-pass">
                <i class="icon feather icon-eye-off eye-close"></i>
                <i class="icon feather icon-eye eye-open"></i>
            </span>
        </div>
        @error('current_password')
            <div class="alert alert-danger alert-dismissible alert-alt fade show" style="margin-top: 10px; margin-bottom: 10px;">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                    <span><i class="icon feather icon-x"></i></span>
                </button>
                {{ $message }}
            </div>
        @enderror
    </div>

    <!-- New Password -->
    <div class="mb-4">
        <label class="form-label" for="new_password">New Password</label>
        <div class="input-group input-mini input-lg">
            <input type="password" id="new_password" class="form-control" name="new_password" required >
            <span class="input-group-text show-pass">
                <i class="icon feather icon-eye-off eye-close"></i>
                <i class="icon feather icon-eye eye-open"></i>
            </span>
        </div>
        @error('new_password')
            <div class="alert alert-danger alert-dismissible alert-alt fade show" style="margin-top: 10px; margin-bottom: 10px;">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                    <span><i class="icon feather icon-x"></i></span>
                </button>
                {{ $message }}
            </div>
        @enderror
    </div>

    <!-- Confirm New Password -->
    <div class="mb-4">
        <label class="form-label" for="new_password_confirmation">Confirm New Password</label>
        <div class="input-group input-mini input-lg">
            <input type="password" id="new_password_confirmation" class="form-control" name="new_password_confirmation" required data-parsley-equalto="#new_password">
            <span class="input-group-text show-pass">
                <i class="icon feather icon-eye-off eye-close"></i>
                <i class="icon feather icon-eye eye-open"></i>
            </span>
        </div>
        @error('new_password_confirmation')
            <div class="alert alert-danger alert-dismissible alert-alt fade show" style="margin-top: 10px; margin-bottom: 10px;">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                    <span><i class="icon feather icon-x"></i></span>
                </button>
                {{ $message }}
            </div>
        @enderror
    </div>

    <button type="submit" class="btn btn-thin btn-lg w-100 btn-primary rounded-xl">Update</button>
</form>

	<!-- Main Content End  -->


</div>
@include('layout.script')
</body>
</html>
