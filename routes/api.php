<?php

use App\Http\Controllers\PassportAuthController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\ReviewController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/hello', function(){
    return "Hello World";
});

Route::get('/goodbye/{name}', function($name){
    return "Goodbye World ". $name;
});

Route::post('/info', function (Request $request) {
    return "Hello ".$request['name'].'. You are '.$request['age'].' years old.';
});

Route::get('/places',[PlaceController::class,'index']);
Route::get('/places/{id}',[PlaceController::class,'show']);

Route::get('/facilities',[FacilityController::class,'index']);
Route::get('/facilities/{id}',[FacilityController::class,'show']);

Route::get('/reviews',[ReviewController::class,'index']);
Route::get('/reviews/{id}',[ReviewController::class,'show']);

Route::post('/register', [PassportAuthController::class, 'register']);
Route::post('/login', [PassportAuthController::class, 'login']);

Route::middleware('jwt.auth')->group(function () {
    Route::post('/places',[PlaceController::class,'store']);
    Route::put('/places/{id}',[PlaceController::class,'update']);
    Route::delete('/places/{id}',[PlaceController::class,'destroy']);
    Route::post('/facilities',[FacilityController::class,'store']);
    Route::put('/facilities/{id}',[FacilityController::class,'update']);
    Route::delete('/facilities/{id}',[FacilityController::class,'destroy']);
    Route::post('/reviews',[ReviewController::class,'store']);
    Route::put('/reviews/{id}',[ReviewController::class,'update']);
    Route::delete('/reviews/{id}',[ReviewController::class,'destroy']);
});