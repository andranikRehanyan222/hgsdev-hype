<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fuelgram as Fuelgram;
use App\Paypal as Paypal;
use App\Setting as Setting;

class SettingController extends Controller
{
    public function index(Request $request)
    {
    	return view('setting.index');
    }

    public function paypal(Request $request)
    {
    	$data = Setting::kv();
    	return view('setting.paypal', ['data' => $data]);
    }

    public function paypal_post(Request $request)
    {
    	$array = [
    		'paypal_mode',
    		'paypal_sandbox_secret',
    		'paypal_sandbox_certificate',
    		'paypal_live_secret',
    		'paypal_live_certificate',
    	];
    	foreach ($array as $value) {
    		$item = Setting::where('name', $value)->first();
    		$item->text = $request->input($value);
    		$item->save();
    	}
        return redirect()->route('setting')->with('success', __('Paypal settings updated'));
    }
    
    //Stripe setting change from env file 
    public function stripe(Request $request)
    {
        $envFile = app()->environmentFilePath();
        $str = file_get_contents($envFile);
        $str .= "\n";
        $keyPosition = strpos($str, "STRIPE_KEY=");
        $endOfLinePosition = strpos($str, "\n", $keyPosition);
        $oldLine = substr($str, $keyPosition, $endOfLinePosition - $keyPosition);

        $keyPosition = strpos($str, "STRIPE_SECRET=");
        $endOfLinePosition = strpos($str, "\n", $keyPosition);
        $oldLine2 = substr($str, $keyPosition, $endOfLinePosition - $keyPosition);

        // dd($oldLine,$oldLine2,$str);
        $stripe_key = str_replace('STRIPE_KEY=', '', $oldLine);
        $stripe_secret = str_replace('STRIPE_SECRET=', '', $oldLine2);

        return view('setting.stripe',compact('stripe_key','stripe_secret'));
    }

    public function stripe_post(Request $request)
    {

        $envFile = app()->environmentFilePath();
        $str = file_get_contents($envFile);
        if($request->stripe_key){
            $new_key = "STRIPE_KEY=".$request->stripe_key;

            $keyPosition = strpos($str, "STRIPE_KEY=");
            $endOfLinePosition = strpos($str, "\n", $keyPosition);
            $oldLine = substr($str, $keyPosition, $endOfLinePosition - $keyPosition);

            $str = str_replace($oldLine, $new_key, $str);
        }
        if($request->stripe_secret){
            $new_secret = "STRIPE_SECRET=".$request->stripe_secret;

            $keyPosition = strpos($str, "STRIPE_SECRET=");
            $endOfLinePosition = strpos($str, "\n", $keyPosition);
            $oldLine2 = substr($str, $keyPosition, $endOfLinePosition - $keyPosition);

            $str = str_replace($oldLine2, $new_secret, $str);
        }
        if (!file_put_contents($envFile, $str))
        {
            return back()->with('error','something went wrong please try again later!');
        }else{
            return Redirect()->route('setting')->with('success','Stripe setting updated.');
        }
    }
}

