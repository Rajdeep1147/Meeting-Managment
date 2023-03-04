<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($flag)
    {
        // flag 1(Active Users)
        // flag 0(All Users)

        $query = User::select('email','name');
        if($flag == 1){
            $query->where('status',1);
        }elseif($flag == 0)
        {
            
        }else{
            return response()->json([
                "message"=>"Invalid Parameter Passed It can be Either 1 or 0 ",
                "status"=> 0
            ],400);
            
        }
        $user = $query->get();
        if(count($user) > 0)
        {
            $response = [
                "message" => count($user). ' users found',
                "status"=>1,
                "data"=>$user
            ];
            return response()->json($response,200);
        }else{
            $response = [
                "message" =>'users not found',
                "status"=>0
            ];
            return response()->json($response,200);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:5|confirmed',
            'password_confirmation'=>'required',

        ]);
        if($validator->fails()){
            return response()->json($validator->messages(),400);
        }else{
            $data = [
                "name"=>$request->name,
                "email"=>$request->email,
                "password"=>Hash::make($request->password)
            ];
            DB::beginTransaction();
          try{
            $user =  User::create($data);
            DB::commit();
          }catch(\Exception $e){
            DB::rollBack();
            $user = null ;
          }
          if($user !=null){
            return response()->json(['message'=>"User Is Created Successfully"],200);
          }else{
            dd($e->getMessage());
            return response()->json(['message'=>"Internal Server Error"],500);
          }
        }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        if(is_null($user)){
            $response = [
                "message"=>"User not Found",
                "status"=>0
            ];
        }else{
            $response = [
            "message"=>"User Found",
            "status"=>1,
            "data"=>$user
            ];
        }
        return response()->json($response,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if(is_null($user)){
            return response()->json([
                "status"=>0,
                'message'=>'User Not exist'
            ]);
        }else{
           
            DB::beginTransaction();
            try{
                $user->name = $request['name'];
                $user->email = $request['email'];
                $user->pincode = $request['pincode'];
                $user->address = $request['address'];
                $user->contact = $request['contact'];
                $user->save();
                DB::commit();    
            }catch(\Exception $e){
                DB::rollBack();
                $user = null;
            }
            if(is_null($user))
            {
                return response()->json([
                    "message"=>"Internal Serve Error",
                    "status"=>0,
                    "error_msg"=>$e->getMessage()
                ],500);
            }else{
                return response()->json([
                    "message"=>"Data Updated Successfully",
                    "status"=>1
                ],200);
            }


        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if(is_null($user)){
            $response=[
                "message"=>"User Does not Exit",
                "status"=>0
            ];
            $responseCode = 404;
        }else{
            DB::beginTransaction();
            try{
                $user->delete();
                DB::commit();
                $response=[
                    "message"=>"User Deleted Successfully",
                    "status"=>1
                ];
                $responseCode =200 ;
            }catch(\Exception $e)
            {
                DB::rollBack();
                $response=[
                    "message"=>"Internal Server Error",
                    "status"=>1
                ];
                $responseCode = 500; 
            }
        }
        return response()->json([$response,$responseCode]);
    }

    public function changePassword(Request $request,$id)
    {
        $user = User::find($id);
        if(is_null($user)){
            return response()->json([
                'message'=>"User Does not Exist",
                "status"=>0
            ],404);
        }else{
            if($user->password == Hash::make($request['old_password'])){
                if($request['new_password'] == Hash::make($request['confirm_password'])){
                    DB::beginTransaction();
                    try{
                        $user->password = Hash::make($request['new_password']);
                        $user->save();
                        DB::commit();
                    }catch(\Exception $ex)
                    {
                        $user = null;
                        DB::rollBack();
                        $response=[
                            "message"=>"Internal Server Error",
                            "status"=>0,
                            "error"=>$ex->getMessage()
                        ];
                        $responseCode = 500; 
                    }
                }else{
                    return response()->json([
                        "message"=>"New Password and Confirm Password not Match",
                        "status"=>0
                    ],404);    
                }
            }else{
                return response()->json([
                    "message"=>"Old Password Does not Match",
                    "status"=>0
                ],404);
            }
        }
    }

    public function practice()
    {
        return "Hello";
    }
}
