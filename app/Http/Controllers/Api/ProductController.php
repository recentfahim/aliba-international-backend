<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function BatchSearchItemsFrame(Request $request){
        $params = array('framePosition' => 5, 'frameSize' => 50, 'blockList' => '', 'xmlParameters' => '', 'sessionId' => '');
        $products = OTCRequest('BatchSearchItemsFrame', $params);

        if($products){
            return response()->json(['data' => $products->Result->Items->Items->Content, 'status' => 'Found', 'success' => true], 200);
        } else {
            return response()->json(['data' => array(), 'status' => 'No Product Found', 'success' => false], 200);
        }
    }
}
