<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function BatchSearchItemsFrame(Request $request){
        $params = array('framePosition' => 5, 'frameSize' => 100, 'blockList' => '', 'xmlParameters' => '<SearchItemsParameters><CategoryId>abb-7</CategoryId></SearchItemsParameters>', 'sessionId' => '');
        $products = OTCRequest('BatchSearchItemsFrame', $params);

        $product_collection = collect(new ProductCollection($products->Result->Items->Items->Content));

        if($products){
            return response()->json(['data' => $product_collection, 'status' => 'Found', 'success' => true], 200);
        } else {
            return response()->json(['data' => array(), 'status' => 'No Product Found', 'success' => false], 200);
        }
    }

    public function TopProduct(Request $request){
        $headphone_params = array('framePosition' => 5, 'frameSize' => 3, 'blockList' => '', 'xmlParameters' => '<SearchItemsParameters><CategoryId>abb-1048186</CategoryId></SearchItemsParameters>', 'sessionId' => '');
        $headphone_products = OTCRequest('BatchSearchItemsFrame', $headphone_params);

        $headphone_product_collection = collect(new ProductCollection($headphone_products->Result->Items->Items->Content));

        $jewelry_params = array('framePosition' => 5, 'frameSize' => 3, 'blockList' => '', 'xmlParameters' => '<SearchItemsParameters><CategoryId>abb-1746</CategoryId></SearchItemsParameters>', 'sessionId' => '');
        $jewelry_products = OTCRequest('BatchSearchItemsFrame', $jewelry_params);

        $jewelry_product_collection = collect(new ProductCollection($jewelry_products->Result->Items->Items->Content));

        $wired_headphone_params = array('framePosition' => 5, 'frameSize' => 3, 'blockList' => '', 'xmlParameters' => '<SearchItemsParameters><CategoryId>abb-1034014</CategoryId></SearchItemsParameters>', 'sessionId' => '');
        $wired_headphone_products = OTCRequest('BatchSearchItemsFrame', $wired_headphone_params);

        $wired_headphone_product_collection = collect(new ProductCollection($wired_headphone_products->Result->Items->Items->Content));


        if($headphone_products){
            return response()->json(['headphone_products' => $headphone_product_collection, 'jewelry_products' => $jewelry_product_collection, 'wired_headphone_products' => $wired_headphone_product_collection, 'status' => 'Found', 'success' => true], 200);
        } else {
            return response()->json(['data' => array(), 'status' => 'No Product Found', 'success' => false], 200);
        }
    }
    public function TopSelection(Request $request){
        $smartphone_params = array('framePosition' => 5, 'frameSize' => 4, 'blockList' => '', 'xmlParameters' => '<SearchItemsParameters><CategoryId>abb-728</CategoryId></SearchItemsParameters>', 'sessionId' => '');
        $smartphone_products = OTCRequest('BatchSearchItemsFrame', $smartphone_params);

        $smartphone_product_collection = collect(new ProductCollection($smartphone_products->Result->Items->Items->Content));

        $electronics_params = array('framePosition' => 5, 'frameSize' => 4, 'blockList' => '', 'xmlParameters' => '<SearchItemsParameters><CategoryId>abb-123754001</CategoryId></SearchItemsParameters>', 'sessionId' => '');
        $electronics_products = OTCRequest('BatchSearchItemsFrame', $electronics_params);

        $electronics_products_collection = collect(new ProductCollection($electronics_products->Result->Items->Items->Content));


        if($smartphone_products){
            return response()->json(['top_selection_products' => $smartphone_product_collection, 'new_arrival_products' => $electronics_products_collection, 'status' => 'Found', 'success' => true], 200);
        } else {
            return response()->json(['data' => array(), 'status' => 'No Product Found', 'success' => false], 200);
        }
    }

    public function BatchGetItemFullInfo(Request $request, $id){
        $params = array('itemId' => $id, 'blockList' => '', 'sessionId' => '');

        $product = OTCRequest('BatchGetItemFullInfo', $params);

        $params = array('itemId' => $id);

        $product_description = OTCRequest('GetItemDescription', $params);

        $related_product_params = array('framePosition' => 1, 'frameSize' => 10, 'blockList' => '', 'xmlParameters' => '<SearchItemsParameters><CategoryId>'.$product->Result->Item->CategoryId.'</CategoryId></SearchItemsParameters>', 'sessionId' => '');
        $related_products = OTCRequest('BatchSearchItemsFrame', $related_product_params);

        $related_product_collection = collect(new ProductCollection($related_products->Result->Items->Items->Content));

        if($product && property_exists($product_description->OtapiItemDescription, 'ItemDescription')){
            return response()->json(['data' => $product->Result->Item, 'description' => $product_description->OtapiItemDescription->ItemDescription, 'related_product' => $related_product_collection, 'status' => 'Found', 'success' => true], 200);
        }
        elseif($product && !property_exists($product_description->OtapiItemDescription, 'ItemDescription')){
            return response()->json(['data' => $product->Result->Item, 'description' => null, 'status' => 'Found', 'success' => true], 200);
        } else {
            return response()->json(['data' => array(), 'status' => 'No Product Found', 'success' => false], 200);
        }
    }

    public function SearchByText(Request $request){
        // Log::channel('stderr')->error($request->all());
        $search_text = $request->search_key;
        Log::channel('stderr')->error($search_text);
        $xml_params = '<SearchItemsParameters><ItemTitle>bowl</ItemTitle></SearchItemsParameters>';
        $search_product_params = array('framePosition' => 1, 'frameSize' => 50, 'blockList' => '', 'xmlParameters' => $xml_params, 'sessionId' => '');

        $search_products = OTCRequest('BatchSearchItemsFrame', $search_product_params);
        Log::channel('stderr')->error($search_products);
        $products = collect(new ProductCollection($search_products->Result->Items->Items->Content));


        if($products){
            return response()->json(['search_products' => $products, 'status' => 'Found', 'success' => true], 200);
        } else {
            return response()->json(['data' => array(), 'status' => 'No Product Found', 'success' => false], 200);
        }
    }

    public function GetSearchImageURL(Request $request){
        if($request->hasFile('search_image')){
            $path = Storage::putFile('public/images', $request->file('search_image'));
            $url = Storage::url($path);

            if($url){
                return response()->json(['image_url' => $url, 'success' => true], 200);
            } else {
                return response()->json(['image_url' => null, 'success' => false], 200);
            }
        }
    }

    public function SearchByImage(Request $request){

        $search_image_path = $request->search_key;
        Log::channel('stderr')->error($search_image_path);

        //$static_url = 'https://cbu01.alicdn.com/img/ibank/2019/628/090/11069090826.jpg';
        $search_product_params = array('framePosition' => 1, 'frameSize' => 50, 'blockList' => '', 'xmlParameters' => '<SearchItemsParameters><Provider>Alibaba1688</Provider><ImageUrl>'.config('services.images.image_url').$url.'</ImageUrl></SearchItemsParameters>', 'sessionId' => '');
        //$search_product_params = array('framePosition' => 1, 'frameSize' => 50, 'blockList' => '', 'xmlParameters' => '<SearchItemsParameters><Provider>Alibaba1688</Provider><ImageUrl>'.$static_url.'</ImageUrl></SearchItemsParameters>', 'sessionId' => '');

        $search_products = OTCRequest('BatchSearchItemsFrame', $search_product_params);

        $products = collect(new ProductCollection($search_products->Result->Items->Items->Content));


        if($products){
            return response()->json(['search_products' => $products, 'status' => 'Found', 'success' => true], 200);
        } else {
            return response()->json(['data' => array(), 'status' => 'No Product Found', 'success' => false], 200);
        }
    }
}
