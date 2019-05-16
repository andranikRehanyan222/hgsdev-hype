@extends('layouts.app')

@section('template_title')
{!! __('Support request') !!}
@endsection

@section('template_linked_css')
<link href="assets/css/ui-kit/custom-typography.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="/plugins/table/datatable/datatables.css">    
<link rel="stylesheet" type="text/css" href="/assets/css/ecommerce/order.css">
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12 pt-3">
                        {{-- <a href="{{ route('accounts.add') }}" class="btn btn-gradient-primary btn-rounded  m-3">
                            <i class="flaticon-edit-6"></i> Add new
                        </a>
                        <input type="hidden" name="lastAccountId" value="{{isset($_GET['account']) ? $_GET['account'] : ''}}"> --}}
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area typo-section">
                <div class="row mb-4">
                    <div class="col-lg-12">
                        <div class="table-responsive mb-4">
                            <table id="ecommerce-order-list" class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>Avatar</th>
                                        <th>Name</th>
                                        <th>Followed</th>
                                        <th>Follower</th>
                                        {{-- <th class="align-center">Status</th> --}}
                                        <th class="align-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($accounts as $key => $value)
                                    <tr>
                                        <td>
                                            <div class="usr-img mr-2">
                                                <a href="{{ route('accounts.show', $value->id) }}">
                                                    <img alt="Profile image" src="{{$value->avatar}}" class="br-30" style="max-height: 150px; max-width: 150px;">
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="{{ route('accounts.show', $value->id) }}">
                                                {{ $value->username }} <i class="flaticon-bar-chart-1"></i>
                                            </a>
                                        </td>
                                        <td>{{ $value->followed_count }}</td>
                                        <td>{{ $value->follower_count }}</td>
                                        <td>
                                            <a href="{{ route('accounts.delete', ['account' => $value->id]) }}"  onclick="return confirm('Are you sure you want to delete this account?');">
                                                <i class="flaticon-delete-1"></i>
                                            </a>
                                        </td>

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
@endsection


@section('template_scripts')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
    var base_url = '{{ URL::to('/')}}';
    function support(insta_id){
        swal({
            title: "Are you sure?",
            text: "Do you want to generate support request?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url:base_url+'/support/add/'+insta_id,
                    method:'get',
                    success:function(data){
                        if(data == '1'){
                            swal("Support request generated, Admin will resolve it shortly.", {
                                icon: "success",
                            });
                        }else{
                            swal("Sorry, Something went wrong please try again later!");
                        }
                        $('.close').trigger('click');
                    }
                });
            }
        });
    }
</script>
@endsection
