<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminLocationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

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
        return redirect()->route('location.index');
    }

    public function edit($id)
    {
        $single_location = Location::where('id', $id)->with('parent')->first();
        $locations = Location::all();

        return view('admin.location.edit', compact('single_location', 'locations'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'location_name' => 'required|max:255',
        ],
        [
            'location_name' => 'Please Provide Location Name',
        ]);

        $location = Location::find($id);
        $location->name = $request->location_name;
        $location->parent_id = $request->parent_id;

        if($request->is_active){
            $location->is_active = true;
        }else{
            $location->is_active = false;
        }
        $location->save();

        session()->flash('success', 'A New Location Has Been Added Successfully');

        return redirect()->route('location.index');
    }

    public function destroy($id)
    {
        $location = Location::find($id);
        $location->delete();

        return response()->json(['redirect_url' => route('location.index')]);
    }
}
