@extends('layouts.app')

@section('template_title')
    {!! __('Fuelgram') !!}
@endsection


@section('content')
    

<div id="product-catalog-container" class="container">

@foreach($data as $key => $value)



@endforeach


</div>



@endsection

