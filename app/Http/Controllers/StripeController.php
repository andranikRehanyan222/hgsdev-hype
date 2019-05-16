<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
// use \PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;

use App\Fuelgram as Fuelgram;
use App\Product as Product;
use App\Order as Order;
use App\Account as Account;
use App\Istripe;
use Session;

class StripeController extends Controller
{
    public function payment(Request $request, Order $order)
    {

    $token  = $request->input('stripeToken');
    // $email  = $request->input('email');
    // $customer = Istripe::customer_create($email, $token);
    // dd($customer);

    //item information
    // $itemName = "Premium Script CodexWorld";
    // $itemNumber = "PS123456";
    // $itemPrice = 55;
    // $currency = "usd";
    // $orderID = "SKA92712382139";
    
    // //charge a credit or a debit card
    // $charge = Istripe::charge_create(
    //     $customer->id,
    //     $itemPrice,
    //     $currency,
    //     $itemName,
    //     $orderID
    // );
    $charge = Istripe::charge_create($order, $token);

    dd($charge['status']);

    // $name = $_POST['name'];
    // $card_num = $_POST['card_num'];
    // $card_cvc = $_POST['cvc'];
    // $card_exp_month = $_POST['exp_month'];
    // $card_exp_year = $_POST['exp_year'];
        dd($order);
    }

    public function create(Request $request, Product $product)
    {

        if('' == $product->stripe_product){
            $item = Istripe::product_create($product);
            $product->stripe_product = $item['id'];
            $product->save();
            echo 'created';
        }
        if('' == $product->stripe_sku){
            $item = Istripe::sku_create($product);
            $product->stripe_sku = $item['id'];
            $product->save();
            echo 'created';
        }

        $account = Account::findOrFail($request->input('account'));

        $order = new Order();
        $order->id_product = $product->id;
        $order->id_user = Auth()->id();
        $order->id_account = $account->id;
        $order->text = $product->name;
        $order->cost = $product->cost;
        $order->product_json = $product->toJson();
        $order->transaction_status = $order->status = 'new';
        $order->save();

        $item = Istripe::order_create($product); 
        $order->payment_id = $item['id'];
        $order->save();
 
        return view('stripe.pay', ['data' => $order]);

    }
}
