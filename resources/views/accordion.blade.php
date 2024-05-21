@include('layout.header')

<body>
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
				<h4 class="title">Smart Recipe Assistant</h4>
			</div>
			<div class="right-content"></div>
		</div>
	</header>
	<!-- Header -->
	
	<!-- Page Content Start -->
	<div class="page-content space-top">
		<div class="container">
			<div class="card dz-card-box style-1" style="background-image: url('assets/images/bg-shape.png');">				
			</div>
			
			<div class="row" id="contentArea">
				<!-- Accordion - 1 -->
				<div class="col-12">
					<div class="card">
						<div class="card-header">
						</div>	
						<div class="card-body">
    <div class="accordion accordion-primary" id="accordion-one">
        <div class="accordion-item">
            <div class="accordion-header" id="headingOne" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-controls="collapseOne" aria-expanded="true" role="button">
                <span class="accordion-header-icon"></span>
                <span class="accordion-header-text">Search Recipes by Ingredients</span>
                <span class="accordion-header-indicator"></span>
            </div>
            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-bs-parent="#accordion-one">
                <div class="accordion-body">
                    <!-- Form to add ingredients -->
                    <form id="ingredientForm">
                        <div class="mb-3">
                            <label for="ingredient" class="form-label">Add Ingredient:</label>
                            <div class="input-group">
                                <input type="text" id="ingredient" name="ingredient" class="form-control">
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </div>
                    </form>
                    <!-- Ingredient List -->
                    <ul id="ingredientList" class="list-group"></ul>
                    <!-- Submit Button -->
                    <button id="submitIngredientsBtn" class="btn btn-primary mt-3">Submit Ingredients</button>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <div class="accordion-header collapsed" id="headingTwo" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-controls="collapseTwo" role="button" aria-expanded="true">
                <span class="accordion-header-text">Get Ingredient Information</span>
                <span class="accordion-header-indicator"></span>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-bs-parent="#accordion-one">
                <div class="accordion-body">
                    <!-- User input phase without "Add" button -->
                    <div class="mb-3">
                        <label for="ingredientInfo" class="form-label">Enter Ingredient:</label>
                        <input type="text" id="ingredientInfo" name="ingredientInfo" class="form-control">
                    </div>
                    <!-- Get Ingredient Information Button -->
                    <button id="getIngredientInfoBtn" class="btn btn-primary mt-3">Submit Ingredient</button>
                </div>
        </div>
    </div>

	<div class="accordion-item">
    <div class="accordion-header collapsed" id="headingThree" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-controls="collapseThree" role="button" aria-expanded="true">
        <span class="accordion-header-text">Compute Ingredient Amount</span>
        <span class="accordion-header-indicator"></span>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-bs-parent="#accordion-one">
        <div class="accordion-body">
            <!-- User input phase with input field and dropdown list -->
            <div class="mb-3">
                <label for="compute" class="form-label">Enter Ingredient:</label>
                <input type="text" id="compute" name="compute" class="form-control">
            </div>
            <div class="mb-3">
                <label for="measureUnit" class="form-label">Select Target Nutrient:</label>
                <select id="measureUnit" name="measureUnit" class="form-select">
                    <option value="alcohol">Alcohol</option>
                    <option value="sugar_alcohol">Sugar Alcohol</option>
                    <option value="caffeine">Caffeine</option>
                    <option value="lycopene">Lycopene</option>
                    <option value="copper">Copper</option>
                    <option value="energy">Energy</option>
                    <option value="calcium">Calcium</option>
                    <option value="carbohydrates">Carbohydrates</option>
                    <option value="net_carbs">Net Carbs</option>
                    <option value="choline">Choline</option>
                    <option value="cholesterol">Cholesterol</option>
                    <option value="total_fat">Total Fat</option>
                    <option value="fluoride">Fluoride</option>
                    <option value="trans_fat">Trans Fat</option>
                    <option value="saturated_fat">Saturated Fat</option>
                    <option value="monounsaturated_fat">Monounsaturated Fat</option>
                    <option value="polyunsaturated_fat">Polyunsaturated Fat</option>
                    <option value="dietary_fiber">Dietary Fiber</option>
                    <option value="folic_acid">Folic Acid</option>
                    <option value="iodine">Iodine</option>
                    <option value="iron">Iron</option>
                    <option value="magnesium">Magnesium</option>
                    <option value="manganese">Manganese</option>
                    <option value="niacin">Niacin</option>
                    <option value="vitamin_b5">Vitamin B5</option>
                    <option value="phosphorus">Phosphorus</option>
                    <option value="potassium">Potassium</option>
                    <option value="protein">Protein</option>
                    <option value="riboflavin">Riboflavin</option>
                    <option value="selenium">Selenium</option>
                    <option value="sodium">Sodium</option>
                    <option value="thiamin">Thiamin</option>
                    <option value="vitamin_a">Vitamin A</option>
                    <option value="vitamin_b6">Vitamin B6</option>
                    <option value="vitamin_b12">Vitamin B12</option>
                    <option value="vitamin_c">Vitamin C</option>
                    <option value="vitamin_d">Vitamin D</option>
                    <option value="vitamin_e">Vitamin E</option>
                    <option value="vitamin_k">Vitamin K</option>
                    <option value="sugar">Sugar</option>
                    <option value="zinc">Zinc</option>
					</select>
            </div>
            <!-- Compute Ingredient Amount Button -->
            <button id="computeIngredientAmountBtn" class="btn btn-primary mt-3">Submit Ingredient</button>
        </div>
    </div>
</div>

<div class="accordion-item">
    <div class="accordion-header collapsed" id="headingFour" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-controls="collapseFour" role="button" aria-expanded="true">
        <span class="accordion-header-text">Get Ingredient Substitutes</span>
        <span class="accordion-header-indicator"></span>
    </div>
    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-bs-parent="#accordion-one">
        <div class="accordion-body">
            <!-- User input phase with input field -->
            <div class="mb-3">
                <label for="ingredientName" class="form-label">Enter Ingredient Name:</label>
                <input type="text" id="ingredientName" name="ingredientName" class="form-control">
            </div>
            <!-- Get Ingredient Substitutes Button -->
            <button id="getIngredientSubstitutesBtn" class="btn btn-primary mt-3">Submit Ingredient</button>
        </div>
    </div>
</div>


							</div>
						</div>	
					</div>	
				</div>	
				<!-- 
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h5 class="card-title">Accordion Bordered</h5>
						</div>	
						<div class="card-body">
							<div class="accordion accordion-danger-solid" id="accordion-two">
							  <div class="accordion-item">
								<div class="accordion-header " id="accord-2One" data-bs-toggle="collapse" data-bs-target="#collapse2One" aria-controls="collapse2One" aria-expanded="true" role="button">
								  <span class="accordion-header-text">Accordion Header One</span>
								  <span class="accordion-header-indicator"></span>
								</div>
								<div id="collapse2One" class="collapse accordion__body show" aria-labelledby="accord-2One" data-bs-parent="#accordion-two">
								  <div class="accordion-body-text">
									 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
								  </div>
								</div>
							  </div>
							  <div class="accordion-item">
								<div class="accordion-header collapsed" id="accord-2Two" data-bs-toggle="collapse" data-bs-target="#collapse2Two" aria-controls="collapse2Two" aria-expanded="true" role="button">
								  <span class="accordion-header-text">Accordion Header Two</span>
								 <span class="accordion-header-indicator"></span>
								</div>
								<div id="collapse2Two" class="collapse accordion__body" aria-labelledby="accord-2Two" data-bs-parent="#accordion-two">
								  <div class="accordion-body-text">
									 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
								  </div>
								</div>
							  </div>
							  <div class="accordion-item">
								<div class="accordion-header collapsed " id="accord-2Three" data-bs-toggle="collapse" data-bs-target="#collapse2Three" aria-controls="collapse2Three" aria-expanded="true" role="button">
								  <span class="accordion-header-text">Accordion Header Three</span>
								 <span class="accordion-header-indicator"></span>
								</div>
								<div id="collapse2Three" class="collapse accordion__body" aria-labelledby="accord-2Three" data-bs-parent="#accordion-two">
								  <div class="accordion-body-text">
									 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
								  </div>
								</div>
							  </div>
							</div>
						</div>	
					</div>	
				</div>	
				 Accordion - 2
				
				Accordion -
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h5 class="card-title">Accordion Header Background</h5>
						</div>	
						<div class="card-body">
							<div class="accordion accordion-header-bg accordion-bordered" id="accordion-seven">
							  <div class="accordion-item">
								<div class="accordion-header  " id="accord-7One" data-bs-toggle="collapse" data-bs-target="#collapse7One" aria-controls="collapse7One" aria-expanded="true" role="button">
									<span class="accordion-header-icon"></span>
								  <span class="accordion-header-text">Accordion Header One</span>
								  <span class="accordion-header-indicator"></span>
								</div>
								<div id="collapse7One" class="collapse accordion__body show" aria-labelledby="accord-7One" data-bs-parent="#accordion-seven">
								  <div class="accordion-body-text">
									 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
								  </div>
								</div>
							  </div>
							  <div class="accordion-item">
								<div class="accordion-header collapsed " id="accord-7Two" data-bs-toggle="collapse" data-bs-target="#collapse7Two" aria-controls="collapse7Two" aria-expanded="true" role="button">
									<span class="accordion-header-icon"></span>
								  <span class="accordion-header-text">Accordion Header Two</span>
								  <span class="accordion-header-indicator"></span>
								</div>
								<div id="collapse7Two" class="collapse accordion__body" aria-labelledby="accord-7Two" data-bs-parent="#accordion-seven">
								  <div class="accordion-body-text">
									 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
								  </div>
								</div>
							  </div>
							  <div class="accordion-item">
								<div class="accordion-header collapsed " id="accord-7Three" data-bs-toggle="collapse" data-bs-target="#collapse7Three" aria-controls="collapse7Three" aria-expanded="true" role="button">
									<span class="accordion-header-icon"></span>
								  <span class="accordion-header-text">Accordion Header Three</span>
								   <span class="accordion-header-indicator"></span>
								</div>
								<div id="collapse7Three" class="collapse accordion__body" aria-labelledby="accord-7Three" data-bs-parent="#accordion-seven">
								  <div class="accordion-body-text">
									 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
								  </div>
								</div>
							  </div>
							</div>
						</div>	
					</div>	
				</div>	

				 -->
			</div>
		</div>
	</div>
	<!-- Page Content End -->
</div> 
<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            // Set CSRF token for all AJAX requests
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Array to store ingredients
            var ingredients = [];

            // Handle form submission
            $('#ingredientForm').submit(function(event) {
                event.preventDefault(); // Prevent the default form submission
                addIngredient();
            });

            // Function to add ingredient
            function addIngredient() {
                var ingredient = $('#ingredient').val().trim();
                if (ingredient === "") {
                    return; // Don't add empty ingredients
                }
                ingredients.push(ingredient);
                var list = $('#ingredientList');
                var listItem = $('<li>').addClass('list-group-item').text(ingredient);
                list.append(listItem);
                $('#ingredient').val(""); // Clear input after adding
            }

            // Function to get recipes by ingredients
            $('#submitIngredientsBtn').click(function() {
                if (ingredients.length === 0) {
                    alert("Please add at least one ingredient.");
                    return;
                }

				$.ajax({
        type: "GET",
        url: "/searchbyingredients",
        data: { ingredients: ingredients },
        success: function(response) {
            console.log(response);
            // Handle the response data here
            if(response.recipes.length > 0) {
                var recipesHtml = '<div class="accordion-body-text"><div>Here are some options:</div>';
                $.each(response.recipes, function(index, recipe) {
                    recipesHtml += '<div><div>' + (index + 1) + '. ' + recipe.title + '</div><br><img src="' + recipe.image + '" alt="' + recipe.title + '" style="max-width: 100px;"></div><br>';
                });
                recipesHtml += '</div>';
                $('#collapseOne').append(recipesHtml);
            } else {
                $('#collapseOne').append('<div class="accordion-body-text">No recipes found.</div>');
            }
        },
        error: function(xhr, status, error) {
            console.error("Error:", error);
        }
    });
});


// AJAX function to get Ingredient info
$('#getIngredientInfoBtn').click(function() {
    var ingredientInfo = $('#ingredientInfo').val().trim();
    if (ingredientInfo === "") {
        alert("Please enter an ingredient.");
        return;
    }

    $.ajax({
        type: "GET",
        url: "/searchingredientinfo",
        data: { ingredientInfo: ingredientInfo },
        success: function(response) {
            console.log(response);
            // Handle the response data here
            if (response.id) {
                $('#collapseTwo').append('<div class="accordion-body-text">' +
                    '<div><strong>Ingredient ID:</strong> ' + response.id + '</div>' +
                    '<div><strong>Name:</strong> ' + response.name + '</div>' +
                    '<div><strong>Original Name:</strong> ' + response.originalName + '</div>' +
                    '<div><strong>Possible Units:</strong> ' + response.possibleUnits.join(', ') + '</div>' +
                    '<div><strong>Consistency:</strong> ' + response.consistency + '</div>' +
                    '<div><strong>Aisle:</strong> ' + response.aisle + '</div>' +
                    '</div>');
            } else {
                $('#collapseTwo').append('<div class="accordion-body-text">No ingredient information found.</div>');
            }
        },
        error: function(xhr, status, error) {
            console.error("Error:", error);
        }
    });
});
$('#computeIngredientAmountBtn').click(function() {
    var ingredientInfo = $('#compute').val().trim();
    var measureUnit = $('#measureUnit').val(); // Get the selected nutrient
    if (ingredientInfo === "") {
        alert("Please enter an ingredient.");
        return;
    }

    $.ajax({
        type: "GET",
        url: "/computeingredientamount",
        data: { ingredientInfo: ingredientInfo, measureUnit: measureUnit }, // Pass the selected nutrient
        success: function(response) {
            console.log(response);
            // Handle the response data here
            if (response.amount) {
                $('#collapseThree .accordion-body').append('<div class="accordion-body-text">' +
                    '<div><strong>Amount of ' + response.nutrient + ' in 1 ' + response.ingredientName + ' is:</strong> ' + response.amount + ' ' + response.unit + '</div>' +
                    '</div>');
            } else {
                $('#collapseThree .accordion-body').append('<div class="accordion-body-text">No ingredient amount found.</div>');
            }
        },
        error: function(xhr, status, error) {
            console.error("Error:", error);
        }
    });
});

$('#getIngredientSubstitutesBtn').click(function() {
    var ingredientName = $('#ingredientName').val().trim();
    if (ingredientName === "") {
        alert("Please enter an ingredient name.");
        return;
    }

    $.ajax({
        type: "GET",
        url: "/getingredientsubstitutes",
        data: { ingredientName: ingredientName },
        success: function(response) {
            console.log(response);
            // Handle the response data here
            if (response.substitutes && response.substitutes.length > 0) {
                var substitutesList = '<ul>';
                response.substitutes.forEach(function(substitute) {
                    substitutesList += '<li>' + substitute + '</li>';
                });
                substitutesList += '</ul>';
                $('#collapseFour .accordion-body').append('<div class="accordion-body-text">' +
                    '<div><strong>Substitutes for ' + response.ingredient + ':</strong></div>' +
                    substitutesList +
                    '</div>');
            } else {
                $('#collapseFour .accordion-body').append('<div class="accordion-body-text">No substitutes found for ' + response.ingredientName + '.</div>');
            }
        },
        error: function(xhr, status, error) {
            console.error("Error:", error);
        }
    });
});


        });
    </script>
<script src="assets/js/jquery.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script><!-- Swiper -->
<script src="assets/vendor/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script><!-- Swiper -->
<script src="assets/js/dz.carousel.js"></script><!-- Swiper -->
<script src="assets/js/settings.js"></script>
<script src="assets/js/custom.js"></script>
</body>
</html>