@extends('layouts.app')

@section('template_title', __('Home page'))

@section('content')


<style>
#home_page .icon-item i{
  font-size: 4em;
  display: block;
}
</style>

<div class="container" id="home_page">
<div class="card">


<div class="card-body">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    
<div class="row">
    <div class="col-md-6 text-center icon-item">
        @if(Auth::user()->role == 'admin')
        <a href="{{ route('users') }}"><i class="flaticon-user-group"></i>
            Users
        </a>
        @endif
    </div>

</div>
                    

        </div>
    </div>
</div>

@endsection
