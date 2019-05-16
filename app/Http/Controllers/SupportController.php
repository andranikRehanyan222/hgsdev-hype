<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Support;
use App\Account as Account;

class SupportController extends Controller
{
    public function index(Request $request)
    {
        $supports = Support::where('status','pending')->get()->pluck('id_insta');
        $accounts = Account::whereIn('id_insta',$supports)->orderBy('id_insta')->get();
        return view('support.index',compact('accounts'));
    }

    public function edit(Account $account)
    {
        //
    }


    public function show(Account $account)
    {
        //
    }

    public function createSupportRequest(Request $request, $instaId)
    {
        if($instaId){
            // $account = Account::where('id_insta', $instaId)->first();
            // if($account){
                $support = new Support();
                $support->id_insta = $instaId;
                $support->save();
                return '1';
            // }
        }
        return '0';
    }
}