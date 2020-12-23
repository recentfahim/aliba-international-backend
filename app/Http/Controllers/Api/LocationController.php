<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function GetCity(Request $request){
        $cities = Location::where('is_active', 1)->where('parent_id', null)->get();

        if($cities){
            return response()->json(['data' => $cities, 'status' => 'Found', 'success' => true], 200);
        } else {
            return response()->json(['data' => array(), 'status' => 'No Cities Found', 'success' => false], 200);
        }
    }

    public function GetArea($city_id){
        $areas = Location::where('is_active', 1)->where('parent_id', $city_id)->get();

        if($areas){
            return response()->json(['data' => $areas, 'status' => 'Found', 'success' => true], 200);
        } else {
            return response()->json(['data' => array(), 'status' => 'No Areas Found', 'success' => false], 200);
        }
    }
}
