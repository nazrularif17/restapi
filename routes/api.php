<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\ReviewController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Monolog\Handler\RotatingFileHandler;

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
Route::post('/places',[PlaceController::class,'store']);
Route::get('/places/{id}',[PlaceController::class,'show']);
Route::put('/places/{id}',[PlaceController::class,'update']);
Route::delete('/places/{id}',[PlaceController::class,'destroy']);

Route::get('/facilities',[FacilityController::class,'index']);
Route::post('/facilities',[FacilityController::class,'store']);
Route::get('/facilities/{id}',[FacilityController::class,'show']);
Route::put('/facilities/{id}',[FacilityController::class,'update']);
Route::delete('/facilities/{id}',[FacilityController::class,'destroy']);

Route::get('/reviews',[ReviewController::class,'index']);
Route::post('/reviews',[ReviewController::class,'store']);
Route::get('/reviews/{id}',[ReviewController::class,'show']);
Route::put('/reviews/{id}',[ReviewController::class,'update']);
Route::delete('/reviews/{id}',[ReviewController::class,'destroy']);

Route::get('/users',[Controller::class,'index']);