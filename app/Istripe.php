<?php
namespace App;

use Cartalyst\Stripe\Stripe;

class Istripe
{
	public static function connect(){
		return Stripe::make(config('services.stripe.secret'));
	}

	public static function plans_all()
	{
		$stripe = self::connect();
		return $stripe->plans()->all()['data'];
	}

	public static function products()
	{
		return self::connect()->products()->all()['data'];
	}

	public static function products_delete_all()
	{
		foreach (self::products() as $key => $value) {
			self::product_delete($value['id']);
		}
		return 'gg';
	}


	public static function product_find_or_create($product){
		foreach (self::products() as $key => $value) {
			if($product['stripe_sku'] == $value['id']){
				return $value;
			}
		}
		$item = self::product_find();
	}

	public static function product_delete($id)
	{
		return self::connect()->products()->delete($id);
	}

	public static function sku_delete($id)
	{
		return self::connect()->skus()->delete($id);
	}
	
	public static function skus_delete_all()
	{
		foreach (self::skus() as $key => $value) {
			self::sku_delete($value['id']);
		}
		return 'skus_delete_all';
	}

	public static function product_find(Product $product)
	{
		$stripe = self::connect();
	    try {
			return $stripe->products()->find($product->stripe_product);
	    }
		catch (\Cartalyst\Stripe\Exception\NotFoundException $e) {
			return FALSE;
			// return self::product_create($product);
			// $message = $e->getMessage();
			// dd($message);
		}
	}

	public static function product_create($product)
	{
		$stripe = self::connect();
		return $stripe->products()->create([
		    'name'        => $product->name,
		    'description' => $product->addons,
		]);
	}
	
	public static function sku_create(Product $product)
	{
		$cost = $product->cost;// > 0 ? $product->cost * 100 : 0;
		$stripe = self::connect();
		return $stripe->skus()->create([
		    'product'   => $product->stripe_product,
		    'price'     => (int)$cost,
		    'currency'  => 'usd',
		    'inventory' => [
		        'type'     => 'finite',
		        'quantity' => 1000
		    ],
		]);
	}
	
	public static function plans_create()
	{
		$stripe = self::connect();
				
		return $stripe->plans()->create([
		    'id'                   => 'monthly',
		    'name'                 => 'Monthly (30$)',
		    'amount'               => 30.00,
		    'currency'             => 'USD',
		    'interval'             => 'month', 
		    'statement_descriptor' => 'Monthly to Foo Bar',
		]);
	}

	public static function sku_find_or_create($product){
		dd($product->stripe_sku);
		foreach (self::skus() as $key => $value) {
			if($product->stripe_sku == $value['id']){
				return $value;
			}
		}
		$item = self::product_find();
	}

	public static function skus(){
		return self::connect()->skus()->all()['data'];
	}

	public static function order_create(Product $product){
$stripe = self::connect();
$order = $stripe->orders()->create([
    'currency' => 'usd',
    'items' => [
        [
            'type'   => 'sku',
            'parent' => $product->stripe_sku,
        ],
    ],
    'shipping' => [
        'name'    => Auth()->user()->name,
        'address' => [
            'line1'       => '1234 Main street',
            'city'        => 'Anytown',
            'country'     => 'US',
            'postal_code' => '123456',
        ],
    ],
    'email' => Auth()->user()->email
]);
	}

	public static function orders(){
		return self::connect()->orders()->all()['data'];
	}

	public static function customer_create($email, $token){

    return self::connect()->customer->create([
        'email' => $email,
        'source'  => $token
    ]
	);
    
	}
	public static function charge_create($order, $token){

    return self::connect()->charges()->create([
    'amount' => $order->cost,
    'currency' => 'usd',
    'description' => $order->text,
    'source' => $token,
    ]
	);
    
	}

	public static function events(){
		return self::connect()->events()->all();
	}

	public static function account(){
		return self::connect()->account()->details();
	}
	
	public static function balance(){
		return self::connect()->balance()->current();
	}
	
}
