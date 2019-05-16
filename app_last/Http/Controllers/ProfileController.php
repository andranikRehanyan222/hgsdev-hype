<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User as User;
use App\Fuelgram as Fuelgram;


class ProfileController extends Controller
{
    public function index()
    {
    	$fg = new Fuelgram();
    	return view('profile.index', ['data' => '']);
    }
    
    public function instagram()
    {
        $fg = new Fuelgram();
        return view('profile.instagram', ['data' => '']);
    }

    public function instagram_update(Request $request)
    {
        $user = User::findOrFail(Auth()->id());
        $user->ig_username = $request->input('username');
        $user->ig_password = $request->input('password');
        $user->save();
        return back()->with('success', __('Instagram setting successfully updated'));
    }

}
