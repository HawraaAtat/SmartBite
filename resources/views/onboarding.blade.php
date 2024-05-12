@include('layout.header')
<div class="page-wrapper">

    <!-- splash -->
    <div class="loader-screen" id="splashscreen">
        <img src="assets/images/preloader/circle1.png" class="circle-1" alt="">
        <img src="assets/images/preloader/circle2.png" class="circle-2" alt="">
        <div class="main-screen">
            <div class="loader">
                <img src="{{ asset('assets/logo.png') }}" class="wow zoomInDown" style="width: 25em; height: 25em;"
                    alt="">
            </div>

        </div>
        <p class="version wow bounceIn" data-wow-duration="0.5s" data-wow-delay="1s">Version 1.0</p>
    </div>
    <!-- splash-->

    <!-- Welcome Start -->
    <main class="page-content">
        <div class="container p-0">
            <div class="welcome-area">
                <div class="bg-shape">
                    <img class="vector-1" src="assets/images/welcome/vector1.svg" alt="">
                    <img class="vector-2" src="assets/images/welcome/vector2.svg" alt="">
                </div>
                <div class="welcome-inner fixed-wrapper">
                    <div class="swiper get-started">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="slide-info">
                                    <div class="dz-media">
                                        <img src="assets/images/svg/onboarding1.svg" alt="">
                                    </div>
                                    <div class="slide-content">
                                        <h3 class="dz-title" data-swiper-parallax="-300">Welcome to Smart Bite!</h3>
                                        <p data-swiper-parallax="-100">Let's cook up something delicious together.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="slide-info">
                                    <div class="dz-media">
                                        <img src="assets/images/svg/onboarding2.svg" alt="">
                                    </div>
                                    <div class="slide-content">
                                        <h3 class="dz-title" data-swiper-parallax="-300">Cook With Confidence!</h3>
                                        <p data-swiper-parallax="-100">Connect your smartwatch to unlock a world of
                                            vibrant recipes tailored to your health metrics, mood, and activity.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="slide-info">
                                    <div class="dz-media">
                                        <img src="assets/images/svg/onboarding3.svg" alt="">
                                    </div>
                                    <div class="slide-content">
                                        <h3 class="dz-title" data-swiper-parallax="-300">Culinary Joy Awaits!</h3>
                                        <p data-swiper-parallax="-100">Let's dive into a culinary adventure that
                                            promises to tantalize your taste buds.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-btn">
                            <div class="swiper-pagination style-1 flex-1"></div>
                        </div>
                    </div>
                </div>
                <div class="bottom-btn">
                    <a href="{{ url('welcome') }}"
                        class="btn btn-thin rounded-xl text-uppercase btn-lg w-100 btn-primary">Get Started</a>
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
<script src="{{ asset('/sw.js') }}"></script>
<script>
    if ("serviceWorker" in navigator) {
      // Register a service worker hosted at the root of the
      // site using the default scope.
      navigator.serviceWorker.register("/sw.js").then(
      (registration) => {
         console.log("Service worker registration succeeded:", registration);
      },
      (error) => {
         console.error(`Service worker registration failed: ${error}`);
      },
    );
  } else {
     console.error("Service workers are not supported.");
  }
</script>

</html>
