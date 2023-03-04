@extends('layout.register-layout')
@section('content')

<h1 class="ls-tight font-bolder mt-6">
                  Create your account
                </h1>
                <p class="mt-2">It's free and easy</p>
              </div>
              <div>
              @if(Session::has('success'))
                  <div class="alert alert-success">{{Session::get('success')}}
              @endif  
            </div>
              
              <form action="{{route('user.Register')}}" method="post">
                @csrf
                <div class="mb-5">
                  <label class="form-label" for="name">Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
                  @error('name')
                    <span class="text-danger">{{$message }}</span>
                    @endif          
                </div>
                <div class="mb-5">
                  <label class="form-label" for="email">Email address</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Your email address">
                </div>
                @error('email')
                    <span class="text-danger">{{$message }}</span>
                @endif
                <div class="mb-5">
                  <label class="form-label" for="password">Password</label>
                  <input type="password" class="form-control" name="password" id="password" placeholder="Password" autocomplete="current-password">
                </div>
                @error('password')
                    <span class="text-danger">{{$message }}</span>
                @endif
               
                
              


                <div class="text-center">
                <button type="submit" class="btn btn-primary "> Submit </button>
                </div>
              </form>
              <div class="py-5 text-center">
                <span class="text-xs text-uppercase font-semibold">or</span>
              </div>
              <div class="row g-3">
                <div class="col-sm-6">
                  <a href="#" class="btn btn-neutral w-full">
                    <span class="icon icon-sm pe-2">
                      <img alt="..." src="/img/social/github.svg" />
                    </span>
                    <span>Github</span>
                  </a>
                </div>
                <div class="col-sm-6">
                  <a href="#" class="btn btn-neutral w-full">
                    <span class="icon icon-sm pe-2">
                      <img alt="..." src="/img/social/google.svg" />
                    </span>
                    <span>Google</span>
                  </a>
                </div>
              </div>
              <div class="my-6">
                <small>Already have an account?</small>
                <a href="pages/authentication/basic-login.html" class="text-warning text-sm font-semibold">Sign in</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection
