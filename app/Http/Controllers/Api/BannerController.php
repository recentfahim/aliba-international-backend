<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function GetBanners(Request $request){
        $params = array('applicationType' => 'Website');
        $banners = OTCRequest('GetBanners', $params);

        if($banners){
            return response()->json(['data' => $banners->Result->Content, 'status' => 'Found', 'success' => true], 200);
        } else {
            return response()->json(['data' => array(), 'status' => 'No Brand Found', 'success' => false], 200);
        }
    }
}
