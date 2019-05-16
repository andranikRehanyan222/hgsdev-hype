<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fuelgram as Fuelgram;

class FuelgroupsController extends Controller
{
    public function index()
    {
    	$fg = new Fuelgram();
    	return view('fuelgroups.index', ['data' => $fg->get_products('fuelgroup')]);
    }
}
