<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fuelgram as Fuelgram;

class PowerlikesController extends Controller
{
    public function index()
    {
    	$fg = new Fuelgram();
    	return view('powerlikes.index', ['data' => $fg->get_products('powerlikes')]);
    }
}
