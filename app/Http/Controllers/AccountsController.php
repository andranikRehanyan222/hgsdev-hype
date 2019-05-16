<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fuelgram as Fuelgram;
use App\Product as Product;
use App\Order as Order;
use App\Account as Account;
use App\Support;
use Auth;

class AccountsController extends Controller
{
    public function index(Request $request)
    {
       
       
        $data = Account::where('id_user', Auth()->id())->get();
        // dd($data); 
        return view('accounts.index', ['data' => $data]);
    }

    public function edit(Account $account)
    {
        if($account->id_user == Auth()->id()){
            return view('accounts.edit', ['data' => $account]);
        }
        abort(403, __('Unauthorized'));
    }


    public function show(Account $account)
    {
        if($account->id_user == Auth()->id()){
            $fg = new Fuelgram();
            $fg->set_account_update($account->id_insta, $account->username, 'vipap@ukr.net');
            return view('accounts.show', ['data' => $account]);
        }
        abort(403, __('Unauthorized'));
    }

    public function create(Request $request, Product $product)
    {
        $request->validate([
            'username' => 'unique:accounts,username'
        ]);

        $fg = new Fuelgram();
        $data = $fg->create_account($request->input('username'), $request->input('password'));
        if($data AND isset($data->content->user)){
            $account = Account::where('id_insta', $data->content->id)->first();
            $exist = false;
            if($account){
                $exist = true;
                // return back()->with('error', __('This account exist in our Base. Please cocntact to admin'));
            }
            $account = new Account();
            $account->id_user = Auth()->id();
            $account->id_fg = $data->content->user;
            $account->id_insta = (string)$data->content->id;
            $account->username = $data->content->username;
            $account->avatar = $data->content->avatar;
            $account->followed_count = $data->content->followed_count;
            $account->follower_count = $data->content->follower_count;
            $account->media_count = $data->content->media_count;
            $account->save();
            if($exist == true){
                $message = 'Account already exist, <span onclick="support(\''.$data->content->id.'\')" class="btn btn-sm">contact support</span> if you have already added to another Hype Groups Account and you want to migrate it';

                return redirect()->route('accounts', ['account' => $account->id])->with('success', __('Instagram account successfully added'))->with('message', $message);
            }else{
                return redirect()->route('accounts', ['account' => $account->id])->with('success', __('Instagram account successfully added'));
            }
        }
        // dd($data->content);
        return back()->with('error', __('Some error. Please try again'));
    }

    public function add(Product $product)
    {
        return view('accounts.add');
    }

    public function delete(Account $account)
    {
        if($account->id_user == Auth()->id() || Auth::user()->role == 'admin'){
            $oldid_insta = $account->id_insta;

            $account->delete();

            $account = Account::where('id_insta',$oldid_insta)->get()->count();
            if($account<2){
                $supports = Support::where('id_insta',$oldid_insta)->update(['status'=>'solved']);
            }
            return Redirect()->back()->with('Account is Deleted');
        }
        abort(403, __('Unauthorized'));
    }

}
