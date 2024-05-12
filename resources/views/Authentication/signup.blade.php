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
					<h3 class="title">Create an account</h3>
				</div>
				<div class="account-section">
					<form class="m-b20" action="{{route('signup')}}" method="POSt">
						@csrf
						<!-- First Name -->
                        <div class="mb-4">
                            <label class="form-label" for="first_name">First Name</label>
                            <div class="input-group input-mini input-lg">
                                <input type="text" id="first_name" class="form-control" name="first_name" value="{{ old('first_name') }}">
                            </div>
                            @error('first_name')
                                <div class="alert alert-danger alert-dismissible alert-alt fade show" style="margin-top: 10px; margin-bottom: 10px;">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"><span><i class="icon feather icon-x"></i></span>
                                    </button>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Last Name -->
                        <div class="mb-4">
                            <label class="form-label" for="last_name">Last Name</label>
                            <div class="input-group input-mini input-lg">
                                <input type="text" id="last_name" class="form-control" name="last_name" value="{{ old('last_name') }}">
                            </div>
                            @error('last_name')
                                <div class="alert alert-danger alert-dismissible alert-alt fade show" style="margin-top: 10px; margin-bottom: 10px;">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"><span><i class="icon feather icon-x"></i></span>
                                    </button>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- <!-- Date of Birth -->
                        <div class="mb-4">
                            <label class="form-label" for="dob">Date Of Birth</label>
                            <div class="input-group input-mini input-lg">
                                <input type="date" id="dob" class="form-control datepicker" name="date_of_birth" value="{{ old('date_of_birth') }}">
                            </div>
                            @error('date_of_birth')
                                <div class="alert alert-danger alert-dismissible alert-alt fade show" style="margin-top: 10px; margin-bottom: 10px;">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"><span><i class="icon feather icon-x"></i></span>
                                    </button>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div> --}}

                        <!-- Email -->
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

                        <!-- Password -->
                        <div class="mb-4">
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

                        <!-- Confirm Password -->
                        <div class="mb-4">
                            <label class="form-label" for="password_confirmation">Confirm Password</label>
                            <div class="input-group input-mini input-lg">
                                <input type="password" id="password_confirmation" class="form-control dz-password" name="password_confirmation">
                                <span class="input-group-text show-pass">
                                    <i class="icon feather icon-eye-off eye-close"></i>
                                    <i class="icon feather icon-eye eye-open"></i>
                                </span>
                            </div>
                            @error('password_confirmation')
                                <div class="alert alert-danger alert-dismissible alert-alt fade show" style="margin-top: 10px; margin-bottom: 10px;">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"><span><i class="icon feather icon-x"></i></span>
                                    </button>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-4">
                        <label class="form-label" >Intolerances</label>

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
                        <label class="form-label" >Chronic Diseases</label>

                            <div class="input-group input-mini input-lg">
                                <select class="form-control select2" name="chronic_diseases[]" multiple>
                                    <option value=""></option>
                                    @foreach(App\Enums\ChronicDiseasesEnum::getValues() as $diseases)
                                        <option value="{{ $diseases }}">{{ App\Enums\ChronicDiseasesEnum::getDescription($diseases) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-4">
    <label class="form-label">Halal</label>
    <div class="form-check form-switch">
        <input class="form-check-input" id="flexSwitchCheckDefault" name="ethical_meal_considerations" type="checkbox" value="1">
        <label class="form-check-label" for="flexSwitchCheckDefault"></label>
    </div>
</div>


                        </div>


						<button type="submit"  class="btn btn-thin btn-lg w-100 btn-primary rounded-xl">Sign up</button>
					</form>
					<div class="text-center">
						<p class="form-text">By tapping “Sign Up” you accept our <a href="javascript:void(0);" class="link">terms</a> and <a href="javascript:void(0);" class="link">condition</a></p>
					</div>
                    <div class="text-center account-footer">
						<p class="text-light">Already have an account?</p>
						<a href="{{ url('login') }}" class="btn btn-secondary btn-lg btn-thin rounded-xl w-100">LOGIN TO YOUR ACCOUNT</a>
					</div>
				</div>
			</div>
        </div>
	</main>
	<!-- Main Content End  -->

    @include('layout.script')