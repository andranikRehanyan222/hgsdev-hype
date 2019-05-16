@extends('layouts.app')

@section('template_title')
    {!! __('Accounts') !!}
@endsection


@section('template_linked_css')
    <link href="assets/css/ui-kit/custom-typography.css" rel="stylesheet" type="text/css" />
@endsection



@section('content')
    

<div class="row">
    <div class="col-lg-12 layout-spacing">
        <div class="statbox widget box box-shadow">

            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12 pt-3">
<a href="{{ route('accounts.add') }}" class="btn btn-gradient-primary btn-rounded  m-3">
<i class="flaticon-edit-6"></i> Add new
</a>
                    </div>
                </div>
            </div>

            <div class="widget-content widget-content-area typo-section">
                <div class="row mb-4">
                    <div class="col-lg-12">



<link rel="stylesheet" type="text/css" href="/plugins/table/datatable/datatables.css">    
<link rel="stylesheet" type="text/css" href="/assets/css/ecommerce/order.css">




<div class="table-responsive mb-4">
    <table id="ecommerce-order-list" class="table table-hover table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Avatar</th>
                <th>Name</th>
                <th>Followed</th>
                <th>Follower</th>
                {{-- <th class="align-center">Status</th> --}}
                {{-- <th class="align-center">Actions</th> --}}
            </tr>
        </thead>
        <tbody>

@forelse($data as $key => $value)

<tr>
<td>{{ $value->id }}</td>
<td>
<div class="usr-img mr-2">
    <img alt="admin-profile" src="{{$value->avatar}}" class="br-30" style="max-height: 150px; max-width: 150px;">
</div>
</td>
<td>{{ $value->username }}</td>
<td>{{ $value->followed_count }}</td>
<td>{{ $value->follower_count }}</td>

</tr>

@empty

<tr>
<td colspan="5" class="text-center">
    No account
</td>
</tr>

@endforelse
        </tbody>

    </table>
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
@endsection
