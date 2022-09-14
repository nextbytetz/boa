@extends('layouts.admin-portal')
@section('content')
    <div class=" row mb-4">
        <div class="col">
            <h5 class="fw-bolder">
                {{__('Settings')}}
            </h5>
        </div>
        <div class="col text-end">
        </div>
    </div>
    <div class="col-lg-8 col-12 mx-auto">

        <div class=" row">
            <div class="col">
                <h5 class="fw-bolder">
                    {{__('General Settings')}}
                </h5>
            </div>
            <div class="col text-end">
            </div>
        </div>
        <div class="row mb-5">
            <div class="  col-md-12 mt-lg-0 mt-4">
                <div class="card">
                    <div class="card-body">
                        <form enctype="multipart/form-data" action="/settings" method="post">

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="list-unstyled">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="" id="basic-info">
                                <div class=" pt-0">
                                    @if ($user->super_admin)
                                        <div class="row">
                                            <div class="col-md-12 align-self-center">
                                                <div>
                                                    <label for="logo_file" class="form-label">{{__('Upload Logo')}}</label>
                                                    <input class="form-control" name="logo" type="file" id="logo_file">
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($user->super_admin)
                                        <label class="form-label mt-3">{{__('Currency')}}</label>

                                        <div class="input-group">
                                            <input id="currency" name="currency" value="{{$settings['currency'] ?? config('app.currency')}}"
                                                   class="form-control" type="text" required="required">
                                        </div>
                                    @endif

                                    @if ($user->super_admin)
                                        <div class="row">
                                            <div class="col-md-12 align-self-center">
                                                <div>
                                                    <label for="free_trial_days" class="form-label mt-4">{{__('Landing Page')}}</label>
                                                    <select class="form-select" aria-label="Default select example" name="landingpage">

                                                        <option value="Default"
                                                                @if(($settings['landingpage'] ?? null) === 'Default') selected @endif
                                                        >{{__('Default landing page')}}</option>
                                                        <option value="Login"
                                                                @if(($settings['landingpage'] ?? null) === 'Login') selected @endif>{{__('Login Page')}}</option>
                                                    </select>

                                                </div>
                                            </div>
                                        </div>

                                    @endif

                                    @csrf
                                    <button class="btn btn-info float-left mt-4 mb-0">{{__('Update')}} </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class=" row">
            <div class="col">
                <h5 class=" fw-bolder">
                    {{__('SMTP Settings')}}
                </h5>
            </div>
            <div class="col text-end">
            </div>
        </div>
        <div class="row mb-5">
            <div class="  col-md-12 mt-lg-0 mt-4">
                <div class="card">
                    <div class="card-body">
                        <form enctype="multipart/form-data" action="/save-email-setting" method="post">

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="list-unstyled">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="mt-3" id="basic-info">
                                <div class=" pt-0">
                                    <div class="row mb-4">
                                        <label class="form-label">{{__('SMTP Host')}}</label>

                                        <div class="input-group">
                                            <input id="host" name="smtp_host" value="{{$settings['smtp_host'] ?? ''}}"
                                                   class="form-control" type="text" required="required">
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <label class="form-label">{{__('SMTP Username')}}</label>

                                        <div class="input-group">
                                            <input id="username" name="smtp_username" value="{{$settings['smtp_username'] ?? ''}}"
                                                   class="form-control" type="text" required="required">
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label class="form-label">{{__('SMTP Password')}}</label>

                                        <div class="input-group">
                                            <input id="password" name="smtp_password" value="{{$settings['smtp_password'] ?? ''}}"
                                                   class="form-control" type="text" required="required">
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label class="form-label">{{__('SMTP Port')}}</label>

                                        <div class="input-group">
                                            <input id="port" name="smtp_port" value="{{$settings['smtp_port'] ?? ''}}"
                                                   class="form-control" type="number" required="required">
                                        </div>
                                    </div>
                                    @csrf
                                    <button class="btn btn-info float-left mt-4 mb-0">{{__('Update')}} </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
