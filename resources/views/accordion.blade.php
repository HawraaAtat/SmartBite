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
<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-bs-parent="#accordion-one">
<div class="accordion-body">


    <!-- Move stepper here and center it -->
    <div class="d-flex flex-column align-items-center my-3">
        <div class="w-100 text-center mb-2">
            <small>Choose how many recipes you want:</small>
        </div>
        <div class="dz-stepper border-1 text-center">
            <input class="stepper" type="text" value="0" name="demo3">
        </div>
    </div>
    <div id="stepper-alert-container"></div>
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
    <ul id="recipe" class="list-group"></ul>



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
function fetchRecipe(id) {
    const apiKey = 'a3bff443ef744c5e83d7d03e08e9e158';
    const url = `https://api.spoonacular.com/recipes/${id}/information?apiKey=${apiKey}`;

    $.ajax({
        url: url,
        method: 'GET',
        success: function(response) {
            const ingredientsList = response.extendedIngredients.map(ingredient => `<li>${ingredient.original}</li>`).join('');
            const stepsList = response.analyzedInstructions.map(instruction => {
                const steps = instruction.steps.map(step => `<p><strong>${step.number}. </strong>${step.step}</p>`).join('');
                return `<strong>${instruction.name}</strong>${steps}`;
            }).join('');

            const recipeDiv = `
                <div class="chat-box-area" id="chat-box">
                    <div class="chat-content bot">
                        <div class="message-item">
                            <div class="media align-items-center gap-2">
                                <div class="bubble1">
                                    <h3>${response.title}</h3>
                                    <div class="recipe-image">
                                        <img src="${response.image}" alt="${response.title}">
                                    </div>
                                    <div class="recipe-details">
                                        <div class="detail-content">
                                            <p><strong>Serving Size:</strong> ${response.servings}</p>
                                            <p><strong>Calories Per Serving:</strong> ${response.calories}</p>
                                            <p><strong>Ready in:</strong> ${response.readyInMinutes} minutes</p>
                                        </div>
                                        <div class="description">
                                            <h6>Ingredients</h6>
                                            <ul>${ingredientsList}</ul>
                                            <h6>Steps</h6>
                                            ${stepsList}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `;

            $('#recipe').append(recipeDiv);

            $('html, body').animate({ scrollTop: $(document).height() }, 'slow');
        },
        error: function(error) {
            console.log('Error fetching recipe:', error);
        }
    });
}


   $(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var ingredients = [];

    // Function to clear alerts
    function clearAlerts(containerId) {
        $('#' + containerId).empty();
    }

    // Function to display alert
    function showAlert(containerId, message, type) {
        const alertDiv = document.createElement('div');
        alertDiv.className = `alert alert-${type} alert-dismissible fade show`;
        alertDiv.role = 'alert';
        alertDiv.innerHTML = `
            <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2">
                <polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon>
                <line x1="15" y1="9" x2="9" y2="15"></line>
                <line x1="9" y1="9" x2="15" y2="15"></line>
            </svg>
            <strong>${type === 'danger' ? 'Error' : 'Success'}!</strong> ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span><i class="icon feather icon-x"></i></span>
            </button>
        `;
        document.getElementById(containerId).appendChild(alertDiv);
    }

    $('#ingredientForm').submit(function(event) {
        event.preventDefault();
        addIngredient();
    });

    function addIngredient() {
        var ingredient = $('#ingredient').val().trim();
        if (ingredient === "") {
            showAlert('submitIngredientsBtn-alert-container', 'Please add an ingredient.', 'danger');
            return;
        }
        ingredients.push(ingredient);
        updateIngredientList();
        $('#ingredient').val(""); // Clear the input field after adding the ingredient
    }

    function updateIngredientList() {
        var list = $('#ingredientList');
        list.empty();
        ingredients.forEach(function(item, index) {
            var listItem = $('<li>').addClass('list-group-item d-flex justify-content-between align-items-center').text(item);
            var deleteButton = $('<button>').addClass('btn btn-danger btn-sm').text('Delete').click(function() {
                removeIngredient(index);
            });
            listItem.append(deleteButton);
            list.append(listItem);
        });
    }

    function removeIngredient(index) {
        ingredients.splice(index, 1);
        updateIngredientList();
    }

    $('#submitIngredientsBtn').click(function() {
        var recipe = $('#recipe');
        recipe.empty();
        clearAlerts('submitIngredientsBtn-alert-container'); // Clear previous alerts

        if (ingredients.length === 0) {
            showAlert('submitIngredientsBtn-alert-container', 'Please add at least one ingredient.', 'danger');
            return;
        }

        var numberOfRecipes = $('.stepper').val();
        if (numberOfRecipes < 1) {
            showAlert('stepper-alert-container', 'The number must be at least 1.', 'danger');
            return;
        }

        $.ajax({
            type: "GET",
            url: "/searchbyingredients",
            data: { ingredients: ingredients, number: numberOfRecipes },
            success: function(response) {
                console.log(response);
                $('#collapseOne .accordion-body-text').remove(); // Clear previous recipes

                if (response.recipes.length > 0) {
                    var recipesHtml = '<div class="accordion-body-text"><div>Here are some options:</div>';
                    $.each(response.recipes, function(index, recipe) {
                        recipesHtml += `<div>
                                            <div>${index + 1}. ${recipe.title}</div>
                                            <br>
                                            <img src="${recipe.image}" alt="${recipe.title}" style="max-width: 100px;">
                                        </div>
                                        <button onclick="fetchRecipe(${recipe.id})" class="recipe-button" data-recipe-id="${recipe.id}" style="margin-top: 10px; padding: 5px 10px; background: var(--primary); color: #fff; border: none; border-radius: 20px; cursor: pointer; transition: opacity 0.3s ease;" onmouseover="this.style.opacity = '0.8';" onmouseout="this.style.opacity = '1';">
                                            Get Recipe
                                        </button>
                                <br>`;
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

    $('#computeIngredientAmountBtn').click(function() {
        clearAlerts('computeIngredientAmountBtn-alert-container'); // Clear previous alerts

        var ingredientInfo = $('#compute').val().trim();
        var measureUnit = $('#measureUnit').val();
        if (ingredientInfo === "") {
            showAlert('computeIngredientAmountBtn-alert-container', 'Please enter an ingredient.', 'danger');
            return;
        }
        if (measureUnit === "") {
            showAlert('computeIngredientAmountBtn-alert-container', 'Please choose one nutrient.', 'danger');
            return;
        }

        $.ajax({
            type: "GET",
            url: "/computeingredientamount",
            data: { ingredientInfo: ingredientInfo, measureUnit: measureUnit },
            success: function(response) {
                console.log(response);
                $('#collapseThree .accordion-body-text').remove(); // Clear previous results

                if (response.amount) {
                    $('#collapseThree .accordion-body').append(`
                        <div class="accordion-body-text">
                            <div><strong>Amount of ${response.nutrient} in 1 ${response.ingredientName} is:</strong> ${response.amount} ${response.unit}</div>
                        </div>
                    `);
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
        clearAlerts('getIngredientSubstitutesBtn-alert-container'); // Clear previous alerts

        var ingredientName = $('#ingredientName').val().trim();
        if (ingredientName === "") {
            showAlert('getIngredientSubstitutesBtn-alert-container', 'Please enter an ingredient.', 'danger');
            return;
        }

        $.ajax({
            type: "GET",
            url: "/getingredientsubstitutes",
            data: { ingredientName: ingredientName },
            success: function(response) {
                console.log(response);
                $('#collapseFour .accordion-body-text').remove(); // Clear previous results

                if (response.substitutes && response.substitutes.length > 0) {
                    var substitutesList = '<ul>';
                    response.substitutes.forEach(function(substitute) {
                        substitutesList += '<li>' + substitute + '</li>';
                    });
                    substitutesList += '</ul>';
                    $('#collapseFour .accordion-body').append(`
                        <div class="accordion-body-text">
                            <div><strong>Substitutes for ${response.ingredient}:</strong></div>
                            ${substitutesList}
                        </div>
                    `);
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