@extends('layouts.app')

@section('template_title')
{!! __('Your Stripe settings') !!}
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
            <form action="{{ route('setting.stripe_post') }}" class=" mb-4 widget-content widget-content-area" method="POST">
                <div class="form-group row mb-4">
                    <label for="stripe_key" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Stripe Key</label>
                    <div class="col-xl-10 col-lg-9 col-sm-10">
                        <input value="{{ $stripe_key }}" type="text" name="stripe_key" class="form-control" id="stripe_key" placeholder="">
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="stripe_secret" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Stripe Secret</label>
                    <div class="col-xl-10 col-lg-9 col-sm-10">
                        <input value="{{ $stripe_secret }}" type="text" name="stripe_secret" class="form-control" id="stripe_secret" placeholder="">
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
