<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fuelgram as Fuelgram;

class AutoroundsController extends Controller
{
    public function index()
    {
    	$fg = new Fuelgram();
    	return view('autoround.index', ['data' => $fg->get_products('autoround')]);
    }
}
