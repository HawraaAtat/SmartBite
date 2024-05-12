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
    <header class="header header-fixed transparent">
        <div class="header-content">
            <div class="left-content">
                <a href="javascript:void(0);" class="back-btn">
                    <i class="feather icon-arrow-left"></i>
                </a>
            </div>
            <div class="mid-content">
                <h4 class="title">Details</h4>
            </div>
            <div class="right-content d-flex align-items-center gap-4">
                <a class="item-bookmark style-3">
                    @php
                    $isFavorite = Auth::user()->favorites->contains('recipe_id', $recipe['id']);
                    $favorite = Auth::user()->favorites->where('recipe_id', $recipe['id'])->first();
                    @endphp
                    <i class="heart-icon fa fa-heart{{ $isFavorite ? ' active' : '' }}" style="color: {{ $isFavorite ? 'red' : 'white' }};" data-recipe-id="{{ $recipe['id'] }}" data-calories="{{ $calories }}"></i>
                </a>
            </div>
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
                                    this.style.color = 'white';
                                }
                            })
                            .catch(error => console.error('Error:', error));
                        } else {
                            const calories = this.getAttribute('data-calories'); // Retrieve calories attribute value
                            fetch(`/favorites`, {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': token
                                },
                                body: JSON.stringify({
                                    recipe_id: recipeId,
                                    calories: calories // Pass the retrieved calories value
                                })
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
            </a>
        </div>
</div>
</header>
<!-- Header -->

<!-- Main Content Start -->
<main class="page-content p-b80">
    <div class="container p-0">
        <div class="dz-product-preview bg-primary">
            <div class="swiper product-detail-swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="dz-media">
                            <img src="{{ $recipe['image'] }}" alt="">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="dz-media">
                            <img src="{{ $recipe['image']  }}" alt="">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="dz-media">
                            <img src="{{ $recipe['image']  }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="dz-product-detail">
            <div class="dz-handle"> </div>
            <div class="detail-content">
                <h4 class="title">{{$recipe['title'] }}</h4>
                <p> <strong>Serving Size:</strong> {{$recipe['servings'] }} </p>
                <p> <strong>Calories Per Serving:</strong> {{ $calories }} </p>
            </div>
            <div class="dz-item-rating">{{$recipe['readyInMinutes'] }}'</div>
            <div class="item-wrapper">

                <div class="description">
                    <h6>Ingredients</h6>
                    <ul>
                        @foreach($recipe['extendedIngredients'] as $ingredient)
                        <li>
                            <p>{{ $ingredient['original'] }}</p>
                        </li>
                    </ul>
                    @endforeach
                    <h6>Steps</h6>
                    @foreach($recipe['analyzedInstructions'] as $instruction)
                    <strong>{{ $instruction['name'] }}</strong>
                    @foreach($instruction['steps'] as $step)
                    <p><strong>{{ $step['number'] }}. </strong> {{ $step['step'] }}</p>
                    @endforeach
                    @endforeach

                    <!--
						<h6>Ingredients</h6>
					<p style="margin-top: 0; margin-left: 0;">{!! nl2br($recipe['instructions']) !!}</p> -->
                    <button class="btn btn-thin btn-lg w-100 btn-primary rounded-xl book-icon" data-recipe-id="{{ $recipe['id'] }}" data-calories="{{ $recipe['nutrition']['nutrients'][0]['amount'] ?? 0 }}">I Just Cooked This!</button>

                    <script>
                        document.querySelectorAll('.book-icon').forEach(icon => {
                            icon.addEventListener('click', function() {
                                const recipeId = this.getAttribute('data-recipe-id');
                                const userId = '{{ auth()->id() }}'; // Get the authenticated user's ID
                                const token = '{{ csrf_token() }}';
                                const calories = this.getAttribute('data-calories'); // Get the calories from the data attribute

                                fetch(`/meal-history`, {
                                        method: 'POST'
                                        , headers: {
                                            'Content-Type': 'application/json'
                                            , 'X-CSRF-TOKEN': token
                                        }
                                        , body: JSON.stringify({
                                            recipe_id: recipeId
                                            , calories: {{$calories}} // Pass the calories value in the request body
                                        })
                                    })
                                    .then(response => {
                                        if (response.ok) {
                                            const alertDiv = document.createElement('div');
                                            alertDiv.className = 'alert alert-primary alert-dismissible fade show fixed-bottom';
                                            alertDiv.innerHTML = `
                                                <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2">
                                                    <path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"></path>
                                                </svg>
                                                <strong>Well done chef! You've just added another masterpiece to your Smart Bite repertoire!</strong>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                                                    <span><i class="icon feather icon-x"></i></span>
                                                </button>
                                            `;
                                            document.body.appendChild(alertDiv);

                                            // Auto-dismiss the alert after 3 seconds
                                            setTimeout(() => {
                                                alertDiv.classList.add('show');
                                                setTimeout(() => {
                                                    alertDiv.remove();
                                                }, 5000);
                                            }, 3000);
                                        } else {
                                            alert('Failed to store meal history');
                                        }
                                    })
                                    .catch(error => console.error('Error:', error));
                            });
                        });

                    </script>
                </div>
            </div>
        </div>
</main>
<!-- Main Content End -->


</div>
@include('layout.script')
<script src="{{ asset('assets/vendor/nouislider/nouislider.min.js') }}"></script>
<script src="{{ asset('assets/vendor/wnumb/wNumb.js') }}"></script>
<script src="{{ asset('assets/js/noui-slider.init.js') }}"></script>
</body>
</html>
