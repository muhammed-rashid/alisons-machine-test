<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //login
    public function login(){
        return view('admin.auth.login');
    }

    //login
    public function doLogin(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|string|min:8'
        ]);

        if(!Auth::guard('admin')->attempt($request->only('email','password'))){
            return redirect()->back()->withErrors(['email'=>'Email or password Donot match']);
        }
        session()->flash('success','Login Successfull');
        return redirect()->intended('/admin/dashboard');
    }
    //logout
    public function logOut(){
       if(Auth::guard('admin')->check()){
        Auth::guard('admin')->logout();
       }
       return redirect()->route('admin.auth.login');
    }

}
