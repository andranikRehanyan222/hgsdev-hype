<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fuelgram as Fuelgram;
use App\Product as Product;
use App\Order as Order;
use App\Account as Account;

class AccountsController extends Controller
{
    public function index()
    {
        $data = Account::where('id_user', Auth()->id())->get();
        return view('accounts.index', ['data' => $data]);
    }

    public function show(Account $account)
    {
        if($account->id_user == Auth()->id()){
            return view('accounts.show', ['data' => $account]);
        }
        abort(403, __('Unauthorized'));
    }

    public function create(Request $request, Product $product)
    {
        $fg = new Fuelgram();
        $data = $fg->create_account($request->input('username'), $request->input('password'));
        if($data AND isset($data->content->user)){
            $account = Account::where('id_insta', $data->content->id)->first();
            if($account){
                return back()->with('error', __('This account exist in our Base. Please cocntact to admin'));
            }
            $account = new Account();
            $account->id_user = Auth()->id();
            $account->id_fg = $data->content->user;
            $account->id_insta = $data->content->id;
            $account->username = $data->content->username;
            $account->avatar = $data->content->avatar;
            $account->followed_count = $data->content->followed_count;
            $account->follower_count = $data->content->follower_count;
            $account->media_count = $data->content->media_count;
            $account->save();
            return redirect()->route('accounts', ['account' => $account->id])->with('success', __('Instagram account successfully added'));
        }
        dd($data->content);
        return back()->with('error', __('Some error. Please try again'));
    }

    public function add(Product $product)
    {
        return view('accounts.add');
    }

}
