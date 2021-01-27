<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register | HMS</title>
    <link rel="stylesheet" href="css/app.css">
</head>
<body class="bg-gradient-primary sidebar-toggled">
<div class="container">

   <div class="row justify-content-center">
       <div class="col-xl-8 col-lg-8 col-md-8">
           <div class="card o-hidden border-0 shadow-lg my-5">
               <div class="card-body p-0">
                   <!-- Nested Row within Card Body -->
                   <div class="row">
                       {{--                <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>--}}
                       <div class="col">
                           <div class="p-5">
                               <div class="text-center">
                                   <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                               </div>
                               <form class="user" method="POST" action="{{ route('register') }}">
                                   @csrf
                                   <div class="form-group">
                                           <input type="text" name="name" class="form-control form-control-user @error('name') is-invalid @enderror" id="name" placeholder="Your Name">
                                           @error('name')
                                           <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                           @enderror

                                   </div>
                                   <div class="form-group">
                                       <input type="email" name="email" class="form-control form-control-user @error('email') is-invalid @enderror" id="email" placeholder="Email Address" value="{{ old('email') }}" autocomplete="email">
                                       @error('email')
                                       <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                       @enderror
                                   </div>
                                   <div class="form-group">
                                       <select name="gender" id="gender" class="form-control form-control-select  @error('gender') is-invalid @enderror" required autocomplete="gender" >
                                           <option  value="" selected disabled >Select Your Gender</option>
                                           <option value="m">Male</option>
                                           <option value="f">Female</option>
                                       </select>

                                       @error('gender')
                                       <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                       @enderror
                                   </div>
                                   <div class="form-group row">
                                       <div class="col-sm-6 mb-3 mb-sm-0">
                                           <input type="password" name="password" class="form-control form-control-user @error('gender') is-invalid @enderror" id="password" placeholder="Password">
                                           @error('gender')
                                           <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                           @enderror
                                       </div>
                                       <div class="col-sm-6">
                                           <input type="password" name="password_confirmation" class="form-control form-control-user" id="password_confirmation" placeholder="Repeat Password">
                                       </div>
                                   </div>
                                   <button type="submit" class="btn btn-primary btn-user btn-block">
                                       Register Account
                                   </button>
                                   <hr>
                               </form>
                               <hr>
                               <div class="text-center">
                                   @if (Route::has('password.request'))
                                       <a class="small" href="{{ route('password.request') }}">
                                           {{ __('Forgot Your Password?') }}
                                       </a>
                                   @endif

                               </div>
                               <div class="text-center">
                                   <a class="small" href="/login">Already have an account? Login!</a>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>

</div>

<script src="js/app.js"></script>
</body>
</html>
