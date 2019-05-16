<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fuelgram as Fuelgram;


class ProfileController extends Controller
{
    public function index()
    {
    	$fg = new Fuelgram();
    	return view('profile.index', ['data' => '']);
    }
}
