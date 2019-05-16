@extends('layouts.app')

@section('template_title')
    {{ __('Orders') }}
@endsection


@section('content')


<link rel="stylesheet" type="text/css" href="/plugins/table/datatable/datatables.css">    
<link rel="stylesheet" type="text/css" href="/assets/css/ecommerce/order.css">

<div id="product-catalog-container" class="container">



<div class="widget-content widget-content-area">
<div class="table-responsive mb-4">
    <table id="ecommerce-order-list" class="table table-hover table-bordered">
        <thead>
            <tr>
                <th>Order No.</th>
                <th>Name</th>
                <th>Price</th>
                <th class="align-center">Status</th>
                <th class="align-center">Actions</th>
            </tr>
        </thead>
        <tbody>

@forelse($data as $key => $value)

<tr>
<td>{{ $value->id }}</td>
<td>{{ $value->text }}</td>
<td>{{ $value->cost }}</td>
<td class="align-center">
    @includeIf('order.badge.' . $value->status)
    </td>
<td class="align-center"><a href="{{route('order.show', $value->id)}}" class="btn btn-default btn-sm"><i class="icon-search"></i> View</a></td>
</tr>

@empty

<tr>
<td colspan="5" class="text-center">
    No orders
</td>
</tr>

@endforelse
        </tbody>

    </table>
</div>
</div>


</div>



@endsection

