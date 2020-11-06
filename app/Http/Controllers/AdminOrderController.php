<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function index(){
        $orders = Order::all();

        return view('admin.order.index', compact('orders'));
    }
}
