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
						<h5 class="title mb-0">Favorites</h5>
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
                        <a href=""><img src= "{{ $recipe['image'] }}" alt=""></a>
                    </div>
                    <div class="dz-info">
                        <div class="dz-head">
                            <h6 class="title"><a href="{{ route('favorites.show', $recipe['id']) }}">{{ $recipe['title'] }}</a></h6>
                        </div>
                        <ul class="dz-meta">
                            <li>
                                @php
                                $isFavorite = Auth::user()->favorites->contains('recipe_id', $recipe['id']);
                                $calories = $isFavorite ? Auth::user()->favorites->where('recipe_id', $recipe['id'])->first()->calories : null;
                                @endphp
                                <i class="heart-icon fa fa-heart{{ $isFavorite ? ' active' : '' }}" style="color: {{ $isFavorite ? 'red' : 'black' }};" data-recipe-id="{{ $recipe['id'] }}" data-calories="{{ $calories }}"></i>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</main>
<script>
    document.querySelectorAll('.heart-icon').forEach(icon => {
        icon.addEventListener('click', function() {
            const recipeId = this.getAttribute('data-recipe-id'); // Retrieve favorite ID
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
                        this.style.color = 'black';
                    }
                })
                .catch(error => console.error('Error:', error));
            } else {
                const calories = this.getAttribute('data-calories');
                fetch(`/favorites`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': token
                    },
                    body: JSON.stringify({
                        recipe_id: recipeId,
                        calories: calories
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


	<!-- Main Content End -->

    @include('layout.menu-bar')

</div>
@include('layout.script')
</body>
</html>
