@include('layout.header')

<body class="bg-light">
    <div class="page-wrapper">
        
        <!-- Header -->
        <header class="header header-fixed">
            <div class="header-content">
                <div class="left-content">
                    <a href="javascript:void(0);" class="back-btn">
                        <i class="feather icon-arrow-left"></i>
                    </a>
                </div>
                <div class="mid-content">
                    <h4 class="title">Chatbot</h4>
                </div>
      
            </div>
        </header>
        <!-- Header -->
        <script>
    document.addEventListener('DOMContentLoaded', function() {
        var backButton = document.querySelector('.back-btn');
        if (backButton) {
            backButton.addEventListener('click', function(event) {
                event.preventDefault();
                window.history.back();
            });
        }
    });
</script>

        <!-- Main Content Start -->
        <main class="page-content space-top p-b60">
            <div id="content-box" class="container">
                <div class="chat-box-area" id="chat-box">
                    <span class="active-date"></span>
                    <div class="chat-content">
                        <div class="message-item">
                            <div class="media align-items-end gap-2">
                                <div>
                                    <div class="bubble">Welcome! How can I assist you today?</div>
                                    <div class="message-time" id="current-time"></div>    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- Main Content End -->

        <!-- Chat Footer -->
        <div class="chat-footer">
            <form id="chat-form">
                <div class="form-group boxed">
                    <div class="input-wrapper message-area input-lg">
                        <div class="append-media"></div>
                        <input type="text" class="form-control" id="input" name="input" placeholder="Type Something">
                        <button type="submit" class="btn chat-btn" id="send-btn">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.49984 21.75C1.33034 21.75 1.16384 21.693 1.02734 21.582C0.81134 21.4065 0.70934 21.126 0.76409 20.8523L2.26409 13.3523C2.32484 13.047 2.56859 12.8108 2.87609 12.7598L7.43759 12L2.87684 11.2395C2.56934 11.1885 2.32559 10.9523 2.26484 10.647L0.76484 3.147C0.70934 2.874 0.81134 2.5935 1.02734 2.418C1.24334 2.2425 1.54184 2.20125 1.79459 2.31075L22.7946 11.3108C23.0713 11.4285 23.2498 11.7 23.2498 12C23.2498 12.3 23.0713 12.5715 22.7953 12.6893L1.79534 21.6893C1.70084 21.7305 1.59959 21.75 1.49984 21.75V21.75Z" fill="#04764E"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </form>
        </div> 
        <!-- Chat Footer -->
    </div>  

    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
<script>
$(document).ready(function() {
    // Set CSRF token for all AJAX requests
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // List of suggestions
    var suggestions = ["Breakfast", "Mid-Morning Snack", "Lunch","Afternoon Snack","Dinner","Or do you want a specific food?"];

    function isLogicalInput(input) {
        // Check if input contains any logical keywords related to food
        const logicalKeywords = ["eat","food", "recipe", "restaurant", "cooking", "cuisine", "dish", "appetizer", "main course", "dessert", "snack", "ingredients", "flavor", "taste", "spice", "seasoning", "baking", "grilling", "roasting", "frying", "boiling", "steaming", "sauteing", "simmering", "marinating", "mixing", "chopping", "slicing", "dicing", "garnish", "presentation", "nutrients", "healthy", "organic", "fresh", "local", "international", "fusion", "gourmet", "comfort food", "fast food", "fine dining", "buffet", "takeout", "delivery", "meal prep", "vegetarian", "vegan", "gluten-free", "dairy-free", "allergy-friendly", "farm-to-table", "sustainable", "cook", "bake", "grill", "roast", "fry", "boil", "steam", "saute", "simmer", "marinate", "mix", "chop", "slice", "dice"];
        for (var i = 0; i < logicalKeywords.length; i++) {
            if (input.toLowerCase().includes(logicalKeywords[i])) {
                return true;
            }
        }
        return false;
    }

    function isGreetingInput(input) {
        // Check if input contains any greeting keywords
        const greetingKeywords = ["hello", "hi", "greetings", "hey", "howdy", "good morning", "good afternoon", "good evening"];
        for (var i = 0; i < greetingKeywords.length; i++) {
            if (input.toLowerCase().includes(greetingKeywords[i])) {
                return true;
            }
        }
        return false;
    }

    // Handle form submission
    $('#chat-form').submit(function(event) {
        event.preventDefault(); 
        var userInput = $('#input').val();
        if (userInput !== '') {
            if (!isLogicalInput(userInput)) {
                if (isGreetingInput(userInput)) {
                    $('#content-box').append(`
                    <div class="chat-box-area" id="chat-box">
                        <div class="chat-content user">
                            <div class="message-item">
                                <div class="media align-items-end gap-2">
                                    <div>
                                        <div class="bubble">${userInput}</div>    
                                        <div class="message-time">${getCurrentTime()}</div>    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="chat-box-area" id="chat-box">
                            <div class="chat-content bot">
                                <div class="message-item">
                                    <div class="media align-items-end gap-2">
                                        <div>
                                            <div class="bubble">Welcome! How can I assist you today?</div>
                                            <div class="message-time">${getCurrentTime()}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>`);$('#input').val('');
                } else {
                    $('#content-box').append(`
                    <div class="chat-box-area" id="chat-box">
                        <div class="chat-content user">
                            <div class="message-item">
                                <div class="media align-items-end gap-2">
                                    <div>
                                        <div class="bubble">${userInput}</div>    
                                        <div class="message-time">${getCurrentTime()}</div>    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        <div class="chat-box-area" id="chat-box">
            <div class="chat-content bot">
                <div class="message-item">
                    <div class="media align-items-end gap-2">
                        <div>                            
                        <div class="message-time">${getCurrentTime()}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>`);$('#input').val('');
        $.ajax({
        url: "/spoonapianswer",
        method: "GET",
        data: {
            suggestion: userInput
        },
        success: function(response) {
            // Handle successful response from the server
            $('#content-box').append(response);
        },
        error: function(xhr, status, error) {
            // Handle error
            console.error(error);
        }
    });
                }
            } else {
                // Append user message to chat content
                $('#content-box').append(`
                    <div class="chat-box-area" id="chat-box">
                        <div class="chat-content user">
                            <div class="message-item">
                                <div class="media align-items-end gap-2">
                                    <div>
                                        <div class="bubble">${userInput}</div>    
                                        <div class="message-time">${getCurrentTime()}</div>    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>`);

                // Clear input value
                $('#input').val('');

                // Append bot's response with suggestions
                $('#content-box').append(`
                    <div class="chat-box-area" id="chat-box">
                        <div class="chat-content bot">
                            <div class="message-item">
                                <div class="media align-items-end gap-2">
                                    <div>
                                        <div class="bubble">Please choose from the following suggestions:</div>    
                                        <div class="suggestions">${suggestions.map(suggestion => `<button class="suggestion">${suggestion}</button>`).join(' ')}</div>
										<div class="message-time">${getCurrentTime()}</div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					<style>
        .suggestions {
        padding: 15px 18px;
        border-radius: 20px 20px 20px 2px;
        color: #000;
        align-items: center;
        margin-bottom: 5px;
        font-size: 14px;
        font-weight: 400;
        max-width: 260px;
        min-width: 90px; 
        }
        .suggestion {
        padding: 15px 18px;
        border-radius: 20px 20px 20px 2px;
        background: var(--secondary);
        color: #000;
        align-items: center;
        margin-bottom: 5px;
        font-size: 14px;
        font-weight: 400;
        max-width: 260px;
        min-width: 90px; 
        }
        </style>`);
            }
        } else {
            // Notify the user that the message cannot be empty
            $('#content-box').append(`
                <div class="chat-box-area" id="chat-box">
                    <div class="chat-content bot">
                        <div class="message-item">
                            <div class="media align-items-end gap-2">
                                <div>
                                    <div class="bubble">Please type something before sending.</div>
                                    <div class="message-time">${getCurrentTime()}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>`);
        }
    });

    // Handle user's suggestion selection
    $(document).on('click', '.suggestion', function() {
        var selectedSuggestion = $(this).text();

        // Append user's selected suggestion to chat content
        $('#content-box').append(`
            <div class="chat-box-area" id="chat-box">
                <div class="chat-content user">
                    <div class="message-item">
                        <div class="media align-items-end gap-2">
                            <div>
                                <div class="bubble">${selectedSuggestion}</div>    
                                <div class="message-time">${getCurrentTime()}</div>    
                            </div>
                        </div>
                    </div>
                </div>
            </div>`);

            selectedSuggestion = selectedSuggestion.toLowerCase();
    if (selectedSuggestion.includes("snack")) {
    selectedSuggestion = "snack";
    }
    if (selectedSuggestion === "or do you want a specific food?") {
    $('#content-box').append(`
        <div class="chat-box-area" id="chat-box">
            <div class="chat-content bot">
                <div class="message-item">
                    <div class="media align-items-end gap-2">
                        <div>
                            <div class="bubble">Tell me what do you want</div>
                            <div class="message-time">${getCurrentTime()}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>`);
        $.ajax({
        url: "/spoonapi-foodlist",
        method: "GET",
        data: {
            suggestion: selectedSuggestion
        },
        success: function(response) {
            // Handle successful response from the server
            $('#content-box').append(response);
        },
        error: function(xhr, status, error) {
            // Handle error
            console.error(error);
        }
    });
    } else {
    $.ajax({
        url: "/spoonapi-chat",
        method: "GET",
        data: {
            suggestion: selectedSuggestion
        },
        success: function(response) {
            // Handle successful response from the server
            $('#content-box').append(response);
        },
        error: function(xhr, status, error) {
            // Handle error
            console.error(error);
        }
    });
    }
    });
	function getCurrentDate() {
            const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
            const now = new Date();
            const day = now.getDate();
            const monthIndex = now.getMonth();
            const year = now.getFullYear();
            return `${day} ${months[monthIndex]} ${year}`;
        }

    function getCurrentTime() {
        const now = new Date();
        let hours = now.getHours();
        let minutes = now.getMinutes();
        const ampm = hours >= 12 ? 'pm' : 'am';
        hours = hours % 12;
        hours = hours ? hours : 12; // 12-hour clock
        minutes = minutes < 10 ? '0' + minutes : minutes;
        return `${hours}:${minutes} ${ampm}`;
    }
	document.getElementById('current-time').textContent = getCurrentTime();
	const activeDateElement = document.querySelector('.active-date');
        activeDateElement.textContent = getCurrentDate();
});
</script>

</body>
</html>
