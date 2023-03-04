<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Mail\TestMail;  


class UserController extends Controller
{
    public function loadRegister(Request $request)
    {
        dump(app()->getBindings());

        if(Auth::check()){
            return redirect('/main');
        }
        return view('register');
    }

    public function userRegister(Request $request)
    {
        $request->validate([
            'name'=>'required|string|min:4|max:50',
            'email'=>'string|required|unique:users|max:50',
            'password'=>'required|min:4',
        ]);

        $order=([
            "message"=>"This is new mail Format"
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        // Mail::to('rajdeeprangra@gmail.com')->send(new TestMail($order));
        return back()->with('success','Your Registration is Successfull');
    }

    public function userLogin(Request $request)
    {
       
        $request->validate([
            "email"=>'required|string',
            "password"=>'required'
        ]);

        $usecredential = $request->only('email','password');
        
        if(Auth::attempt($usecredential))
        {
            $user = Auth::User();
            
            $mysession = Session::put('my',$user->id);
            
            return redirect('/main');
        }else{
            return back()->with('error','User Name or Password is Incorrect');
        }
        
    }

    public function loadLogin()
    {
        if(Auth::check()){
            return redirect('/main');
        }
        return view('login');
    }

    public function main(Request $request)
    {
        $getsession = Session::has('my');
           
        
        if(Auth::check()){
            return view('main');
        }else{
            return redirect('/');
        }
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return redirect("/");
    }
}
