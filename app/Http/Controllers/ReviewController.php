<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::all();
        if ($reviews){
            return response()->json([
                "success"=>true,
                "data"=>$reviews
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
        $review = new Review();
        $review->rating = $request->rating;
        $review->comment = $request->comment;
        $review->place_id = $request->place_id;
        $review->user_id = $request->user_id;

        if ($review->save()){
            return response()->json([
                "success"=>true,
                "message"=>"review successfully added"
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
        $review = Review::find($id);
        if ($review){
            return response()->json([
                "success"=>true,
                "data"=>$review
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
        $review = Review::find($id);
        if ($review){
            $review->rating = $request->rating;
            $review->comment = $request->comment;
            $review->place_id = $request->place_id;
            $review->user_id = $request->user_id;
            if ($review->save()){
                return response()->json([
                    "success"=>true,
                    "message"=>"review successfully updated",
                    "data"=>$review
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
        $review = Review::find($id);
        if ($review){
            if ($review->delete()){
                return response()->json([
                    "success"=>true,
                    "message"=>"review successfully deleted",
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
                "message"=>"review with id={$id} not found"
            ]);
        }
    }
}
