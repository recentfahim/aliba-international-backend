<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\ProductCollection;

class HomeProductController extends Controller
{
    public function GetFeatureProduct(Request $request){
        $xmlParams = $this->GetProduct('Popular', '4', 'Item');
        $params = array('applicationType' => 'Website', 'xmlSearchParameters' => $xmlParams);
        $products = OTCRequest('BatchSearchRatingLists', $params);
        $product_collection = collect(new ProductCollection($products->Result->Items[0]->Result->Content));

        if($products){
            return response()->json(['data' => $product_collection, 'status' => 'Found', 'success' => true], 200);
        } else {
            return response()->json(['data' => array(), 'status' => 'No Product Found', 'success' => false], 200);
        }
    }

    public function GetProduct($item_rating, $framesize, $content_type){
        $xmlSearchParameters = "<BatchRatingListSearchParameters>
            <RatingLists>
                <RatingList>
                <CategoryId>0</CategoryId>
                <ItemRatingType>".$item_rating."</ItemRatingType>
                <IsRandomSearch>true</IsRandomSearch>
                <ContentType>".$content_type."</ContentType>
                <FramePosition>0</FramePosition>
                <FrameSize>".$framesize."</FrameSize>
                </RatingList>
            </RatingLists>
            <UseDefaultParameters>false</UseDefaultParameters>
            </BatchRatingListSearchParameters>";

        return $xmlSearchParameters;
    }
}
