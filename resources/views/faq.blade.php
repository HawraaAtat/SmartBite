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
	<header class="header header-fixed border-bottom">
        <div class="header-content">
            <div class="left-content">
				<a href="javascript:void(0);" class="back-btn">
					<i class="feather icon-arrow-left"></i>
				</a>
			</div>
            <div class="mid-content"><h4 class="title">Questions & Answers</h4></div>
            <div class="right-content">
                <a href="{{ route('spoonchat') }}" class="font-24 d-block lh-1">
                    <i class="fi fi-rr-comment"></i>
                </a>
            </div>
        </div>
    </header>
	<!-- Header -->

	<!-- Main Content Start -->
	<main class="page-content space-top">
        <div class="container">
            <div class="accordion dz-accordion style-2" id="accordionFaq1">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading1">
                        <a href="javascript:void(0);" class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                            What is the Smart Bite project about?
                        </a>
                    </h2>
                    <div id="collapse1" class="accordion-collapse collapse show" aria-labelledby="heading1" data-bs-parent="#accordionFaq1">
                        <div class="accordion-body">
                            <p class="m-b0">The Smart Bite project is a mobile app designed to upgrade lifestyles by helping users find what to eat. It exposes them to tailored, suitable recipes for both mental and physical health based on data extracted from their smartwatch and profile inputs.</p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading2">
                        <a href="javascript:void(0);" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                            How does Smart Bite customize recipes for users?
                        </a>
                    </h2>
                    <div id="collapse2" class="accordion-collapse collapse" aria-labelledby="heading2" data-bs-parent="#accordionFaq1">
                        <div class="accordion-body">
                            <p class="m-b0">Smart Bite customizes recipes by analyzing health data from the user's smartwatch, such as body weight, heartbeat rate, hours of sleep, body temperature, steps, and physical activities. It also considers profile information like chronic diseases, dietary preferences, nutritional needs, health goals, allergies, and ethical and cultural meal considerations.</p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading3">
                        <a href="javascript:void(0);" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                            What advantages does Smart Bite offer?
                        </a>
                    </h2>
                    <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="heading3" data-bs-parent="#accordionFaq1">
                        <div class="accordion-body">
                            <p class="m-b0">Smart Bite offers numerous advantages including nurturing the user's health through personalized recipes, helping people with special dietary needs, facilitating meal planning, integrating real-time health data from smartwatches, and introducing users to a wide range of new recipes.</p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading4">
                        <a href="javascript:void(0);" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                            In which domains can Smart Bite be applied?
                        </a>
                    </h2>
                    <div id="collapse4" class="accordion-collapse collapse" aria-labelledby="heading4" data-bs-parent="#accordionFaq1">
                        <div class="accordion-body">
                            <p class="m-b0">Smart Bite can be applied in health and fitness, nutrition and meal planning, weight management, stress management, culinary education, and time management. It helps users maintain their health, plan meals, manage weight, reduce stress, learn cooking, and save time.</p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading5">
                        <a href="javascript:void(0);" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                            Who are the target users of Smart Bite?
                        </a>
                    </h2>
                    <div id="collapse5" class="accordion-collapse collapse" aria-labelledby="heading5" data-bs-parent="#accordionFaq1">
                        <div class="accordion-body">
                            <p class="m-b0">Smart Bite is designed for health enthusiasts, time-pressed individuals, families, students, food explorers, and anyone looking to improve their physical and mental health through personalized nutrition and convenient meal planning.</p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading6">
                        <a href="javascript:void(0);" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapse6" aria-expanded="false" aria-controls="collapse6">Is coding knowledge required to use Smart Bite?

                        </a>
                    </h2>
                    <div id="collapse6" class="accordion-collapse collapse" aria-labelledby="heading6" data-bs-parent="#accordionFaq1">
                        <div class="accordion-body">
                            <p class="m-b0">Basic knowledge of HTML, CSS, and Bootstrap can be helpful for customizing Smart Bite to your needs. However, it's designed to be user-friendly and doesn't necessarily require extensive coding skills.</p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading7">
                        <a href="javascript:void(0);" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapse7" aria-expanded="false" aria-controls="collapse7">How can I get started with Smart Bite?
                        </a>
                    </h2>
                    <div id="collapse7" class="accordion-collapse collapse" aria-labelledby="heading7" data-bs-parent="#accordionFaq1">
                        <div class="accordion-body">
                            <p class="m-b0">To get started, download the Smart Bite app, connect your smartwatch, and follow the instructions in the app to set up your profile and start receiving personalized recipe recommendations based on your health data and preferences.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</main>
	<!-- Main Content End -->

</div>
<!--**********************************
    Scripts
***********************************-->
<script src="assets/js/jquery.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/settings.js"></script>
<script src="assets/js/custom.js"></script>
</body>
</html>
