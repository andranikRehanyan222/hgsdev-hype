@extends('layouts.auth')

@section('template_title', __('Login'))

@section('class_body', 'login')


@section('template_linked_css')

    <link href="/assets/css/users/login-1.css" rel="stylesheet" type="text/css" />

@endsection


@section('content')




<form method="POST" action="{{ route('login') }}"  class="form-login">
                        @csrf

        <div class="row">
            
            <div class="col-md-12 text-center mb-4">
                {{-- <img alt="logo" src="assets/img/logo-3.png" class="theme-logo"> --}}
                <img alt="logo" src="{{asset('img/hypegroups.jpg')}}" width="100%">
            </div>

            <div class="col-md-12">

                <label for="inputEmail" class="sr-only">{{ __('E-Mail Address') }}</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="icon-inputEmail"><i class="flaticon-user-7"></i> </span>
                    </div>
    <input value="{{ old('email') }}" type="email" name="email" id="inputEmail" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email Address" aria-describedby="inputEmail" required >


@if ($errors->has('email'))
    <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('email') }}</strong>
    </span>
@endif

                </div>

                <label for="inputPassword" class="sr-only">{{ __('Password') }}</label>                
                <div class="input-group mb-4">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="icon-inputPassword"><i class="flaticon-key-2"></i> </span>
                    </div>
                    <input type="password" name="password" id="inputPassword" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password" aria-describedby="inputPassword" required >

@if ($errors->has('password'))
    <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('password') }}</strong>
    </span>
@endif
                </div>
                
                <div class="checkbox d-flex justify-content-center mt-3">
                    <div class="custom-control custom-checkbox mr-3">
                        <input type="checkbox" class="custom-control-input" id="customCheck1" name="remember" value="remember-me" {{ old('remember') ? 'checked' : '' }}>
                        <label class="custom-control-label" for="customCheck1">{{ __('Remember Me') }}</label>
                    </div>
                </div>

                <button class="btn btn-lg btn-gradient-warning btn-block btn-rounded mb-4 mt-5" type="submit">{{ __('Login') }}</button>

                <div class="forgot-pass text-center">
                    <a href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                </div>

            </div>

            <div class="col-md-12">
                <div class="login-text text-center">
                    <p class="mt-3 text-white">New Here? <a href="{{ route('register') }}" class="">Register </a> a new user !</p>
                </div>
            </div>

        </div>
    </form>

@endsection
