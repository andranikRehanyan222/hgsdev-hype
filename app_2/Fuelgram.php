<?php

namespace App;

use \Ixudra\Curl\Facades\Curl;

class Fuelgram {

	private $public_key = '';
	private $private_key = '';

	function __construct()
	{
    	$this->public_key = config('services.fuelgram.public_key');
    	$this->private_key = config('services.fuelgram.private_key');
	}

	function get_list($value='')
	{
		# code...
	}

	function get_products($type='')
	{
		$items = Curl::to('https://fuelgram.com/dev/api/product-types/')
		    ->withHeader('X-Signature: ' . $this->public_key . '&' . $this->private_key)
		    ->asJson()
		    ->get();
		    if($type){
		    foreach ($items as $key => $value) {
		    	if($value->key == $type){
		    		return $value->products[0]->plans;
		    	}
		    }
		}
		else{
			return $items;
		}
	}

	function connect()
	{
		
	return Curl::to('https://fuelgram.com/dev/api/product-types/')
	    ->withHeader('X-Signature: ' . $f_pbk . '&' . $f_prk)
	    ->asJson()
	    ->get();
	}
}
