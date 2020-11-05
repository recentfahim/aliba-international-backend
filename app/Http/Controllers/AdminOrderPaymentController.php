<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminOrderPaymentController extends Controller
{
    public function index(){
        return view('admin.order_payment.index');
    }
}
