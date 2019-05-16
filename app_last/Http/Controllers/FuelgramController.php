<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fuelgram as Fuelgram;

class FuelgramController extends Controller
{
    public function index()
    {
    	$fg = new Fuelgram();
    	return view('fuelgram.index', ['data' => '']);
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
    
    function users()
    {
    	
    }

}
