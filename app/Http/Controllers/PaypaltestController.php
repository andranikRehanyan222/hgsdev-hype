<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fuelgram as Fuelgram;

use Srmklive\PayPal\Services\ExpressCheckout;
use Srmklive\PayPal\Services\AdaptivePayments;


class PaypaltestController extends Controller
{
    public function index()
    {
        // dd(config('paypal.sandbox.secret'));
    	return view('paypal.jl_index');
    }
}
