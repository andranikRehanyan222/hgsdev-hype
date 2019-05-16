@extends('layouts.app')

@section('template_title')
    {!! __('Edit powerlike ') !!}
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
<form class="edu-experience" method="POST" action="{{ route('powerlikes.update', ['product' => $data->id]) }}">
     @csrf
    <div class="info">
        <div class="row">
            <div class="col-md-11 mx-auto">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="cost">Cost</label>
                            <input type="number" class="form-control mb-4" name="cost" id="cost" placeholder="9.99" value="{{ $data->cost }}" min="0">
                        </div>
                    </div>                        

                <div class="save-info">
                    <div class="row">
                        <div class="col-md-11 mx-auto">
                            <button class="btn btn-gradient-warning mb-4 float-right btn-rounded">Update</button>
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
</div>


@endsection


@section('template_scripts')
    <script src="/assets/js/users/calendar.js"></script>
    <script src="/assets/js/users/custom-profile.js"></script>
@endsection
