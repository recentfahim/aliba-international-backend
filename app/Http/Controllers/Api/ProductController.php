<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    public function BatchSearchItemsFrame(Request $request){
        $params = array('framePosition' => 5, 'frameSize' => 50, 'blockList' => '', 'xmlParameters' => '', 'sessionId' => '');
        $products = OTCRequest('BatchSearchItemsFrame', $params);

        $product_collection = collect(new ProductCollection($products->Result->Items->Items->Content));

        if($products){
            return response()->json(['data' => $product_collection, 'status' => 'Found', 'success' => true], 200);
        } else {
            return response()->json(['data' => array(), 'status' => 'No Product Found', 'success' => false], 200);
        }
    }

    public function BatchGetItemFullInfo(Request $request, $id){
        $params = array('itemId' => $id, 'blockList' => '', 'sessionId' => '');

        $product = OTCRequest('BatchGetItemFullInfo', $params);

        if($product){
            return response()->json(['data' => $product->Result->Item, 'status' => 'Found', 'success' => true], 200);
        } else {
            return response()->json(['data' => array(), 'status' => 'No Product Found', 'success' => false], 200);
        }
    }
}
