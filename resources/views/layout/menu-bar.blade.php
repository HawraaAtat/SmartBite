<!-- Menubar -->
<div class="menubar-area footer-fixed">
    <div class="toolbar-inner menubar-nav">
        <a href="{{ route('dashboard') }}" class="nav-link{{ Request::route()->getName() == 'dashboard' ? ' active' : '' }}">
            <i class="fi fi-rr-home"></i>
        </a>
        <a href="{{ route('favorites.index') }}" class="nav-link{{ Request::route()->getName() == 'favorites.index' ? ' active' : '' }}">
            <i class="fi fi-rr-heart"></i>
        </a>
        <a href="{{ route('meal-history.index') }}" class="nav-link{{ Request::route()->getName() == 'meal-history.index' ? ' active' : '' }}">
            <i class="fi fi-rr-document"></i>
        </a>
        <a href="{{ route('profile') }}" class="nav-link{{ Request::route()->getName() == 'profile' ? ' active' : '' }}">
            <i class="fi fi-rr-user"></i>
        </a>
    </div>
</div>
<!-- Menubar -->
*9
