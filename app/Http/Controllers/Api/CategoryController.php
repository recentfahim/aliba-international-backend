<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    public function rootCategory(Request $request){
        $categories = OTCRequest('GetRootCategoryInfoList');

        if($categories){
            return response()->json(['data' => $categories->CategoryInfoList->Content, 'status' => 'Found', 'success' => true], 200);
        } else {
            return response()->json(['data' => array(), 'status' => 'No Category Found', 'success' => false], 200);
        }
    }

    public function SubCategory(Request $request, $category_id){
        $params = array('parentCategoryId' => $category_id);
        $sub_categories = OTCRequest('GetCategorySubcategoryInfoList', $params);

        if($sub_categories){
            return response()->json(['data' => $sub_categories->CategoryInfoList->Content, 'status' => 'Found', 'success' => true], 200);
        } else {
            return response()->json(['data' => array(), 'status' => 'No Category Found', 'success' => false], 200);
        }
    }
}
