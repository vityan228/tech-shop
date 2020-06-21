<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;



class OrderController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $orders = Order::get()->where('status',1);
        //dd($orders);
        return view('auth.orders.index',compact('orders'));
    }
}
