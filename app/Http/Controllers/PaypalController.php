<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fuelgram as Fuelgram;
use App\Paypal as Paypal;

class PaypalController extends Controller
{

    public function capture(Request $request)
    {
        \App\Drm::_($request->all());
        var_dump($request->method());
        dd($request->all());
    }
    public function create(Request $request)
    {
        $paypalHelper = new Paypal;
        $randNo = (string)rand(10000,20000);

$orderData = '{
    "intent" : "CAPTURE",
    "application_context" : {
        "return_url" : "",
        "cancel_url" : ""
    },
    "purchase_units" : [ 
        {
            "reference_id" : "PU1",
            "description" : "Camera Shop",
            "invoice_id" : "'.$request->input('order_id').'",
            "custom_id" : "{{ Auth()->id() }}",
            "amount" : {
                "currency_code" : "USD",
                "value" : "300",
                "breakdown" : {
                    "item_total" : {
                        "currency_code" : "USD",
                        "value" : "300"
                    },
                    "shipping" : {
                        "currency_code" : "USD",
                        "value" : "0"
                    },
                    "tax_total" : {
                        "currency_code" : "USD",
                        "value" : "0"
                    },
                    "handling" : {
                        "currency_code" : "USD",
                        "value" : "0"
                    },
                    "shipping_discount" : {
                        "currency_code" : "USD",
                        "value" : "0"
                    },
                    "insurance" : {
                        "currency_code" : "USD",
                        "value" : "0"
                    }
                }
            },
            "items" : [{
                "name" : "DSLR Camera",
                "description" : "Black Camera - Digital SLR",
                "sku" : "sku01",
                "unit_amount" : {
                    "currency_code" : "USD",
                    "value" : "300"
                },
                "quantity" : "1",
                "category" : "PHYSICAL_GOODS"
            }]
        }
    ]
}';

\Debugbar::disable();
echo json_encode($paypalHelper->orderCreate($orderData));
    }
}
