<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        {{config('app.name')}}
    </title>
    <link id="pagestyle" href="{{PUBLIC_DIR}}/css/app.css" rel="stylesheet"/>
</head>


<section class="">
    <div class="row">
        <div class="col-md-4 bg-dark-alt h-100-vh">
            <div>
                <div class="row justify-content-center">
                    <div class="text-center mx-auto">
                        <h4 class=" text-white mb-4 mt-10">{{__('BARAZA KUU LA WAISLAM TANZANIA')}}</h4>
                        <h4 class="text-white text-lead">{{__('(BAKWATA)')}}</h4>

                    </div>
                    <img src="{{PUBLIC_DIR}}/img/logo.jpg" style="width:300px;height:200px;">

                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="container col-md-9 ">
                <div class="mt-5">
                    <div class="card-header text-start pt-4">
                        <h4>{{__('Create Your Account')}}</h4>
                        <p class=" mt-3 mb-0">{{__('Already have an account?')}} <a href="student/login"
                                                                                    class="text-info-light font-weight-bolder">{{__('Sign in')}} hapa</a>
                   au
                                                                                    <a href="/home"
                                                                                    class="text-info-light font-weight-bolder">Rudi Mwanzo</a>
                                                                                                                                             </div>
                 
                    <div class="card-body">
                        <form role="form text-left" method="post" action="/student-signup-post">
                            @if (session()->has('status'))
                                <div class="alert alert-success">
                                    {{session('status')}}
                                </div>
                            @endif
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="list-unstyled">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                       
                            <div class="row">
                                <div class="col-6">
                                    <label class="form-label">{{__('First Name')}}</label><span class="text-danger">*</span>
                                    <div class="input-group">
                                        <input name="first_name" class="form-control" type="text" placeholder="First name"
                                        aria-describedby="email-addon">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label class="form-label">{{__('Last Name')}}</label><span class="text-danger">*</span>
                                    <div class="input-group">
                                        <input type="text" name="last_name" class="form-control" placeholder="Last name"
                                        aria-describedby="email-addon">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <label class="form-label">{{__('Your Email')}}</label>
                                    <div class="input-group">
                                        <input type="email" placeholder="Email" name="email" class="form-control"
                                       aria-label="Email" aria-describedby="email-addon">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label class="form-label">{{__('Phone Number')}}</label><span class="text-danger">*</span>
                                    <div class="input-group">
                                        <input type="number" placeholder="Phone number" name="phone_number" class="form-control"
                                        aria-label="Number" aria-describedby="phone-addon">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <label class="form-label">{{__('Region')}}</label><span class="text-danger">*</span>
                                    <div class="input-group">
                                        <select class="form-control" name="region_id" id="region_id">
                                            <option value="0">{{__('Choose Region')}}</option>
                                            @foreach ($regions as $region)
                                                <option value="{{$region->id}}"
                                                        
                                                >{{$region->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label class="form-label">{{__('District')}}</label><span class="text-danger">*</span>
                                    <div class="input-group">
                                        <select class="form-control" name="district_id" id="district_id">
                                            <option value="0">{{__('Choose District')}}</option>
                                            @foreach ($districts as $district)
                                                <option value="{{$district->id}}"
                                                        
                                                >{{$district->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <label class="form-label">{{__('Village/Street')}}</label><span class="text-danger">*</span>
                                    <div class="input-group">
                                        <input name="village" class="form-control" type="text" placeholder="Village/Street"
                                        aria-describedby="email-addon">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label class="form-label">{{__('Ward')}}</label><span class="text-danger">*</span>
                                    <div class="input-group">
                                        <input type="text" name="ward" class="form-control" placeholder="Ward"
                                        aria-describedby="email-addon">
                                    </div>
                                </div>
                            </div>
                         
                            <label>{{__('Choose Password')}}</label>
                            <div class="mb-3">
                                <input type="password" name="password" class="form-control" placeholder="Password"
                                       aria-label="Password" aria-describedby="password-addon">
                            </div>
                            @csrf
                            <div class="text-start">
                                <button type="submit" class="btn btn-blue btn-rounded  my-4 mb-2">{{__('Sign up')}}</button>
                                <br>
                        
                            </div>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



</html>
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
