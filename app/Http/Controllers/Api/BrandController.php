<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function rootBrand(Request $request){
        $categories = OTCRequest('GetBrandInfoList');

        if($categories){
            return response()->json(['data' => $categories->BrandInfoList->Content, 'status' => 'Found', 'success' => true], 200);
        } else {
            return response()->json(['data' => array(), 'status' => 'No Category Found', 'success' => false], 200);
        }
    }
}
