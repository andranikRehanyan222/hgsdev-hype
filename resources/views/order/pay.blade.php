@extends('layouts.app')

@section('template_title')
    {!! __('Order ') !!}
    "{!! $data->id !!}"
@endsection


@section('template_linked_css')
    <link rel="stylesheet" type="text/css" href="/plugins/dropify/dropify.min.css">
    <link href="/assets/css/users/account-setting.css" rel="stylesheet" type="text/css" />
@endsection



@section('content')
    

<!-- HTML Content -->
<div class="row-fluid">
    <!-- Middle Section -->
        <form class="form-horizontal">
            <!-- Checkout Options -->
            <div class="form-group">
                <div class="col-sm-offset-5 col-sm-7">
                    <input type="hidden" id="order_id" name="order_id" value="{{$data->id}}">
                    <!-- Container for PayPal Shortcut Checkout -->
                    <div id="paypalCheckoutContainer"></div>

                    <!-- Container for PayPal Mark Redirect -->
                    <div id="paypalMarkRedirect">
                        <h4 class="text-center">OR</h4>
                        <a class="btn btn-primary btn-block" href="pages/shipping.php" role="button">
                            <h4>Proceed to Checkout</h4>
                        </a>
                    </div>
                </div>
            </div>
        </form>

</div>


@endsection


@section('template_scripts')

<!-- Javascript Import -->
<script src="https://www.paypal.com/sdk/js?client-id=ASyZxhZ6NjGMdcRQ1fZrZBBbvEiMtneEnEFUKvpsKVRJdKOTd5moanMRlVKJF-tFQbjj6q4vrTUzz4pI&commit=false"></script>
<script src="/paypal-test/js/config.js"></script>

<!-- PayPal In-Context Checkout script -->
<script type="text/javascript">
    paypal.Buttons({

        // Set your environment
        env: 'sandbox',

        // Set style of buttons
        style: {
            layout: 'horizontal',   // horizontal | vertical
            size:   'responsive',   // medium | large | responsive
            shape:  'pill',         // pill | rect
            color:  'gold',         // gold | blue | silver | black,
            fundingicons: false,    // true | false,
            tagline: false          // true | false,
        },

        // Wait for the PayPal button to be clicked
        createOrder: function() {
            let formData = new FormData();
            formData.append('order_id', document.getElementById("order_id").value);
            formData.append('return_url',  'http://127.0.0.1:8000/paypal-test/pages/success.php' + '?commit=false');
            formData.append('cancel_url', 'http://127.0.0.1:8000/paypal-test/pages/cancel.php');

            return fetch(
                // '/paypal-test/api/createOrder.php',
                '/paypal/create',
                {
                    method: 'POST',
                    body: formData
                }
            ).then(function(response) {
                return response.json();
            }).then(function(resJson) {
                console.log('Order ID: '+ resJson.data.id);
                return resJson.data.id;
            });
        },
    onApprove: function(data, actions) {
        console.dir(data);
        console.log(JSON.stringify({orderID: data.orderID}));
        console.log(JSON.stringify(data, null, "    "));
        alert(1);
      return actions.order.capture().then(function(details) {
        
        alert(2);
        // alert('Transaction completed by ' + details.payer.name.given_name);
        // Call your server to save the transaction
        // console.dir(data);
        // console.log(JSON.stringify({orderID: data.orderID}));
        // console.log(JSON.stringify(data, null, "    "));
        // return fetch('/paypal-transaction-complete', {
        //   method: 'post',
        //   body: JSON.stringify({
        //     orderID: data.orderID
        //   })
        // });
      });
    },
    onError: ( error ) => {
        console.log('error',error);
    }

        // Wait for the payment to be authorized by the customer
        // onApprove: function(data, actions) {
        //     return fetch(
        //         '/paypal-test/api/getOrderDetails.php',
        //         {
        //             method: 'GET'
        //         }
        //     ).then(function(res) {
        //         console.dir('Order ID1: '+ res);
        //         console.log('Order data1: '+ JSON.stringify(res.data));
        //         return res.json();
        //     }).then(function(res) {
        //         console.dir('Order ID2: '+ res);
        //         console.log('Order data2: '+ JSON.stringify(res.data));
        //         // window.location.href = '/paypal-test/pages/success.php';
        //     });
        // }

    }).render('#paypalCheckoutContainer');

</script>

@endsection

