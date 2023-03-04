<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Contact Us Any Time</h1>
    <form action="{{route('contact')}}" method="post">
     @csrf
     <input type="text" name="name" placeholder="Enter Your Name"><br/><br/>
     <input type="text" name="email" placeholder="Enter Your Email"><br/><br/>
     <input cols="30" rows="18" name="message" placeholder="Your Query"><br/><br/>
     <input type="submit" value="submit"><br/><br/>

    </form>
</body>
</html>