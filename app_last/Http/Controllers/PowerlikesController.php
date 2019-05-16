<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fuelgram as Fuelgram;
use App\Product as Product;

class PowerlikesController extends Controller
{
    public function index()
    {
    	return view('powerlikes.index', ['data' => Product::where('types', 'powerlikes')->get()]);
    }
    
    public function edit(Product $id)
    {
        if('admin' == Auth()->user()->role){
            return view('powerlikes.edit', ['data' => $id]);
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
    
    public function show(Product $id)
    {
        return view('powerlikes.show', ['data' => $id]);
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
        	return back()->with('success', __('Powerlikes successfully updated'));
	    }
        return back()->with('error', __('Connection error. Please try again'));
    }
}
