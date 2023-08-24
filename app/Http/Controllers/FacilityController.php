<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use Illuminate\Http\Request;

class FacilityController extends Controller
{
    public function index()
    {
        $facilities = Facility::all();
        if ($facilities){
            return response()->json([
                "success"=>true,
                "data"=>$facilities
            ]);
        }   
        else {
            return response()->json([
                "success"=>false,
                "data"=>"something went wrong"
            ]);
        }
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        $facility = new Facility();
        $facility->name = $request->name;

        if ($facility->save()){
            return response()->json([
                "success"=>true,
                "message"=>"facility successfully added"
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
        $facility = Facility::find($id);
        if ($facility){
            return response()->json([
                "success"=>true,
                "data"=>$facility
            ]);
        }
        else {
            return response()->json([
                "success"=>false,
                "data"=>"Something went wrong"
            ]);
        }
    }
    public function edit()
    {
        //
    }
    public function update(Request $request, $id)
    {
        $facility = Facility::find($id);
        if ($facility){
            $facility->name = $request->name;
            if ($facility->save()){
                return response()->json([
                    "success"=>true,
                    "message"=>"facility successfully updated",
                    "data"=>$facility
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
        $facility = Facility::find($id);
        if ($facility){
            if ($facility->delete()){
                return response()->json([
                    "success"=>true,
                    "message"=>"facility successfully deleted",
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
                "message"=>"facility with id={$id} not found"
            ]);
        }
    }
}
