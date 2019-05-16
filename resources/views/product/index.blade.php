@extends('layouts.app')

@section('template_title')
    {{ __('Products') }}
@endsection

@section('template_linked_css')
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    @include('laravelusers::partials.styles')
    @include('laravelusers::partials.bs-visibility-css')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {!! 'Showing All Products' !!}
                            </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive users-table">
                            <table class="table table-striped table-sm data-table" id="productTable">
                                <thead class="thead">
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Type</th>
                                        <th>Price</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $key => $product)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{ucfirst($product->name)}}</td>
                                            <td>{{ucfirst($product->types)}}</td>
                                            <td>{{$product->cost}}</td>
                                            <td><span id="status_{{$product->id}}" onclick="updateStatus(this,'{{$product->id}}')" data-status="{{$product->status}}" class="btn btn-sm btn-{{$product->status ? 'success' : 'danger'}}">{{$product->status ? 'Active' : 'De-Actived'}}</span></td>
                                            <td>
                                                <a href="{{route('product.edit', $product->id)}}" class="btn btn-default btn-sm"><i class="icon-search"></i> Edit</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('template_scripts')
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
        $('#productTable').dataTable();
        var base_url = '{{URL::to('/')}}';

        function updateStatus(input,id){
        var status = $(input).attr('data-status');
        swal({
            title: "Are you sure?",
            text: "Do you want to change status of product",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url:base_url+'/changeProductStatus/'+id,
                    method:'get',
                    success:function(data){
                        if(data == '1'){
                            if(status == '1'){
                                $(input).removeClass('btn-success');
                                $(input).addClass('btn-danger');
                                $(input).html('De-Actived');
                            }else{
                                $(input).removeClass('btn-danger');
                                $(input).addClass('btn-success');
                                $(input).html('Active');
                            }
                            $(input).attr('data-status',status == 1 ?0:1);
                            swal("Status has been changed", {
                                icon: "success",
                            });
                        }else{
                            swal("Sorry, Something went wrong please try again later!");
                        }
                    }
                });
            }
        });
    }
    </script>

@endsection
