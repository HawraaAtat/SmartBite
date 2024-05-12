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
					<form class="m-b20" action="{{route('update-profile',$user->id)}}" method="POSt">
						@csrf
						<!-- First Name -->
                        <div class="mb-4">
                            <label class="form-label" for="first_name">First Name</label>
                            <div class="input-group input-mini input-lg">
                                <input type="text" id="first_name" class="form-control" name="first_name" value="{{$user->first_name }}">
                                @error('first_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Last Name -->
                        <div class="mb-4">
                            <label class="form-label" for="last_name">Last Name</label>
                            <div class="input-group input-mini input-lg">
                                <input type="text" id="last_name" class="form-control" name="last_name" value="{{$user->last_name }}">
                                @error('last_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        {{-- <!-- Date of Birth -->
                        <div class="mb-4">
                            <label class="form-label" for="dob">Date Of Birth</label>
                            <div class="input-group input-mini input-lg">
                                <input type="date" id="dob" class="form-control datepicker" name="date_of_birth" value="{{ $user->date_of_birth }}">
                                @error('date_of_birth')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div> --}}

                        <!-- Email -->
                        <div class="mb-4">
                            <label class="form-label" for="email">Email</label>
                            <div class="input-group input-mini input-lg">
                                <input type="email" id="email" class="form-control" name="email" value="{{$user->email }}">
                                @error('email')
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

                        <div class="mb-4">
    <label class="form-label">Halal</label>
    <div class="form-check form-switch">
        <input class="form-check-input" id="flexSwitchCheckDefault" name="ethical_meal_considerations" type="checkbox" value="1" {{ $user->ethical_meal_considerations == 1 ? 'checked' : '' }}>
        <label class="form-check-label" for="flexSwitchCheckDefault">Yes</label>
    </div>
</div>
						<button type="submit"  class="btn btn-thin btn-lg w-100 btn-primary rounded-xl">Update</button>
					</form>
				</div>
			</div>
        </div>
	</main>
	<!-- Main Content End  -->


</div>
@include('layout.script')
</body>
</html>
