<?php 

include_once('Config/Config.php');
include_once('Helpers/PayPalHelper.php');

$paypalHelper = new PayPalHelper;
$randNo= (string)rand(10000,20000);
/*item_amt: 300
tax_amt: 5
handling_fee: 5
insurance_fee: 10
shipping_amt: 2
shipping_discount: 2
total_amt: 320
currency: USD
return_url: http://127.0.0.1:8000/paypal-test/pages/success.php?commit=false
cancel_url: http://127.0.0.1:8000/paypal-test/pages/cancel.php*/
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
            "invoice_id" : "INV-CameraShop-'.$randNo.'",
            "custom_id" : "CUST-CameraShop",
            "amount" : {
                "currency_code" : "'.$_POST['currency'].'",
                "value" : "'.$_POST['total_amt'].'",
                "breakdown" : {
                    "item_total" : {
                        "currency_code" : "'.$_POST['currency'].'",
                        "value" : "'.$_POST['item_amt'].'"
                    },
                    "shipping" : {
                        "currency_code" : "'.$_POST['currency'].'",
                        "value" : "'.$_POST['shipping_amt'].'"
                    },
                    "tax_total" : {
                        "currency_code" : "'.$_POST['currency'].'",
                        "value" : "'.$_POST['tax_amt'].'"
                    },
                    "handling" : {
                        "currency_code" : "'.$_POST['currency'].'",
                        "value" : "'.$_POST['handling_fee'].'"
                    },
                    "shipping_discount" : {
                        "currency_code" : "'.$_POST['currency'].'",
                        "value" : "'.$_POST['shipping_discount'].'"
                    },
                    "insurance" : {
                        "currency_code" : "'.$_POST['currency'].'",
                        "value" : "'.$_POST['insurance_fee'].'"
                    }
                }
            },
            "items" : [{
                "name" : "DSLR Camera",
                "description" : "Black Camera - Digital SLR",
                "sku" : "sku01",
                "unit_amount" : {
                    "currency_code" : "'.$_POST['currency'].'",
                    "value" : "'.$_POST['item_amt'].'"
                },
                "quantity" : "1",
                "category" : "PHYSICAL_GOODS"
            }]
        }
    ]
}';

if(array_key_exists('shipping_country_code', $_POST)) {

    $orderDataArr = json_decode($orderData, true);
	$orderDataArr['application_context']['shipping_preference'] = "SET_PROVIDED_ADDRESS";
	$orderDataArr['application_context']['user_action'] = "PAY_NOW";
	
    $orderDataArr['purchase_units'][0]['shipping']['address']['address_line_1']= $_POST['shipping_line1'];
    $orderDataArr['purchase_units'][0]['shipping']['address']['address_line_2']= $_POST['shipping_line2'];
    $orderDataArr['purchase_units'][0]['shipping']['address']['admin_area_2']= $_POST['shipping_city'];
    $orderDataArr['purchase_units'][0]['shipping']['address']['admin_area_1']= $_POST['shipping_state'];
    $orderDataArr['purchase_units'][0]['shipping']['address']['postal_code']= $_POST['shipping_postal_code'];
    $orderDataArr['purchase_units'][0]['shipping']['address']['country_code']= $_POST['shipping_country_code'];

    $orderData = json_encode($orderDataArr);
}

// var_dump($orderData);exit;
header('Content-Type: application/json');
echo json_encode($paypalHelper->orderCreate($orderData));
