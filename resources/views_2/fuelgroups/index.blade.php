@extends('layouts.app')

@section('template_title')
    {!! __('Fuelgroups') !!}
@endsection


@section('content')
    

<div id="product-catalog-container" class="container">

@foreach($data as $key => $value)



@if($key % 2 == 0)
<div class="row">
@endif

{{-- {{dd($value)}} --}}

<div class="col-xl-6 col-lg-6 col-md-6 layout-spacing">
    <div class="statbox widget box box-shadow">
        <div class="widget-content widget-content-area product-cat1">
            <div class="mb-4">
                <div class="order-xl-1 order-md-2 order-sm-1 order-2">
                    <h3>{{$value->name}}</h3>
                    <p class="card-text1">${{$value->cost}}</p>
id: {{$value->id}} <br/>
leap: {{$value->leap}} <br/>
is_deleted: <?=$value->is_deleted? 'true' : 'false'?> <br/>
is_disabled: <?=$value->is_disabled? 'true' : 'false'?> <br/>
is_reseller: <?=$value->is_reseller? 'true' : 'false'?> <br/>
duration: {{$value->duration}} <br/>
one_time_payment: <?=$value->one_time_payment? 'true' : 'false'?> <br/>
allow_trial: <?=$value->allow_trial? 'true' : 'false'?> <br/>
trial_duration: {{$value->trial_duration}} <br/>

                    @if(isset($value->addons->extra_account))<br/>
Addons:<br/>
name: {{$value->addons->extra_account->name}}<br/>
required: <?=$value->addons->extra_account->required? 'true' : 'false'?><br/>
cost: {{$value->addons->extra_account->cost}}<br/>
min_quantity: {{$value->addons->extra_account->min_quantity}}<br/>
max_quantity: {{$value->addons->extra_account->max_quantity}}<br/>
plan: {{$value->addons->extra_account->plan}}<br/>

<!--
<?var_dump($value->addons->extra_account)?>
-->
                    @endif





                </div>
            </div>
        </div>
    </div>
</div>

@if($key & 1)
</div>
@endif

@endforeach


</div>



@endsection

