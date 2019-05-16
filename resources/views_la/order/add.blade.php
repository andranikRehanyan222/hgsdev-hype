@extends('layouts.app')

@section('template_title')
    {!! __('Order ') !!}
    "{!! $data->name !!}"
@endsection


@section('template_linked_css')
    <link rel="stylesheet" type="text/css" href="/plugins/dropify/dropify.min.css">
    <link href="/assets/css/users/account-setting.css" rel="stylesheet" type="text/css" />
@endsection



@section('content')
    

<div class="container">
<div class="row layout-spacing">



<div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
<form class="edu-experience" method="POST" action="{{ route('order.create', ['product' => $data->id]) }}" 
 @if(count($accounts) < 1)
 onsubmit="return false;"
 @endif
 >
     @csrf
    <div class="info">
        <div class="row">
            <div class="col-md-11 mx-auto">
                <div class="row">

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="cost">Cost</label>
                            {{ $data->cost }}
                        </div>
                    </div>        

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="cost">Account name</label>
                            <select name="account">
@forelse($accounts as $value)
<option value="{{$value->id}}">{{$value->username}}</option>
@empty
<option>No account</option>
@endforelse
                            </select>
                        </div>
                    </div>                        

                <div class="save-info">
                    <div class="row">
                            @if(count($accounts) > 0)
                        <div class="col-md-11 mx-auto">
                            <button class="btn btn-gradient-warning mb-4 float-right btn-rounded">Pay</button>
                        </div>
                            @else
                            Please, add account before order
                            @endif
                    </div>
                </div>

                </div>
            </div>
        </div>
    </div>
</div>
</div>



</div>
</div>


@endsection


@section('template_scripts')

<script src="https://www.paypal.com/sdk/js?client-id=sb"></script>

    <script src="/assets/js/users/calendar.js"></script>
    <script src="/assets/js/users/custom-profile.js"></script>
@endsection
