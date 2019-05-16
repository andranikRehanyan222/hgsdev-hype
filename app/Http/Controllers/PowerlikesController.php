<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fuelgram as Fuelgram;
use App\Product as Product;
use Illuminate\Support\Facades\Session;  
use App\Istripe;


class PowerlikesController extends Controller
{
    public function index(Request $request)
    {

    // session()->pull(['key' => 'default']);
    // session(['key' => time()]);
        // session()->push('key', 'default12');
        // session()->put('key', 'weqwe');
        // session()->save();
        // var_dump($value);
        // Session::save();
        // var_dump(session('key'));
    // $request->session()->put('key', 'value');
        // $request->session()->push('user.teams', 'developers');
        // $value = $request->session()->pull('key', 'default');
// $request->session()->keep(['username', 'email']);
// session()->reflash();
// $request->session()->flush();

// $request->session()->put('key','value');
// $request->session()->save();
//         $data = $request->session()->all();
//         var_dump($data);
//         $value = $request->session()->get('username');
//         var_dump($value);
//         var_dump($value);
// // session()->push('key', 123123123);

//         // dd(session('key'));

//      // Session::put('currency', 5454123);

//         session('key','value');
// session()->save();
//     Session::save();
//              var_dump(Session::get('currency'));
// var_dump(session()->all());
//              return;

        $this->reload();
    	return view('powerlikes.index', ['data' => Product::where('types', 'powerlikes')->where('status',1)->get()]);
    }
    
    public function edit(Product $product)
    {
        // dd($product);
        // dd(Istripe::products());
        // dd(Istripe::skus_delete_all());
        // dd(Istripe::products_delete_all());
        // dd(Istripe::product_find($product));
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
dd(Istripe::orders());

// Istripe::order_create($product);

// dd($stripe);

        if('admin' == Auth()->user()->role){
            return view('powerlikes.edit', ['data' => $product]);
        }
        abort(403, __('Unauthorized'));
    }

    public function update(Request $request, Product $product)
    {
        if('admin' == Auth()->user()->role){
            $product->cost = $request->input('cost');
            $product->save();
            return redirect()->route('powerlikes')->with('success', __('Powerlike successfully updated'));
        }
        abort(403, __('Unauthorized'));
    }
    
    public function show(Product $product)
    {
        return view('powerlikes.show', ['data' => $product]);
    }

    public function reload()
    {
    	$fg = new Fuelgram();
        $powerlikes = $fg->get_products('powerlikes');
    	if(is_array($powerlikes) AND count($powerlikes) > 0){
	    	foreach ($powerlikes as $key => $value) {
	    		$item = Product::where('id_fg', $value->id)->first();
	    		if(!$item){
	    			$item = new Product();
	    			$item->id_fg = $value->id;
                    $item->cost = $value->cost;
	    		}
    			$item->name = $value->name;
    			$item->types = $value->types[0];
    			$item->key = $value->key;
                $item->cost_fg = $value->cost;
    			$item->leap = $value->leap;
    			$item->is_deleted = $value->is_deleted;
    			$item->is_disabled = $value->is_disabled;
    			$item->is_reseller = $value->is_reseller;
    			$item->duration = $value->duration;
    			$item->one_time_payment = $value->one_time_payment;
    			$item->allow_trial = $value->allow_trial;
    			$item->trial_duration = $value->trial_duration;
    			$item->call_to_action = $value->call_to_action;
                if(isset($value->addons->extra_post)){
                    $item->addons = json_encode($value->addons->extra_post);
                }
                else{
                    $item->addons = '';
                }
    			$item->save();
	    	}
        	// return back()->with('success', __('Powerlikes successfully updated'));
	    }
        // return back()->with('error', __('Connection error. Please try again'));
        return true;
    }
}
