<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Vertical (basic) form</h2>
  <form action="/action_page.php">
    <div class="form-group">
      <label for="text">Search Here</label>
      <input type="text" class="form-control" id="search" placeholder="Enter Text" name="search" id="search">
    </div>
    <div id="result"></div>
    
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $("#search").on('keyup',function(){
            var val = $(this).val(); 
            $.ajax({
                url:"{{route('search')}}",
                type:"GET",
                data:{"search":val},
                success:function(data)
                {
                    $("#result").html(data);
                }
            });
        });
    });
</script>
</body>
</html>
