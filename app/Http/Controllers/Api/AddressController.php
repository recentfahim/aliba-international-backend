<?php

namespace App\Http\Controllers\Api;

use App\Address;
use App\Http\Controllers\Controller;
use App\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AddressController extends Controller
{
    public function getUser(Request $request){
        $user = $request->user();
        $address = new Address();

        $address->name = $request->input('address_name');
        $address->user_id = $user->id;
        $address->location_id = $request->input('address_location');
        $address->area = $request->input('address_area');
        $address->address = $request->input('address');
        $address->mobile_number = $request->input('address_mobile_number');

        $address->save();

        return response()->json(['message' => 'Address Saved Successfully!!', 'success' => true], 200);
    }
}
