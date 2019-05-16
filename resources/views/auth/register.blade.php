@extends('layouts.auth')

@section('template_title', __('Register'))

@section('class_body', 'register')

@section('template_linked_css')

    <link href="/assets/css/users/register-1.css" rel="stylesheet" type="text/css" />

@endsection

@section('content')


<form class="form-register" method="POST" action="{{ route('register') }}">
@csrf

<div class="row">

    <div class="col-md-12 text-center mb-4">
        <img alt="logo" src="assets/img/logo-5.png" class="theme-logo">
    </div>
    <div class="col-md-12">

        <label for="full-name" class="">{{ __('Name') }}</label>
        @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
        <input type="text" id="full-name" class="form-control mb-4{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="{{ __('Name') }}" required autofocus >




        <label for="inputEmail" class="">{{ __('E-Mail Address') }}</label>
        @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
        <input type="email" id="inputEmail" class="form-control mb-4{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="{{ __('E-Mail Address') }}" required >



        <label for="inputPassword" class="">{{ __('Password') }}</label>
        @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
        <input type="password" id="inputPassword" class="form-control mb-5{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Password') }}" name="password" required>


        <label for="inputRepeatPassword" class="">{{ __('Confirm Password') }}</label>
        <input type="password" id="inputRepeatPassword" class="form-control mb-5" placeholder="{{ __('Confirm Password') }}" name="password_confirmation" required>
                    
        <button class="btn btn-lg btn-gradient-danger btn-block btn-rounded mb-4 mt-5" type="submit">{{ __('Register') }}</button>
    </div>


</div>
</form>





@endsection
