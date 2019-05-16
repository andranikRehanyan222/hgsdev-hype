@extends('layouts.app')

@section('template_title')
    {!! __('Fuelgram') !!}
@endsection


@section('content')
    

<div id="product-catalog-container" class="container">

    @forelse($data as $key => $value)



        @if($key % 2 == 0)
            <div class="row">
                @endif


                <div class="col-xl-6 col-lg-6 col-md-6 layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-content widget-content-area product-cat1">
                            <div class="mb-4">
                                <div class="order-xl-1 order-md-2 order-sm-1 order-2 product-detailing">
                                    @if(Auth::user()->role == 'admin')
                                        <a href="{{ route('fuelgroups.edit', ['id' => $value->id]) }}" class="btn btn-gradient-primary btn-rounded float-right"><i class="flaticon-edit-6"></i> Edit</a>
                                    @endif

                                    <h3>
                                        <a href="{{ route('fuelgroups.show', ['id' => $value->id]) }}">
                                            {{$value->name}}
                                        </a>
                                    </h3>

                                    <p class="card-text1">${{$value->cost}}</p>

                                    <div class="form-row product-btn-cart">
                                        <div class="form-group col-md-6">
                                            <a class="btn btn-dark" href="{{ route('order.add', ['product' => $value->id]) }}">Add to cart</a>
                                        </div>
                                    </div>

                                    id: {{$value->id}} <br/>
                                    leap: {{$value->leap}} <br/>
                                    is_deleted: <?=$value->is_deleted? 'true' : 'false'?> <br/>
                                    is_disabled: <?=$value->is_disabled? 'true' : 'false'?> <br/>
                                    is_reseller: <?=$value->is_reseller? 'true' : 'false'?> <br/>
                                    duration: {{$value->duration}} <br/>
                                    one_time_payment: <?=$value->one_time_payment? 'true' : 'false'?> <br/>
                                    allow_trial: <?=$value->allow_trial? 'true' : 'false'?> <br/>
                                    trial_duration: {{$value->trial_duration}} <br/>

                                    @if($value->addons())

                                        <div class="border m-1 p-2">
                                            <b>Addons:</b>
                                            <br/>
                                            name: {{$value->addons()->name}}<br/>
                                            required: <?=$value->addons()->required? 'true' : 'false'?><br/>
                                            cost: {{$value->addons()->cost}}<br/>
                                            min_quantity: {{$value->addons()->min_quantity}}<br/>
                                            max_quantity: {{$value->addons()->max_quantity}}<br/>
                                            plan: {{$value->addons()->plan}}<br/>
                                        </div>
                                    @endif





                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @if($key & 1)
            </div>
        @endif

    @empty
        <p>
            No products
        </p>
    @endforelse


</div>



@endsection

