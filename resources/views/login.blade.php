<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
  <meta name="color-scheme" content="dark light">
  <title>Login | Clever Admin Dashboard Template</title>
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <!-- Styles -->
  <link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
  <!-- Utilities -->
  <link rel="stylesheet" type="text/css" href="{{asset('css/utilities.css')}}">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>

<body>
  <div>
    <div class="px-5 py-5 p-lg-0 h-screen bg-surface-secondary d-flex flex-column justify-content-center">
      <div class="d-flex justify-content-center">
        <div class="col-12 col-md-9 col-lg-6 min-h-lg-screen d-flex flex-column justify-content-center py-lg-16 px-lg-20 position-relative">
          <div class="row">
          
            <div class="col-lg-10 col-md-9 col-xl-7 mx-auto">
              <div class="text-center mb-12">
              
                <h3 class="display-5">👋</h3>

                <h1 class="ls-tight font-bolder mt-6">
                  Welcome back!
                </h1>
                @if(Session::has('error'))
                  <p class="alert alert-danger">{{Session::get('error')}}</p>
              @endif
                <p class="mt-2">Let's build someting great</p>
              </p>
               
              <form method="post" action="{{route('user.login')}}">
                @csrf
                <div class="mb-5">
                  <label class="form-label" for="email">Email address</label>
                  <input type="email" class="form-control" name="email" placeholder="Your email address">
                </div>
                  @error('email')
                    <span class="text-danger">{{$message }}</span>
                  @endif  
                <div class="mb-5">
                  <div class="d-flex align-items-center justify-content-between">
                    <div>
                      <label class="form-label" for="password">Password</label>
                    </div>
                  
                    <div class="mb-2">
                      <a href="basic-recover.html" class="text-sm text-muted text-primary-hover text-underline">Forgot password?</a>
                    </div>
                  </div>
                  <input type="password" class="form-control" name="password" placeholder="Password" autocomplete="current-password">
                </div>
                @error('password')
                    <span class="text-danger">{{$message }}</span>
                  @endif 

                <div>
                  <button type="submit" class="btn btn-primary w-full">
                    Sign in
                  </button>
                </div>
              </form>
              <div class="py-5 text-center">
                <span class="text-xs text-uppercase font-semibold">or</span>
              </div>
              <div class="row g-3">
                <div class="col-sm-6">
                  <a href="#" class="btn btn-neutral w-full">
                    <span class="icon icon-sm pe-2">
                      <img alt="..." src="{{asset('img/social/github.svg')}}" />
                    </span>
                    <span>Github</span>
                  </a>
                </div>
                <div class="col-sm-6">
                  <a href="#" class="btn btn-neutral w-full">
                    <span class="icon icon-sm pe-2">
                      <img alt="..." src="{{asset('img/social/google.svg')}}" />
                    </span>
                    <span>Google</span>
                  </a>
                </div>
              </div>
              <div class="my-6">
                <small>Don't have an account?</small>
                <a href="pages/authentication/basic-register.html" class="text-warning text-sm font-semibold">Sign up</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Scripts -->
  <script src="{{asset('js/main.js')}}"></script>
</body>

</html>