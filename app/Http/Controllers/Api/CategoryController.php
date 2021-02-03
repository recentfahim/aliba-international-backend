<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    public function buildTree($elements, $parentId = 0) {
        $branch = array();
        foreach ($elements as $element) {
            if(array_key_exists('ParentId', $element)){
                if ($element->ParentId == $parentId) {
                    $children = $this->buildTree($elements, $element->Id);
                    if ($children) {
                        $element->children = $children;
                    }
                    $branch[] = $element;
                }
            }
        }

        return $branch;
    }


    public function rootCategory(Request $request){
        $categories = OTCRequest('GetThreeLevelRootCategoryInfoList');
        $parent_category = array();

        foreach($categories->CategoryInfoList->Content as $category){
            if(!array_key_exists('ParentId', $category)){
                $parent_category[$category->Id] = $category;
                $parent_category[$category->Id]->childs = $this->buildTree($categories->CategoryInfoList->Content, $category->Id);
            }
        }
        if($categories){
            return response()->json(['data' => $parent_category, 'status' => 'Found', 'success' => true], 200);
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
