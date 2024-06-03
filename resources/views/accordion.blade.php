@include('layout.header')

<body>
<div class="page-wrapper">
    

	<div id="preloader">
		<div class="loader">
			<div class="spinner-border text-primary" role="status">
				<span class="visually-hidden">Loading...</span>
			</div>
		</div>
	</div>

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
	
	<div class="page-content space-top">
		<div class="container">
			<div class="card dz-card-box style-1" style="background-image: url('assets/images/bg-shape.png');">				
			</div>
			
			<div class="row" id="contentArea">
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
            <div class="card-body row g-3">
            <div class="col-6">
            <div class="dz-stepper border-1">
                <small>Choose how much recipe you want:</small>
                <input class="stepper" type="text" value="0" name="demo3">
            </div></div></div>
            <div id="stepper-alert-container"></div>
            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-bs-parent="#accordion-one">
                <div class="accordion-body">
                    <form id="ingredientForm">
                        <div class="mb-3">
                            <label for="ingredient" class="form-label">Add Ingredient:</label>
                            <div class="input-group">
                                <input type="text" id="ingredient" name="ingredient" class="form-control">
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </div>
                    </form>
                    <div id="submitIngredientsBtn-alert-container"></div>
                    <ul id="ingredientList" class="list-group"></ul>
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
                    <div class="mb-3">
                        <label for="ingredientInfo" class="form-label">Enter Ingredient:</label>
                        <input type="text" id="ingredientInfo" name="ingredientInfo" class="form-control">
                    </div>
                    <div id="getIngredientInfoBtn-alert-container"></div>
                    
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
            <div class="mb-3">
                <label for="compute" class="form-label">Enter Ingredient:</label>
                <input type="text" id="compute" name="compute" class="form-control">
            </div>
            <div id="computeIngredientAmountBtn-alert-container"></div>
            <div class="mb-3">
                <label for="measureUnit" class="form-label">Select Target Nutrient:</label>
                <select id="measureUnit" name="measureUnit" class="form-select">
                <option value="">choose nutrient</option>
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
            <div id="choose-alert-container"></div>
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
            <div class="mb-3">
                <label for="ingredientName" class="form-label">Enter Ingredient Name:</label>
                <input type="text" id="ingredientName" name="ingredientName" class="form-control">
            </div>
            <div id="getIngredientSubstitutesBtn-alert-container"></div>
            <button id="getIngredientSubstitutesBtn" class="btn btn-primary mt-3">Submit Ingredient</button>
        </div>
    </div>
</div>


							</div>
						</div>	
					</div>	
				</div>	
			</div>
		</div>
	</div>
</div> 
<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

   


            var ingredients = [];
            $('#ingredientForm').submit(function(event) {
                event.preventDefault(); 
                addIngredient();
            });
            function addIngredient() {
                var ingredient = $('#ingredient').val().trim();
                if (ingredient === "") {
                    return; 
                }
                ingredients.push(ingredient);
                var list = $('#ingredientList');
                var listItem = $('<li>').addClass('list-group-item').text(ingredient);
                list.append(listItem);
                $('#ingredient').val(""); 
            }

            $('#submitIngredientsBtn').click(function() {
                if (ingredients.length === 0) {
                    const alertDiv = document.createElement('div');
                    alertDiv.className = 'alert alert-danger alert-dismissible fade show';
                    alertDiv.role = 'alert';
                    
                    alertDiv.innerHTML = `
                        <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2">
                            <polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon>
                            <line x1="15" y1="9" x2="9" y2="15"></line>
                            <line x1="9" y1="9" x2="15" y2="15"></line>
                        </svg>
                        <strong>Error!</strong> Please add at least one ingredient.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <span><i class="icon feather icon-x"></i></span>
                        </button>
                    `;

                    document.getElementById('submitIngredientsBtn-alert-container').appendChild(alertDiv);
                    return;
                }

        var numberOfRecipes = $('.stepper').val();
        if (numberOfRecipes<1){
            const alertDiv = document.createElement('div');
                    alertDiv.className = 'alert alert-danger alert-dismissible fade show';
                    alertDiv.role = 'alert';
                    
                    alertDiv.innerHTML = `
                        <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2">
                            <polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon>
                            <line x1="15" y1="9" x2="9" y2="15"></line>
                            <line x1="9" y1="9" x2="15" y2="15"></line>
                        </svg>
                        <strong>Error!</strong> The number must be at least 1.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <span><i class="icon feather icon-x"></i></span>
                        </button>
                    `;

                    document.getElementById('stepper-alert-container').appendChild(alertDiv);
                    return;
        }


				$.ajax({
        type: "GET",
        url: "/searchbyingredients",
        data: { ingredients: ingredients, number: numberOfRecipes },
        success: function(response) {
            console.log(response);
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


$('#getIngredientInfoBtn').click(function() {
    var ingredientInfo = $('#ingredientInfo').val().trim();
    if (ingredientInfo === "") {
        const alertDiv = document.createElement('div');
                    alertDiv.className = 'alert alert-danger alert-dismissible fade show';
                    alertDiv.role = 'alert';
                    
                    alertDiv.innerHTML = `
                        <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2">
                            <polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon>
                            <line x1="15" y1="9" x2="9" y2="15"></line>
                            <line x1="9" y1="9" x2="15" y2="15"></line>
                        </svg>
                        <strong>Error!</strong> Please enter an ingredient.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <span><i class="icon feather icon-x"></i></span>
                        </button>
                    `;

                    document.getElementById('getIngredientInfoBtn-alert-container').appendChild(alertDiv);
        return;
    }

    $.ajax({
        type: "GET",
        url: "/searchingredientinfo",
        data: { ingredientInfo: ingredientInfo },
        success: function(response) {
            console.log(response);
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
    var measureUnit = $('#measureUnit').val(); 
    if (ingredientInfo === "") {
        const alertDiv = document.createElement('div');
                    alertDiv.className = 'alert alert-danger alert-dismissible fade show';
                    alertDiv.role = 'alert';
                    
                    alertDiv.innerHTML = `
                        <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2">
                            <polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon>
                            <line x1="15" y1="9" x2="9" y2="15"></line>
                            <line x1="9" y1="9" x2="15" y2="15"></line>
                        </svg>
                        <strong>Error!</strong> Please enter an ingredient.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <span><i class="icon feather icon-x"></i></span>
                        </button>
                    `;

                    document.getElementById('computeIngredientAmountBtn-alert-container').appendChild(alertDiv);
        return;
    }
    if (measureUnit === "") {
        const alertDiv = document.createElement('div');
                    alertDiv.className = 'alert alert-danger alert-dismissible fade show';
                    alertDiv.role = 'alert';
                    
                    alertDiv.innerHTML = `
                        <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2">
                            <polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon>
                            <line x1="15" y1="9" x2="9" y2="15"></line>
                            <line x1="9" y1="9" x2="15" y2="15"></line>
                        </svg>
                        <strong>Error!</strong> Please choose one nutrient.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <span><i class="icon feather icon-x"></i></span>
                        </button>
                    `;

                    document.getElementById('computeIngredientAmountBtn-alert-container').appendChild(alertDiv);
        return;
    }


    $.ajax({
        type: "GET",
        url: "/computeingredientamount",
        data: { ingredientInfo: ingredientInfo, measureUnit: measureUnit }, 
        success: function(response) {
            console.log(response);
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
        const alertDiv = document.createElement('div');
                    alertDiv.className = 'alert alert-danger alert-dismissible fade show';
                    alertDiv.role = 'alert';
                    
                    alertDiv.innerHTML = `
                        <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2">
                            <polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon>
                            <line x1="15" y1="9" x2="9" y2="15"></line>
                            <line x1="9" y1="9" x2="15" y2="15"></line>
                        </svg>
                        <strong>Error!</strong> Please enter an ingredient.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <span><i class="icon feather icon-x"></i></span>
                        </button>
                    `;

                    document.getElementById('getIngredientSubstitutesBtn-alert-container').appendChild(alertDiv);
        return;
    }
$.ajax({
    type: "GET",
    url: "/getingredientsubstitutes",
    data: { ingredientName: ingredientName },
    success: function(response) {
        console.log(response);
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
            $('#collapseFour .accordion-body').append('<div class="accordion-body-text">There are no substitutes for ' + response.ingredient + '.</div>');
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
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>
<script src="assets/js/dz.carousel.js"></script>
<script src="assets/js/settings.js"></script>
<script src="assets/js/custom.js"></script>
</body>
</html>