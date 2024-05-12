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
    <header class="header header-fixed border-bottom onepage">
        <div class="header-content">
            <div class="left-content">
                <a href="javascript:void(0);" class="back-btn">
                    <i class="feather icon-arrow-left"></i>
                </a>
            </div>
            <div class="mid-content">
                <h4 class="title">Error</h4>
            </div>
            <div class="right-content"></div>
        </div>
    </header>
    <!-- Header -->

    <!-- Page Content Start -->
    <main class="page-content space-top">
        <div class="container fixed-full-area">
            <div class="error-page">
                <div class="icon-bx">
                    <img src="assets/images/error2.svg" alt="">
                </div>
                <div class="clearfix">
                    <h2 class="title text-primary">Sorry</h2>
                    <p>Requested content not found.</p>
                </div>
            </div>
            <div class="error-img">
                <img src="assets/images/error.png" alt="">
            </div>
        </div>
    </main>
    <!-- Page Content End -->
</div>
@include('layout.script')
</body>

</html>