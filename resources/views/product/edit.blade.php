@extends('layouts.app')

@section('template_title')
    {{ __('Products') }}
@endsection

@section('template_linked_css')
    @include('laravelusers::partials.styles')
    @include('laravelusers::partials.bs-visibility-css')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            {!! 'Edit Product : '.ucfirst($product->name) !!}
                        </div>
                    </div>
                    <div class="card-body">
                        {!! Form::open(array('route' => ['product.update', $product->id], 'method' => 'POST', 'role' => 'form', 'class' => 'needs-validation')) !!}
                            {!! csrf_field() !!}
                            <div class="form-group has-feedback row {{ $errors->has('cost') ? ' has-error ' : '' }}">
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('cost', $product->cost, array('id' => 'cost', 'class' => 'form-control', 'placeholder' => 'Price')) !!}
                                        <div class="input-group-append">
                                            <label class="input-group-text" for="cost">
                                                {!! 'Price' !!}
                                            </label>
                                        </div>
                                    </div>
                                    @if ($errors->has('cost'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('cost') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    {!! Form::button('Update Product', array('class' => 'btn btn-success margin-bottom-1 mt-3 mb-2 btn-save','type'=>'submit')) !!}
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('template_scripts')
    @if(config('laravelusers.tooltipsEnabled'))
        @include('laravelusers::scripts.tooltips')
    @endif
@endsection