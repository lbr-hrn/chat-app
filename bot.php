<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/a4f1e2d8ef.js" crossorigin="anonymous"></script>
    <title>ChatBot</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js""></script>
</head>
<body>
    <div class="wrapper">
        <div class="title">Simple Online Chatbot</div>
         <div class="form">
            <div class="bot-inbox inbox">
                <div class="icon">
                    <i class="fas fa-user"></i>
                </div>
                <div class="msg-header">
                    <p>Hello there, How can I help you??</p>
                </div>
            </div>
         </div>
         <div class="typing-field">
            <div class="input-data">
                <input id="data" type="text" placeholder="Type something here..." required>
                <button id="send-btn">Send</button>
            </div>
        </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){ //here we're using jquery to manipulate DOM
            $("#send-btn").on("click",function(){
                $value = $("#data").val();
                $msg = '<div class="user-inbox inbox" <div class="msg-header"><p>'+ $value +'</p></div></div>';
                $(".form").append($msg);
                $("#data").val('');

                // start ajax code

                $.ajax({
                    url: 'message.php',
                    type: 'POST',
                    data: 'text='+$value,
                    success: function(result){
                        $replay = '<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-user"></i></div><div class="msg-header"><p></p></div></div></div>';
                        $(".form").append($replay);
                    }
                })

            });
        });
    </script>
</body>
</html>
