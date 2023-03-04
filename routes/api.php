<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\Api\UserController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('student',MemberController::class);

Route::post('user',function(){
    return response()->json("This is Post Api");
});

Route::delete('/user/{id}',function($id){
    return response("$id Hello Delete",200);
});

Route::put('/user/{id}',function($id){
    return response("$id Hello put",200);
});

Route::post('user/create',[UserController::class,'store']);

Route::get('user/get/{flag}',[UserController::class,'index']);
Route::get('user/{id}',[UserController::class,'show']);
Route::delete('user/{id}',[UserController::class,'destroy']);
Route::put('user/{id}',[UserController::class,'update']);
Route::patch('change-password/{id}',[UserController::class,'changePassword']);



