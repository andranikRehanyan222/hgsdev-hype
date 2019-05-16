@extends('layouts.app')

@section('template_title')
    {!! __('Your PayPal settings') !!}
@endsection


@section('template_linked_css')
    <link href="/assets/1css/pages/contact_us.css" rel="stylesheet" type="text/css" />

    <style>
        .form-control {
            border: 1px solid #ccc;
            color: #888ea8;
            font-size: 15px;
            border-radius: 2px;
        }
        .form-vertical .form-group .control-label { color: #3b3f5c; }
        .form-control::-webkit-input-placeholder { color: #888ea8; font-size: 15px; }
        .form-control::-ms-input-placeholder { color: #888ea8; font-size: 15px; }
        .form-control::-moz-placeholder { color: #888ea8; font-size: 15px; }
        .form-control:focus { border-color: #f1f3f1; border-left: solid 3px #3862f5; }
        label { color: #3b3f5c; margin-bottom: 14px; }
    </style>

@endsection



@section('content')
    

<div class="row">                    
    <div class="w-100 layout-spacing">
        <div class="statbox widget box box-shadow">
<div class="widget-header">
    &nbsp;
</div>

<form action="{{ route('setting.paypal_post') }}" class=" mb-4 widget-content widget-content-area" method="POST">


<div class="form-group row mb-4">
    <label for="paypal_mode" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Sandbox or LIVE</label>
    <div class="col-xl-10 col-lg-9 col-sm-10">

<select class="custom-select custom-select-sm mb-4" name="paypal_mode" id="paypal_mode">
  <option value="sandbox"
   @if('sandbox' == $data['paypal_mode'])
   selected="selected"
   @endif
   >Sandbox</option>
  <option value="live"
   @if('live' == $data['paypal_mode'])
   selected="selected"
   @endif
   >LIVE</option>
</select>

    </div>
</div>


<div class="form-group row mb-4">
    <label for="paypal_sandbox_secret" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Sandbox Client ID</label>
    <div class="col-xl-10 col-lg-9 col-sm-10">
        <input value="{{ $data['paypal_sandbox_secret'] }}" type="text" name="paypal_sandbox_secret" class="form-control" id="paypal_sandbox_secret" placeholder="">
    </div>
</div>


<div class="form-group row mb-4">
    <label for="paypal_sandbox_certificate" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Sandbox Secret</label>
    <div class="col-xl-10 col-lg-9 col-sm-10">
        <input value="{{ $data['paypal_sandbox_certificate'] }}" type="text" name="paypal_sandbox_certificate" class="form-control" id="paypal_sandbox_certificate" placeholder="">
    </div>
</div>


<div class="form-group row mb-4">
    <label for="paypal_live_secret" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">LIVE Client ID</label>
    <div class="col-xl-10 col-lg-9 col-sm-10">
        <input value="{{ $data['paypal_live_secret'] }}" type="text" name="paypal_live_secret" class="form-control" id="paypal_live_secret" placeholder="">
    </div>
</div>

<div class="form-group row mb-4">
    <label for="paypal_live_certificate" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">LIVE Secret</label>
    <div class="col-xl-10 col-lg-9 col-sm-10">
        <input value="{{ $data['paypal_live_certificate'] }}" type="text" name="paypal_live_certificate" class="form-control" id="paypal_live_certificate" placeholder="">
    </div>
</div>



    <div class="row">
        <div class="col text-sm-left text-center">
            <button class="btn btn-primary mt-4 mb-3">Submit</button>
        </div>
    </div>
</form>


        </div>
    </div>
</div>


        <!--  END CONTENT PART  -->



@endsection


@section('template_scripts')
    <script src="/assets/js/users/calendar.js"></script>
    <script src="/assets/js/users/custom-profile.js"></script>
@endsection
