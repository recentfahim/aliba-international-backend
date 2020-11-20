<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function rootBrand(Request $request){
        $brands = OTCRequest('GetBrandInfoList');

        if($brands){
            return response()->json(['data' => $brands->BrandInfoList->Content, 'status' => 'Found', 'success' => true], 200);
        } else {
            return response()->json(['data' => array(), 'status' => 'No Brand Found', 'success' => false], 200);
        }
    }
}
