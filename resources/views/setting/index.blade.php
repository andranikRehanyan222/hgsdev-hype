@extends('layouts.app')

@section('template_title')
    {!! __('Setting') !!}
@endsection


@section('template_linked_css')
    <link href="/assets/css/pages/contact_us.css" rel="stylesheet" type="text/css" />
@endsection



@section('content')
    

<div class="container">                    
    <div class="contact-us layout-spacing">
        <div class="cu-contact-section">                           
            	<h3>
            		On this page you can edit settings:
            	</h3>
<ul>
	<li>
		<a href="{{ route('setting.paypal') }}">PayPal</a>
	</li>
    <li>
        <a href="{{ route('setting.stripe') }}">Stripe</a>
    </li>
</ul>
        </div>
    </div>
</div>


        <!--  END CONTENT PART  -->



@endsection


@section('template_scripts')
    <script src="/assets/js/users/calendar.js"></script>
    <script src="/assets/js/users/custom-profile.js"></script>
@endsection
