@extends('layouts.app')

@section('template_title')
    {{ $data->name }}
@endsection

@section('template_linked_css')
    <link href="/assets/css/ecommerce/product-details-1.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')


                <div class="statbox widget box box-shadow">
                    <div class="widget-content">
                        <div class="row">

<div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">

<div class="widget-content-area product-detail-1">

<div class="row">

<div class="product-detailing">

<h2 class="product-name mt-4">
	{{ $data->name }}
</h2>

<div class="form-row product-btn-cart">
    <div class="form-group col-md-6">
        <a class="btn btn-dark" href="{{ route('order.add', ['id' => $data->id]) }}">Add to cart</a>
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

<script src="/assets/js/ecommerce/custom-ecommerce_pro_detail1.js"></script>
@endsection
