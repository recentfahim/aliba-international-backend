<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminOrderProductController extends Controller
{
    public function index(){
        return view('admin.order_product.index');
    }
}
