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
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            function isLogicalInput(input) {
                const logicalKeywords = ["eat", "food", "recipe", "restaurant", "cooking", "cuisine", "dish", "appetizer", "main course", "dessert", "snack", "ingredients", "flavor", "taste", "spice", "seasoning", "baking", "grilling", "roasting", "frying", "boiling", "steaming", "sauteing", "simmering", "marinating", "mixing", "chopping", "slicing", "dicing", "garnish", "presentation", "nutrients", "healthy", "organic", "fresh", "local", "international", "fusion", "gourmet", "comfort food", "fast food", "fine dining", "buffet", "takeout", "delivery", "meal prep", "vegetarian", "vegan", "gluten-free", "dairy-free", "allergy-friendly", "farm-to-table", "sustainable", "cook", "bake", "grill", "roast", "fry", "boil", "steam", "saute", "simmer", "marinate", "mix", "chop", "slice", "dice"];
                return logicalKeywords.some(keyword => input.toLowerCase().includes(keyword));
            }

            function isGreetingInput(input) {
                const greetingKeywords = ["hello", "hi", "greetings", "hey", "howdy", "good morning", "good afternoon", "good evening"];
                return greetingKeywords.some(keyword => input.toLowerCase().includes(keyword));
            }

            function getCurrentDate() {
                const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
                const now = new Date();
                return `${now.getDate()} ${months[now.getMonth()]} ${now.getFullYear()}`;
            }

            function getCurrentTime() {
                const now = new Date();
                let hours = now.getHours();
                const minutes = now.getMinutes().toString().padStart(2, '0');
                const ampm = hours >= 12 ? 'pm' : 'am';
                hours = hours % 12 || 12; // Convert 0 to 12 for 12-hour format
                return `${hours}:${minutes} ${ampm}`;
            }

            $('#current-time').text(getCurrentTime());
            $('.active-date').text(getCurrentDate());

            $('#chat-form').submit(function(event) {
                event.preventDefault();
                const userInput = $('#input').val().trim();
                
                if (userInput) {
                    const userBubble = `
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
                        </div>`;

                    $('#content-box').append(userBubble);
                    $('#input').val('');

                    if (isGreetingInput(userInput)) {
                        const botBubble = `
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
                            </div>`;
                        $('#content-box').append(botBubble);
                    } else  {
                        const suggestions = ["breakfast", "snack", "lunch", "dinner"];
                        const matchedSuggestion = suggestions.find(suggestion => userInput.toLowerCase().includes(suggestion));

                        if (matchedSuggestion) {
                            const botSuggestionBubble = `
                                <div class="chat-box-area" id="chat-box">
                                    <div class="chat-content bot">
                                        <div class="message-item">
                                            <div class="media align-items-end gap-2">
                                                <div>
                                                    <div class="bubble">You mentioned ${matchedSuggestion}, is that correct?</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>`;
                            $('#content-box').append(botSuggestionBubble);

                            $.ajax({
                                url: "/spoonapi-chat",
                                method: "GET",
                                data: { suggestion: matchedSuggestion },
                                success: function(response) {
                                    $('#content-box').append(response);
                                },
                                error: function(xhr, status, error) {
                                    console.error(error);
                                }
                            });}
                          else
                          { 
                            if(isLogicalInput(userInput))
                            {$.ajax({
                                url: "/spoonapi-foodlist",
                                method: "GET",
                                data: { suggestion: userInput },
                                success: function(response) {
                                    $('#content-box').append(response);
                                },
                                error: function(xhr, status, error) {
                                    console.error(error);
                                }
                            });}
                         else {
                            $.ajax({
                                url: "/spoonapianswer",
                                method: "GET",
                                data: { suggestion: userInput },
                                success: function(response) {
                                    $('#content-box').append(response);
                                },
                                error: function(xhr, status, error) {
                                    console.error(error);
                                }
                            });
                        }
                    }
                
                }} else {
                    const emptyMessageWarning = `
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
                        </div>`;
                    $('#content-box').append(emptyMessageWarning);
                }
            });
       } );
    </script>
</body>
</html>