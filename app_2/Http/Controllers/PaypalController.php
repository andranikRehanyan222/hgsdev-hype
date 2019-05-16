<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fuelgram as Fuelgram;

use Srmklive\PayPal\Services\ExpressCheckout;
use Srmklive\PayPal\Services\AdaptivePayments;


class PaypalController extends Controller
{
    public function index()
    {
$provider = new AdaptivePayments;     // To use adaptive payments.

// Change the values accordingly for your application
$data = [
    'receivers'  => [
        [
            'email' => 'johndoe@example.com',
            'amount' => 10,
            'primary' => true,
        ],
        [
            'email' => 'janedoe@example.com',
            'amount' => 5,
            'primary' => false
        ]
    ],
    'payer' => 'EACHRECEIVER', // (Optional) Describes who pays PayPal fees. Allowed values are: 'SENDER', 'PRIMARYRECEIVER', 'EACHRECEIVER' (Default), 'SECONDARYONLY'
    'return_url' => url('payment/success'), 
    'cancel_url' => url('payment/cancel'),
];

$response = $provider->createPayRequest($data);
    	var_dump($response);
    	return 11;
    }
}
