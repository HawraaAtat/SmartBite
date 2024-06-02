<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .bubble1 {
            padding: 15px 18px;
            background: var(--secondary);
            border-radius: 20px 20px 20px 2px;
            color: #000;
            align-items: center;
            margin-bottom: 5px;
            font-size: 14px;
            font-weight: 400;
            max-width: 260px;
            min-width: 90px; 
        }
        .bubble {
            padding: 15px 18px;
            background: #f1f1f1;
            border-radius: 20px 20px 20px 2px;
            color: #000;
            align-items: center;
            margin-bottom: 5px;
            font-size: 14px;
            font-weight: 400;
            max-width: 260px;
            min-width: 90px;
        }
        .recipe-button {
            margin-top: 10px;
            padding: 5px 10px;
            background: var(--primary);
            color: #fff;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            transition: opacity 0.3s ease;

        }
        .recipe-button:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>

    <div class="chat-box-area" id="chat-box">
        <div class="chat-content bot">
            <div class="message-item">
                <div class="media align-items-end gap-2">
                    <div>
                        @if($menuItems === null || empty($menuItems))
                        <div class="bubble">
                            <div>System: It seems like your message got cut off. Did you want to ask or say something? Feel free to continue!</div>
                            <div class="message-time" id="current-time1"></div>
                        </div>
                        @else
                        <div class="bubble">Here are some options:</div>
                        <div class="bubble1">
                            @php $counter = 1; @endphp
                            @foreach ($menuItems as $item)
                            <div>
                                <div>{{ $counter }}. {{ $item['title'] }}</div>
                                <br>
                                <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}" style="max-width: 100px;">
                                <button onclick="fetchRecipe({{ $item['id'] }})" class="recipe-button" data-recipe-id="{{ $item['id'] }}">
                                    Get Recipe
                                </button>
                                <br>
                                <br>
                                @php $counter++; @endphp 
                            </div>
                            @endforeach
                            </div>
                            <div class="message-time" id="current-time1"></div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <script>


    function getCurrentTime() {
        const now = new Date();
        let hours = now.getHours();
        const minutes = now.getMinutes().toString().padStart(2, '0');
        const ampm = hours >= 12 ? 'pm' : 'am';
        hours = hours % 12 || 12; // Convert 0 to 12 for 12-hour format
        const currentTime = `${hours}:${minutes} ${ampm}`;
        console.log("Current time:", currentTime); // Debugging
        return currentTime;
    }

    time = getCurrentTime();
$('#current-time1').append(time);



        function fetchRecipe(id) {
            const apiKey = 'a3bff443ef744c5e83d7d03e08e9e158';
            const url = `https://api.spoonacular.com/recipes/${id}/information?apiKey=${apiKey}`;
            
            $.ajax({
                url: url,
                method: 'GET',
                success: function(response) {
                    // Construct the new HTML elements
                    const ingredientsList = response.extendedIngredients.map(ingredient => `<li><p>${ingredient.original}</p></li>`).join('');
                    const stepsList = response.analyzedInstructions.map(instruction => {
                        const steps = instruction.steps.map(step => `<p><strong>${step.number}. </strong>${step.step}</p>`).join('');
                        return `<strong>${instruction.name}</strong>${steps}`;
                    }).join('');

                    // Construct the recipeDiv
                    const recipeDiv = `
                        <div class="chat-box-area" id="chat-box">
                            <div class="chat-content bot">
                                <div class="message-item">
                                    <div class="media align-items-end gap-2">
                                        <div class="bubble1">
                                            <h3>${response.title}</h3>
                                            <img src="${response.image}" alt="${response.title}" style="max-width: 100%;">
                                            <br><br>                             
                                            <div class="detail-content">
                                                <p><strong>Serving Size:</strong> ${response.servings}</p>
                                                <p><strong>Calories Per Serving:</strong> ${response.calories}</p>
                                            </div>
                                            <div class="dz-item-rating">${response.readyInMinutes} min'</div>
                                            <div class="item-wrapper">
                                                <div class="description">
                                                    <h6>Ingredients</h6>
                                                    <ul>${ingredientsList}</ul>
                                                    <h6>Steps</h6>
                                                    ${stepsList}
                                                </div>
                                            </div>
                                            </div>
                                            </div>
                                            <div class="message-time" id="current-time">${getCurrentTime()}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                    
                    // Append the recipeDiv to the content box
                    $('#content-box').append(recipeDiv);
                    
                    // Scroll to the bottom of the page
                    $('html, body').animate({ scrollTop: $(document).height() }, 'slow');
                },
                error: function(error) {
                    console.log('Error fetching recipe:', error);
                }
            });
        }
    </script>
</body>
</html>
