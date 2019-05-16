<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fuelgram as Fuelgram;
use App\Product as Product;
use App\Order as Order;
use App\Account as Account;

class OrdersController extends Controller
{
    public function index()
    {
        return view('order.index', ['data' => Order::where('id_user', Auth()->id())->get()]);
    }

    public function show(Order $order)
    {
        if($order->id_user == Auth()->id()){
            return view('order.show', ['data' => $order]);
        }
        abort(403, __('Unauthorized'));
    }

    public function add(Product $product)
    {
        $accounts = Account::where('id_user', Auth()->id())->get();
        return view('order.add', ['data' => $product, 'accounts' => $accounts]);
    }

    public function pay(Request $request, Order $order)
    {
        if($order->id_user == Auth()->id()){
            return view('order.pay', ['data' => $order]);
        }
        abort(403, __('Unauthorized'));
    }

    public function create(Request $request, Product $product)
    {
        $account = Account::findOrFail($request->input('account'));
        $order = new Order();
        $order->id_product = $product->id;
        $order->id_user = Auth()->id();
        $order->id_account = $account->id;
        $order->text = $product->name;
        $order->cost = $product->cost;
        $order->product_json = $product->toJson();
        $order->status = 'new';
        $order->save();
        return redirect(route('order.pay', ['order' => $order->id]));
    }


    // public function create(Product $product)
    // {
    //     $order = new Order();
    //     $order->id_product = $product->id;
    //     $order->id_user = Auth()->id();
    //     $order->text = $product->name;
    //     $order->cost = $product->cost;
    //     $order->product_json = $product->toJson();
    //     $order->status = 'new';
    //     $order->save();
    //     return redirect(route('order'));
    // }

}
