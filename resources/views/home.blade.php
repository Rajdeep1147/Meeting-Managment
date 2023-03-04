
<h2>Google User Login</h2>
@if(session()->has('username'))
<h1>Hello</h1>
@else
    dd("No User");
@endif