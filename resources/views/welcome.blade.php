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

    <!-- Welcome Start -->
    <main class="page-content">
        <div class="container py-0">
            <div class="welcome-area row">
                <div class="welcome-inner-2 col"
                    style="background-color: white; background-size: cover; background-repeat: no-repeat;">
                    <div class="main-wrapper">
                        <div class="bg-shape">
                            <img class="vector-2" src="assets/images/welcome/vector2.svg" alt="">
                        </div>
                        <div class="main-logo">
                            <div class="logo-icon">
                                <img src="assets/logo.png" alt="logo">
                            </div>
                        </div>
                    </div>
                    <div class="dz-button-group"
                        style="display: flex; flex-direction: column; align-items: center; justify-content: flex-start; height: 100%; margin-top: -20px;">
                        <h3 class="title">Welcome</h3>
                        <a href="{{ url('login') }}" class="btn btn-primary btn-social btn-thin rounded-xl btn-lg w-100"
                            style="display: flex; align-items: center;"><img src="assets/images/social/inbox.png" alt=""
                                style="margin-right: 10px;"><span>Login With Email</span></a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Welcome End -->

</div>
@include('layout.script')
<script>
    new WOW().init();

    var wow = new WOW(
    {
      boxClass:     'wow',       // animated element css class (default is wow)
      animateClass: 'animated',  // animation css class (default is animated)
      offset:       50,          // distance to the element when triggering the animation (default is 0)
      mobile:       false        // trigger animations on mobile devices (true is default)
    });
    wow.init();
</script>
</body>

</html>
