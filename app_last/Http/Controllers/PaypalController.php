<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fuelgram as Fuelgram;
use App\Paypal as Paypal;
use App\Order as Order;

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
        // $request->session()->push('key', 'value');
        // dd($request->session()->get('key'));
        $paypalHelper = new Paypal;
        $randNo = (string)rand(10000,20000);

$item = Order::findOrFail($request->input('order_id'));
if($item->id_user == Auth()->id()){

$orderData = '{
  "intent": "CAPTURE",
    "purchase_units" : [ 
        {
            "reference_id" : "PU1",
            "app-name" : "Client ' . Auth()->id() . '",
            "description" : "Hgsdev Shop",
            "invoice_id" : "' . $item->id . '",
            "custom_id" : "Client ' . Auth()->id() . '",
            "amount" : {
                "currency_code" : "USD",
                "value" : "' . $item->cost . '",
                "breakdown" : {
                    "item_total" : {
                        "currency_code" : "USD",
                        "value" : "' . $item->cost . '"
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
                "name" : "' . $item->text . '",
                "description" : "' . $item->text . '",
            "app-name" : "Client ' . Auth()->id() . '",
                "sku" : "sku01",
                "unit_amount" : {
                    "currency_code" : "USD",
                    "value" : "' . $item->cost . '"
                },
                "quantity" : "1",
                "category" : "PHYSICAL_GOODS"
            }]
        }
    ]
}';
$orderData = '{
  "intent": "CAPTURE",
  "purchase_units": [
    {
      "amount": {
        "currency_code": "USD",
        "value": "5.00"
      }
    }
  ]
}';
\Debugbar::disable();
echo json_encode($paypalHelper->orderCreate($orderData));

}
    }
}
