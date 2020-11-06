<?php

namespace App\Http\Controllers;

use App\Currency;
use Illuminate\Http\Request;

class AdminCurrencyController extends Controller
{
    public function index(){
        $currency = Currency::all()->last();

        return view('admin.currency.index', compact('currency'));
    }
}
