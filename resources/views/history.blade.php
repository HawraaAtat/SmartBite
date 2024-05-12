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
                                <h6 class="title">
                                    <a href="{{ route('meal-history.show', $recipe['id']) }}">{{ $recipe['title'] }}</a>
                                </h6>
                            </div>
                            <ul class="dz-meta">
                                <li>Calories: {{ $recipe['calories'] }}</li>
                            </ul>
                            <ul class="dz-meta">
                                <li>Date: {{ $recipe['updated_at']->format('d-m-Y') }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </main>

    <!-- Main Content End -->
    @include('layout.menu-bar')
</div>
@include('layout.script')
</body>

</html>