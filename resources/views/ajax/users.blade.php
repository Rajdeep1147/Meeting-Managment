<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Users Detail</title>
</head>
<body>
  <div id="info" class="bg-success text-center" ></div> 
<table class="table table-borderless">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
    <tr id="sid{{$user->id}}">
      <th scope="row">{{$user->id}}</th>
      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
      <td><button class="button" data-id="{{$user->id}}">Edit</button></td>
      <td><button class="button" data-id="{{$user->id}}">Delete</button></td>
    </tr>
    @endforeach
  </tbody>
</table>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $(".button").on('click',function(){
           var id =  $(this).data("id");
           var token = $("meta[name='csrf-token']").attr("content");
            $.ajax({
                url : "delete-user/"+id,
                type:"post",
                data: {
                    "id": id,
                    _token: '{{csrf_token()}}'
                },
                success:function(result){
                  $("#sid"+id).remove();
                    $("#info").text("User Has Been Deleted");
                }
                 
            });
        });
    });
</script>
</body>
</html>