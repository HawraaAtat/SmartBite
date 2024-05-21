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
    </style>
</head>
<body>
    <div class="chat-box-area" id="chat-box">
        <div class="chat-content bot">
            <div class="message-item">
                <div class="media align-items-end gap-2">
                    <div>

                            @if($menuItems === null || empty($menuItems))
                        <div class="bubble1">
                                <div>System: It seems like your message got cut off. Did you want to ask or say something? Feel free to continue!</div>
                            @else
                            <div class="bubble">Here are some options:</div>
                        <div class="bubble1">
                                @php $counter = 1; @endphp
                                @foreach ($menuItems as $item)
                                    <div>
                                        <div>{{ $counter }}. {{ $item['title'] }}</div><br>
                                        <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}" style="max-width: 100px;">
                                    </div>
                                    <br>
                                    @php $counter++; @endphp 
                                @endforeach
                                <div class="message-time" id="current-time"></div>
                            @endif
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
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
        });
    </script>
</body>
</html>
