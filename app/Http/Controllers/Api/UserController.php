<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Traits\MyTrait;
use App\Models\student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    use MyTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($flag)
    {
        // flag 1(Active Users)
        // flag 0(All Users)

        $query = User::select('email', 'name');
        if ($flag == 1) {
            $query->where('status', 1);
        } elseif ($flag == 0) {

        } else {
            return response()->json([
                'message' => 'Invalid Parameter Passed It can be Either 1 or 0 ',
                'status' => 0,
            ], 400);

        }
        $user = $query->get();
        if (count($user) > 0) {
            $response = [
                'message' => count($user).' users found',
                'status' => 1,
                'data' => $user,
            ];

            return response()->json($response, 200);
        } else {
            $response = [
                'message' => 'users not found',
                'status' => 0,
            ];

            return response()->json($response, 200);
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|confirmed',
            'password_confirmation' => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json($validator->messages(), 400);
        } else {
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ];
            DB::beginTransaction();
            try {
                $user = User::create($data);
                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                $user = null;
            }
            if ($user != null) {
                return response()->json(['message' => 'User Is Created Successfully'], 200);
            } else {
                dd($e->getMessage());

                return response()->json(['message' => 'Internal Server Error'], 500);
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
        if (is_null($user)) {
            $response = [
                'message' => 'User not Found',
                'status' => 0,
            ];
        } else {
            $response = [
                'message' => 'User Found',
                'status' => 1,
                'data' => $user,
            ];
        }

        return response()->json($response, 200);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if (is_null($user)) {
            return response()->json([
                'status' => 0,
                'message' => 'User Not exist',
            ]);
        } else {

            DB::beginTransaction();
            try {
                $user->name = $request['name'];
                $user->email = $request['email'];
                $user->pincode = $request['pincode'];
                $user->address = $request['address'];
                $user->contact = $request['contact'];
                $user->save();
                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                $user = null;
            }
            if (is_null($user)) {
                return response()->json([
                    'message' => 'Internal Serve Error',
                    'status' => 0,
                    'error_msg' => $e->getMessage(),
                ], 500);
            } else {
                return response()->json([
                    'message' => 'Data Updated Successfully',
                    'status' => 1,
                ], 200);
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
        if (is_null($user)) {
            $response = [
                'message' => 'User Does not Exit',
                'status' => 0,
            ];
            $responseCode = 404;
        } else {
            DB::beginTransaction();
            try {
                $user->delete();
                DB::commit();
                $response = [
                    'message' => 'User Deleted Successfully',
                    'status' => 1,
                ];
                $responseCode = 200;
            } catch (\Exception $e) {
                DB::rollBack();
                $response = [
                    'message' => 'Internal Server Error',
                    'status' => 1,
                ];
                $responseCode = 500;
            }
        }

        return response()->json([$response, $responseCode]);
    }

    public function changePassword(Request $request, $id)
    {
        $user = User::find($id);
        if (is_null($user)) {
            return response()->json([
                'message' => 'User Does not Exist',
                'status' => 0,
            ], 404);
        } else {
            if ($user->password == Hash::make($request['old_password'])) {
                if ($request['new_password'] == Hash::make($request['confirm_password'])) {
                    DB::beginTransaction();
                    try {
                        $user->password = Hash::make($request['new_password']);
                        $user->save();
                        DB::commit();
                    } catch (\Exception $ex) {
                        $user = null;
                        DB::rollBack();
                        $response = [
                            'message' => 'Internal Server Error',
                            'status' => 0,
                            'error' => $ex->getMessage(),
                        ];
                        $responseCode = 500;
                    }
                } else {
                    return response()->json([
                        'message' => 'New Password and Confirm Password not Match',
                        'status' => 0,
                    ], 404);
                }
            } else {
                return response()->json([
                    'message' => 'Old Password Does not Match',
                    'status' => 0,
                ], 404);
            }
        }
    }

    public function collapse()
    {
        $item = collect(['one', 'two', 'three']);
        $collapse = [
            [1, 2, 3],
            [4, 5, 6],

        ];

        return collect($collapse)->collapse();
    }

    public function map()
    {
        $user = User::all();
        // $nuser = $user->pluck('email')->all();
        // return $nuser;
        return collect([
            'value1' => 'first',
            'value2' => 'second',
        ])->mapWithKeys(function ($item, $key) {
            // if($key=='value2'){
            //     return [];
            // }
            // $data = collect([1,2,3,4,5,6,7]);
            // $co = $data->mapWithKeys(function($keys,$items){
            //     return [];
            // });
            // return $co;
            return [
                $key => $item,
                $key.'upper' => strtoupper($item),
            ];
        });

        $output = $user->each(function ($user) {
            if ($user->id % 2 == 0) {
                $user->age = 20;
            } else {
                $user->age = 22;
            }
            unset($user->created_at,$user->updated_at);
        });

        return $output->toArray();
        $count = $user->count();
        $newresult = $user->map(function ($alldata) {
            return strtoupper($alldata);
        });

        $item = collect(['one', 'two', 'three']);
        $max = collect([1, 43, 54])->max();

        $info = $item->map(function ($result) {
            return strtoupper($result);

        });

        return $info;
    }

    public function filter()
    {
        $user = student::get();
        // $output = $user->search(function($user){
        //     return $user->email =="rajdeep@infotech.in" ;
        // });
        $output = $user->filter(function ($user) {
            return $user->status == 0;
        });

        return $output;
    }

    public function groupBy()
    {
        // return student::select('name')->groupBy('name')->get();
        return student::all()->groupBy('name');
    }

    public function diff()
    {
        $collection = collect([10, 20, 30]);
        // return $collection->diffUsing([1,20,22],function($a,$b){
        //     dd()
        // });
        return $collection;
    }

    public function where()
    {
        // return collect([
        //     ['product'=>'apples','price'=>50],
        //     ['product'=>'pear','price'=>60],
        //     ['product'=>'grapes','price'=>70],
        //     ['product'=>'bananas','price'=>80],
        //     ['product'=>'coconuts','price'=>100],

        // ])->whereBetween('price',[60,90]);

        // return collect([
        //     ['product'=>'apples','price'=>50],
        //     ['product'=>'pear','price'=>60],
        //     ['product'=>'grapes','price'=>70],
        //     ['product'=>'bananas','price'=>80],
        //     ['product'=>'coconuts','price'=>100],
        // ])->whereIn('price',[50,70,100]);

        return collect([1, 2, 3, 4, 5, 6])->only(0, 1, 4);

    }

    public function testTrait()
    {

        $order = $this->createOrder();

        return $order;
    }
}
