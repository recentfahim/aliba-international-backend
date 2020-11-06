<?php

namespace App\Http\Controllers;

use App\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminLocationController extends Controller
{
    public function index(){
        $locations = Location::with('parent')->get();

        return view('admin.location.index', compact('locations'));
    }

    public function create(){
        $locations = Location::all();

        return view('admin.location.create', compact('locations'));
    }

    public function store(Request $request){
        $request->validate([
            'location_name' => 'required|max:255',
        ],
        [
            'location_name' => 'Please Provide Location Name',
        ]);
        $location = new Location();
        $location->name = $request->location_name;
        $location->parent_id = $request->parent_id;

        if($request->is_active){
            $location->is_active = true;
        }else{
            $location->is_active = false;
        }
        $location->save();

        session()->flash('success', 'A New Location Has Been Added Successfully');
        return redirect()->route('admin.location');
    }
}
