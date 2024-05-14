@include('layout.header')
<style>
    .column {
        float: left;
        width: 33.33%;
    }

    /* Clear floats after the columns */
    .row:after {
        content: "";
        display: table;
        clear: both;
    }
</style>
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
                                <input type="text" id="first_name" class="form-control" name="first_name"
                                    value="{{$user->first_name }}">
                                @error('first_name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Last Name -->
                        <div class="mb-4">
                            <label class="form-label" for="last_name">Last Name</label>
                            <div class="input-group input-mini input-lg">
                                <input type="text" id="last_name" class="form-control" name="last_name"
                                    value="{{$user->last_name }}">
                                @error('last_name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        {{--
                        <!-- Date of Birth -->
                        <div class="mb-4">
                            <label class="form-label" for="dob">Date Of Birth</label>
                            <div class="input-group input-mini input-lg">
                                <input type="date" id="dob" class="form-control datepicker" name="date_of_birth"
                                    value="{{ $user->date_of_birth }}">
                                @error('date_of_birth')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div> --}}

                        <!-- Email -->
                        <div class="mb-4">
                            <label class="form-label" for="email">Email</label>
                            <div class="input-group input-mini input-lg">
                                <input type="email" id="email" class="form-control" name="email"
                                    value="{{$user->email }}">
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label class="form-label">Intolerances</label>
                            <div class="accordion accordion-primary" id="accordion-two">
                                <div class="accordion-item">
                                    <div class="accordion-header collapsed" id="headingIntolerances" data-bs-toggle="collapse" data-bs-target="#collapseIntolerances" aria-expanded="false" aria-controls="collapseIntolerances" role="button">
                                        <span class="accordion-header-icon"></span>
                                        <span class="accordion-header-text">Any food intolerances?</span>
                                        <span class="accordion-header-indicator"></span>
                                    </div>
                                    <div id="collapseIntolerances" class="accordion-collapse collapse" aria-labelledby="headingIntolerances" data-bs-parent="#accordion-two">
                                        <div class="accordion-body-text">
                                            <div class="mb-4">
                                                <label class="form-label">Intolerances</label>
                                                <div class="row">
                                                    <div class="column">
                                                        <div class="radio square-radio">
                                                            @php $intolerances = App\Enums\AllergensEnum::getValues(); $totalIntolerances = count($intolerances); $columnIntolerances = ceil($totalIntolerances / 3); @endphp
                                                            @foreach($intolerances as $index => $allergen)
                                                            @if($index < $columnIntolerances)
                                                            <label class="radio-label">{{ $allergen }}
                                                                <input type="checkbox" name="allergies[]" value="{{ $allergen }}" {{ in_array($allergen, $user->allergies) ? 'checked' : '' }}>
                                                                <span class="checkmark"></span>
                                                            </label>
                                                            @endif
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div class="column">
                                                        <div class="radio square-radio">
                                                            @foreach($intolerances as $index => $allergen)
                                                            @if($index >= $columnIntolerances && $index < ($columnIntolerances * 2))
                                                            <label class="radio-label">{{ $allergen }}
                                                                <input type="checkbox" name="allergies[]" value="{{ $allergen }}" {{ in_array($allergen, $user->allergies) ? 'checked' : '' }}>
                                                                <span class="checkmark"></span>
                                                            </label>
                                                            @endif
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div class="column">
                                                        <div class="radio square-radio">
                                                            @foreach($intolerances as $index => $allergen)
                                                            @if($index >= ($columnIntolerances * 2))
                                                            <label class="radio-label">{{ $allergen }}
                                                                <input type="checkbox" name="allergies[]" value="{{ $allergen }}" {{ in_array($allergen, $user->allergies) ? 'checked' : '' }}>
                                                                <span class="checkmark"></span>
                                                            </label>
                                                            @endif
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label class="form-label">Chronic Diseases</label>
                            <div class="accordion accordion-primary" id="accordion-two">
                                <div class="accordion-item">
                                    <div class="accordion-header collapsed" id="headingDiseases" data-bs-toggle="collapse" data-bs-target="#collapseDiseases" aria-expanded="false" aria-controls="collapseDiseases" role="button">
                                        <span class="accordion-header-icon"></span>
                                        <span class="accordion-header-text">Any chronic conditions?</span>
                                        <span class="accordion-header-indicator"></span>
                                    </div>
                                    <div id="collapseDiseases" class="accordion-collapse collapse" aria-labelledby="headingDiseases" data-bs-parent="#accordion-two">
                                        <div class="accordion-body-text">
                                            <div class="mb-4">
                                                <label class="form-label">Chronic Diseases</label>
                                                <div class="row">
                                                    <div class="column">
                                                        <div class="radio square-radio">
                                                            @php $diseases = App\Enums\ChronicDiseasesEnum::getValues(); $totalDiseases = count($diseases); $columnDiseases = ceil($totalDiseases / 3); @endphp
                                                            @foreach($diseases as $index => $disease)
                                                            @if($index < $columnDiseases)
                                                            <label class="radio-label">{{ App\Enums\ChronicDiseasesEnum::getDescription($disease) }}
                                                                <input type="checkbox" name="chronic_diseases[]" value="{{ $disease }}" {{ in_array($disease, $user->chronic_diseases) ? 'checked' : '' }}>
                                                                <span class="checkmark"></span>
                                                            </label>
                                                            @endif
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div class="column">
                                                        <div class="radio square-radio">
                                                            @foreach($diseases as $index => $disease)
                                                            @if($index >= $columnDiseases && $index < ($columnDiseases * 2))
                                                            <label class="radio-label">{{ App\Enums\ChronicDiseasesEnum::getDescription($disease) }}
                                                                <input type="checkbox" name="chronic_diseases[]" value="{{ $disease }}" {{ in_array($disease, $user->chronic_diseases) ? 'checked' : '' }}>
                                                                <span class="checkmark"></span>
                                                            </label>
                                                            @endif
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div class="column">
                                                        <div class="radio square-radio">
                                                            @foreach($diseases as $index => $disease)
                                                            @if($index >= ($columnDiseases * 2))
                                                            <label class="radio-label">{{ App\Enums\ChronicDiseasesEnum::getDescription($disease) }}
                                                                <input type="checkbox" name="chronic_diseases[]" value="{{ $disease }}" {{ in_array($disease, $user->chronic_diseases) ? 'checked' : '' }}>
                                                                <span class="checkmark"></span>
                                                            </label>
                                                            @endif
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Halal</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" id="flexSwitchCheckDefault"
                                    name="ethical_meal_considerations" type="checkbox" value="1" {{
                                    $user->ethical_meal_considerations == 1 ? 'checked' : '' }}>
                                <label class="form-check-label" for="flexSwitchCheckDefault">Yes</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-thin btn-lg w-100 btn-primary rounded-xl">Update</button>
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
