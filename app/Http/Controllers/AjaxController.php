<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function ajaxRegister()
    {
        return view('ajax.register');
    }

    public function ajaxRegisterPost(Request $request)
    {
        $imagename = $request->file('image')->getClientOriginalName ();
        // dd($imagename);
        $myname = time().'-'.$imagename;
        // $request->profile->move(public_path('img/'), $img_name);
        $request->file('image')->move('public_path',$myname);
        // $store = $request->file('image')->move('public_path',$myimage)
        // $store = $request->file('image')->store('uploads', 'public');
        $imagename->storeAs('public/rajdeep',$name);
        $model = new User;
        $model->name = $request->post('name');
        $model->email = $request->post('email');
        $model->password = $request->post('password');
        $model->image = $myname;
        $model->save();
        return ["result"=>"Data has Been Inserted"];
    }

    public function allUsers()
    {
        $users = User::all();
        return view('ajax.users',['users'=>$users]);
    }

    public function deleteUsers($id=null)
    {
        $delete = User::find($id)->delete();
        return ["result"=>"User Deleted"];
    }

    public function productSearching(Request $request)
    {
        
        if($request->ajax()){
            
            $mydata = User::where('name','LIKE',$request->search.'%')->get();
            $output = '';
            if(count($mydata)>0){
                
                $output .='<ul class="list-group style="display:block; position:relative">';
                            foreach($mydata as $row){
                                $output .='<li class="list-group-item">'.$row->name.'</li>';  
                            }
                $output .='</ul>';
            }else{
                
                $output .='<li>No Data Found</li>';
            }
            return $output;
        }
        
        return view('ajax.search');
    }
}

