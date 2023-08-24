<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {
        $users = User::all();
        if ($users){
            return response()->json([
                "success"=>true,
                "data"=>$users
            ]);
        }   
        else {
            return response()->json([
                "success"=>false,
                "data"=>"something went wrong"
            ]);
        }
    }
}
