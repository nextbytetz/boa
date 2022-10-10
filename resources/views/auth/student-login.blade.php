<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        {{config('app.name')}}
    </title>
    <link id="pagestyle" href="{{PUBLIC_DIR}}/css/app.css?v=7" rel="stylesheet"/>
</head>
<body class="g-sidenav-show">

<section class="">
    <div class="row">
        <div class="col-md-6 bg-dark-alt h-100-vh">
            <div class="">
                <div class="row justify-content-center">
                    <div class="text-center mt-9">
                        <a class="navbar-brand text-dark bg-transparent fw-bolder" href="/home" rel="tooltip" title="" data-placement="bottom" target="_blank">
                            @if(!empty($super_settings['logo']))
                                <img src="{{PUBLIC_DIR}}/uploads/{{$super_settings['logo']}}" class="navbar-brand-img h-100" style="max-height: {{$super_settings['frontend_logo_max_height'] ?? '30'}}px;" alt="...">
                            @else
                                <h1 class=" text-white fw-bolder">{{config('app.name')}}</h1>
                            @endif
                        </a>

                        <img src="{{PUBLIC_DIR}}/img/logo.jpg" style="width:500px;height:300px;">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6 m-auto h-100"
            <div class="row container">
                <div class= "col-sm-10 col-xl-8 m-auto">



                    <div class="card-info card-body ">

                        <div class="card-header text-start pt-4">
                        <h3 class="font-weight-bolder text-dark">
                                    {{__('Login to your account')}}

                                </h3>
                        <p class="mb-0">
                                    {{__('Enter your email and password to login')}}

                                </p>
                    </div>
                        <div class="card-info ">

                            <div class="card-body">
                                <form role="form text-left" method="post" action="/student/login">

                                    @if (session()->has('status'))
                                        <div class="alert alert-success">
                                            {{session('status')}}
                                        </div>
                                    @endif
                                    @if ($errors->any())
                                        <div class="alert bg-pink-light text-danger">
                                            <ul class="list-unstyled">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <label>{{__('Your Email')}} au {{__('Phone Number')}}</label>
                                    <div class="mb-3">
                                        <input type="text" name="username" class="form-control" placeholder="Barua Pepe au Namba ya simu"
                                               aria-label="Email" aria-describedby="email-addon">
                                    </div>
                                    <div>
                                        <label class="fw-bolder">{{__('Password')}}
                                        </label>

                                    </div>

                                    <div class="mb-3">
                                        <input type="password" name="password" class="form-control" placeholder="Password"
                                               aria-label="Password" aria-describedby="password-addon">
                                    </div>

                                    <div class="mb-4 d-flex justify-content-between mb-4">
                                        <div class="form-check">
                                            <input class="form-check-input" name="remember" type="checkbox" id="rememberMe" checked="">
                                            <label class="form-check-label" for="exampleCheck1">{{__('Remember me')}}</label>
                                        </div>
                                        <div class="text-primary-hover">
                                            <a href="/forgot-password" class="text-info-light">
                                                <u>{{__('Forgot Password?')}}</u>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        @csrf
                                        <button type="submit"
                                                class="btn btn-info btn-rounded w-100  mb-0">{{__('Sign in')}}</button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                <p class="mb-4 text-sm mx-auto">


                                </p>
                                <p class="text-sm mt-3 mb-0">{{__('Do not have an account?')}} <a href="/signup"
                                                                                                  class="text-dark font-weight-bolder">{{__('Signup Here')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<script>
    (function(){
        "use strict";
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    })();
</script>

</body>

</html>
