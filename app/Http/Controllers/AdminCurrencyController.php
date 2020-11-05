<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminCurrencyController extends Controller
{
    public function index(){
        return view('admin.currency.index');
    }
}
