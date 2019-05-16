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
use Session;

class PaymenttestController extends Controller
{
    public function __construct()
    { 
        /** PayPal api context **/
        $paypal_conf = \Config::get('paypal');
        // dd($paypal_conf);
        $this->_api_context = new \PayPal\Rest\ApiContext(new OAuthTokenCredential(
            config('paypal.sandbox.secret'),
            config('paypal.sandbox.certificate')
        )
        );
        $this->_api_context->setConfig(config('paypal.setting'));
    }

    public function index(Request $request)
    {
        dd(time());
    }

    public function create(Request $request, Product $product)
    {
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

        $payer = new Payer();
        $payer->setPaymentMethod('paypal'); 
        $item_1 = new Item();
        $item_1->setName($product->name) /** item name **/
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice($order->cost); /** unit price **/
            
        $item_list = new ItemList();
        $item_list->setItems(array($item_1));
        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($product->cost);
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Your transaction description');
 
        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(route('paymenttest.return')) /** Specify return URL **/
            ->setCancelUrl(route('paymenttest.cancel'));
 
        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
        /** dd($payment->create($this->_api_context));exit; **/
        try {
            $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PPConnectionException $ex) {

            if (\Config::get('app.debug')) { 
                \Session::put('error', 'Connection timeout');
                return Redirect::route('paywithpaypal');
            } else {
                \Session::put('error', 'Some error occur, sorry for inconvenient');
                return Redirect::route('paywithpaypal');
            }
        }
 
        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }
 
        /** add payment ID to session **/
        session(['paypal_payment_id' => $payment->getId() ]);
        $order->payment_id = $payment->getId();
        $order->save();
 
        if (isset($redirect_url)) {
            /** redirect to paypal **/
            return redirect($redirect_url);
        }
 
        \Session::put('error', 'Unknown error occurred');
        return Redirect::route('paywithpaypal');
 
    }


    public function getPaymentStatus(Request $request)
    {
        /** Get the payment ID before session clear **/
        $payment_id = session('paypal_payment_id');
        $order = Order::where('payment_id', $payment_id)->first();
        if($order AND $order->payment_id == $request->input('paymentId')){
     
            /** clear the session payment ID **/
            
            // Session::forget('paypal_payment_id');

            if (empty($request->input('PayerID')) || empty($request->input('token'))) {
     
                \Session::put('error', 'Payment failed');
                return Redirect::route('/');
     
            }
     
            $payment = Payment::get($payment_id, $this->_api_context);
            $execution = new PaymentExecution();
            $execution->setPayerId($request->input('PayerID'));
     
            /**Execute the payment **/
            $result = $payment->execute($execution, $this->_api_context);

            if ($result->getState() == 'approved') {
                $order->transaction_id = $result->transactions[0]->related_resources[0]->sale->id;
                $order->transaction_status = $result->transactions[0]->related_resources[0]->sale->state;
                $order->transaction_cost = $result->transactions[0]->related_resources[0]->sale->amount->total;
                $order->payer_id = $request->input('PayerID');
                $order->save();
                return redirect()->route('order.show', ['order' => $order->id])->with('success', __('Payment success'));
            }
     
     }
 dd('Payment failed');
        \Session::put('error', 'Payment failed');
        return Redirect::route('/');
 
    }
        public function cancel()
    {
        $payment_id = Session::get('paypal_payment_id');
 
        dd('cancel');
    }
}
