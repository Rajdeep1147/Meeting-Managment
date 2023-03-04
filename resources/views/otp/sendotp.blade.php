<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP VALIDATION</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>
<body>
    <form>
        <label>Enter Phone Number</label><br>
        <input type="text" id="number" placeholder="Enter Phone number"/>
        <br>
        <div id="div"></div><br>
        <button type="button" onclick="sendCode()">Send Otp</button>
    </form>
    <div id="error" style="color:red; display:none"></div>
    <div id="sentMessage" style="color:green; display:none"></div>

    <script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>
    <script>
        var fireConfig = {
            apiKey: "AIzaSyDisZug8lLZp58x0mZFhgmeQ6XT6tPSKX0",
            authDomain: "programing-experience.firebaseapp.com",
            projectId: "programing-experience",
            storageBucket: "programing-experience.appspot.com",
            messagingSenderId: "771378486658",
            appId: "1:771378486658:web:b51221ac91bc5fa39ac39b",
            measurementId: "G-3Y3VJ8R1K5"
        }

        firebase.initializeApp(fireConfig);
    </script>
    <script>
        window.onload =function(){
            render();
        }

        function render(){
            window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier("div");
            recaptchaVerifier.render();
        }

        function sendCode()
        {
            var number = $("#number").val();
            alert("+91"+number);
            firebase.auth().signWithPhoneNumber(number,window.reptchaVerifier).then(function(confirmresult)){
                window.confirmresult = confirmresult;
                coderesult = confirmresult;
            }
        }
    </script>
</body>
</html>