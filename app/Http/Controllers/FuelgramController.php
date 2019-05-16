<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fuelgram as Fuelgram;
use App\Product as Product;

class FuelgramController extends Controller
{
    public function index()
    {
    	$fg = new Fuelgram();
        $fuelgroup = $fg->get_products('fuelgroup');
        $arrayList = [];

        if(is_array($fuelgroup)){
            foreach ($fuelgroup as $key => $value) {
                $arrayList[] = $value->id;
            }
        }

        $products = Product::whereIn('id_fg', $arrayList)->get();
    	return view('fuelgram.index', ['data' => $products]);
    }

    function create_user()
    {
    	$fuelgram = new Fuelgram();
    	$fuelgram->create_account();
    }
    
    function get_accounts()
    {
    	$fuelgram = new Fuelgram();
    	$fuelgram->get_accounts();
    }
    
    function get_autoengagementgroups()
    {
        $fuelgram = new Fuelgram();
        $fuelgram->get_autoengagementgroups();
    }
    
    function get_receivers()
    {
        $fuelgram = new Fuelgram();
        $fuelgram->get_receivers();
    }
    
    function get_niches()
    {
        $fuelgram = new Fuelgram();
        $fuelgram->get_niches();
    }
    
    function products_settings()
    {
        $fuelgram = new Fuelgram();
        $fuelgram->products_settings(25);
    }
    
    function get_account_check()
    {
        $fuelgram = new Fuelgram();
        $fuelgram->get_account_check(11528219535);
    }
    
    function get_account_retrieve()
    {
        $fuelgram = new Fuelgram();
        $fuelgram->get_account_retrieve(11528219535);
    }
    
    function users()
    {
    	
    }

}
