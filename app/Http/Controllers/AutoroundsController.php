<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fuelgram as Fuelgram;
use App\Product as Product;

class AutoroundsController extends Controller
{
    public function index()
    {
        $this->reload();
    	return view('autoround.index', ['data' => Product::where('types', 'autoround')->where('status',1)->get()]);
    }
    
    public function edit(Product $product)
    {
        if('admin' == Auth()->user()->role){
            return view('autoround.edit', ['data' => $product]);
        }
        abort(403, __('Unauthorized'));
    }

    public function update(Request $request, Product $product)
    {
        if('admin' == Auth()->user()->role){
            $product->cost = $request->input('cost');
            $product->save();
            return redirect()->route('autorounds')->with('success', __('Autoround successfully updated'));
        }
        abort(403, __('Unauthorized'));
    }

    public function show(Product $product)
    {
    	return back();
    }

    public function reload()
    {
    	$fg = new Fuelgram();
        $autoround = $fg->get_products('autoround');
    	if(is_array($autoround) AND count($autoround) > 0){
	    	foreach ($autoround as $key => $value) {
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
    			if(isset($value->addons->extra_account)){
					$item->addons = json_encode($value->addons->extra_account);
    			}
                else{
                    $item->addons = '';
                }
    			$item->save();
	    	}
        	// return back()->with('success', __('Autorounds successfully updated'));
	    }
    	// return back()->with('error', __('Connection error. Please try again'));
        return true;
    }
}
