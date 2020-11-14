<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Currency;
use Illuminate\Http\Request;

class AdminCurrencyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $currency = Currency::all()->last();

        return view('admin.currency.index', compact('currency'));
    }

    public function edit($id)
    {
        $currency = Currency::find($id);

        return view('admin.currency.edit', compact('currency'));
    }

    public function update(Request $request, $id)
    {
        $currency = Currency::find($id);

        $currency->received_currency = $request->currency_name;
        $currency->bdt = $request->currency_bdt;
        $currency->save();

        return redirect(route('currency.index'));
    }

}
