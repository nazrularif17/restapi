<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    public function index()
    {
        // SELECT = FROM places;
        // SELECT name, address, image_url
        $places = Place::select('id','name','address','image_url')->get();
        if ($places){
            return response()->json([
                "success"=>true,
                "data"=>$places
            ]);
        }   
        else {
            return response()->json([
                "success"=>false,
                "data"=>"something went wrong"
            ]);
        }
    }
    public function create(Request $request)
    {
        //
    }
    public function store(Request $request)
    {
        $place = new Place();
        $place->name = $request->name;
        $place->address = $request->address;
        $place->email = $request->email;
        $place->phone_number = $request->phone_number;
        $place->image_url = $request->image_url;
        $place->description = $request->description;

        if ($place->save()){
            return response()->json([
                "success"=>true,
                "message"=>"Place successfully added"
            ]);
        }
        else {
            return response()->json([
                "success"=>false,
                "message"=>"Something went wrong"
            ]);
        }
    }
    public function show($id){
        $place = Place::with('reviews.user')->find($id);
        if ($place){
            return response()->json([
                "success"=>true,
                "data"=>$place
            ]);
        }
        else {
            return response()->json([
                "success"=>false,
                "data"=>"Something went wrong"
            ]);
        }
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        $place = Place::find($id);
        if ($place){
            $place->name = $request->name;
            $place->address = $request->address;
            $place->email = $request->email;
            $place->phone_number = $request->phone_number;
            $place->image_url = $request->image_url;
            $place->description = $request->description;
            if ($place->save()){
                return response()->json([
                    "success"=>true,
                    "message"=>"Place successfully updated",
                    "data"=>$place
                ]);
            }
            else {
                return response()->json([
                    "success"=>false,
                    "message"=>"Something went wrong"
                ]);
            }
        }
    }
    public function destroy($id)
    {
        $place = Place::find($id);
        if ($place){
            if ($place->delete()){
                return response()->json([
                    "success"=>true,
                    "message"=>"Place successfully deleted",
                ]);
            }
            else {
                return response()->json([
                    "success"=>false,
                    "message"=>"Something went wrong"
                ]);
            }
        }
        else {
            return response()->json([
                "success"=>false,
                "message"=>"Place with id={$id} not found"
            ]);
        }
    }
}
