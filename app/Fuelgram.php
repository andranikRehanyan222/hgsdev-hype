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

	function get_data($url, $array = [], $method = 'get')
	{
		// echo "$url, , $method";
		// var_dump($array);
		$data = Curl::to($url)
			    ->withHeader('X-Signature: ' . $this->public_key . '&' . $this->private_key)
			    ->withResponseHeaders()
			    ->returnResponseObject()
	    		->asJson()
			    ;
			    if(count($array) > 0){
		$data
		->withData($array)
		;
			    }
			    // dd($data->post());
		return $data->$method();
	}

	function create_account($username, $password)
	{
#vipap_net
#vipap@ukr.net
		$data = $this->get_data('https://fuelgram.com/dev/api/clients/' . $this->public_key . '/accounts/',
		['username'=> $username, 'password' => $password], 'post');
		/*

gr_username
gr_user
gr_id

follower_count
followed_count
media_count
ig_avatar
ig_status



username
user
id

follower_count
followed_count
media_count
avatar
status


  {"username":"vipap_net","user":34656,"id":11528219535,"follower_count":0,"followed_count":0,"media_count":0,"avatar":"https://scontent-arn2-1.cdninstagram.com/vp/afc529aef88738c30b067660bc4b1ed8/5D112A7C/t51.2885-19/51628724_2552552298107352_3130642666107174912_n.jpg?_nc_ht=scontent-arn2-1.cdninstagram.com","status":"unknown"}

  {"avatar":"https://scontent-arn2-1.cdninstagram.com/vp/afc529aef88738c30b067660bc4b1ed8/5D112A7C/t51.2885-19/51628724_2552552298107352_3130642666107174912_n.jpg?_nc_ht=scontent-arn2-1.cdninstagram.com","followed_count":0,"follower_count":0,"id":11528219535,"media_count":0,"status":"unknown","user":34656,"username":"vipap_net"}

		*/
		return $data;

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://fuelgram.com/dev/api/clients/'.$this->public_key.'/accounts/",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => false,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS =>"{\"username\":{{account_username}},\"password\":{{account_password}},\"country\": {{optional_account_country_two_letter_code}}}",
  CURLOPT_HTTPHEADER => array(
    "Content-Type: application/json",
    // "X-Signature: public_key&private_key"
    'X-Signature: ' . $this->public_key . '&' . $this->private_key
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
} 
	}

	function get_accounts()
	{
		dd($this->get_data('https://fuelgram.com/dev/api/clients/' . $this->public_key . '/accounts/'));
	}

	function get_account_check($account_id)
	{
		dd($this->get_data('https://fuelgram.com/dev/api/clients/' . $this->public_key . '/accounts/' . $account_id . '/check/', [], 'post'));
	}

	function get_account_retrieve($account_id)
	{
		dd($this->get_data('https://fuelgram.com/dev/api/clients/' . $this->public_key . '/accounts/' . $account_id . '/'));
	}

	function set_account_update($account_id, $username, $password)
	{
		$data = $this->get_data('https://fuelgram.com/dev/api/clients/' . $this->public_key . '/accounts/' . $account_id . '/',
		[
			'username'=> $username, 
			'password' => $password
		], 'put');
	}


	function get_receivers()
	{
		dd($this->get_data('https://fuelgram.com/dev/api/clients/' . $this->public_key . '/receivers/'));
	}

	function get_autoengagementgroups()
	{
		dd($this->get_data('https://fuelgram.com/dev/api/autoengagementgroups/'));
	}

	function products_settings($product_id)
	{
		dd($this->get_data('https://fuelgram.com/dev/api/clients/' . $this->public_key . '/products/' . $product_id . '/settings/'));
	}


	function get_niches()
	{
		dd($this->get_data('https://fuelgram.com/dev/api/niches/'));
	}

	function get_products_powerlikes()
	{
		return $this->get_products('');
	}

	function get_products($type='')
	{
		$items = $this->get_data('https://fuelgram.com/dev/api/product-types/');
	    if(isset($items->status, $items->content) AND $items->status == 200 AND $type != ''){
		    foreach ($items->content as $key => $value) {
		    	if($value->key == $type){
		    		return $value->products[0]->plans;
		    	}
		    }
		    return [];
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
