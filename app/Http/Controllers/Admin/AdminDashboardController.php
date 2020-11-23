<?php

namespace App\Http\Controllers\Admin;

use App\Currency;
use App\Http\Controllers\Controller;
use App\Order;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $order_today = Order::where('created_at', Carbon::today());
        $users = User::all()->count();
        $currency = Currency::all()->last();
        // $sold_product_value =
        $latest_order = Order::orderBy('created_at')->limit(5)->get();
        $latest_user = User::orderBy('created_at')->limit(5)->get();

        $total_order = $order_today->count();
        $delivered_order = 0;
        $pending_order = 0;

        foreach($order_today as $order){
            if($order->status == 'Delivered'){
                $delivered_order += 1;
            }
            elseif($order->status == 'Pending'){
                $pending_order += 1;
            }
        }

        return view('admin.dashboard.index', compact('total_order', 'delivered_order', 'pending_order', 'latest_user', 'latest_order', 'currency', 'users'));
    }
}
