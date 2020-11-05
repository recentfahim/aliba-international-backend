<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPaymentHistoryController extends Controller
{
    public function index(){
        return view('admin.payment_history.index');
    }
}
