<?php

namespace App\Http\Controllers;
use App\Models\User;   
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\DB;
class AuthManager extends Controller
{
    function login(){
        if(Auth::check()){
            return redirect(route('projects'));
        }
        return view('login');
    }

    function registration(){
        if(Auth::check()){
            return redirect(route('projects'));
        }
        return view('registration');
    }
    function loginpost(Request $request){
        $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('name', 'password');
        if(Auth::attempt($credentials)){
            return redirect()->intended(route('projects'));
        }
        return redirect(route('login'))->with("error", "Login details are not valid");
    }
    function registrationpost(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'projectn' => 'required',
            'projecttarget' => 'required',
            'password' => 'required',
        ]);

        $data['name'] =$request->name;
        $data['email'] = $request->email;
        $data['projectn'] = $request->projectn;
        $data['projecttarget'] = $request->projecttarget;
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);
        if(!$user){
            return redirect(route('registration'))->with("error", "Reg details are not valid");
        }
        return redirect(route('login'))->with("success", "Login details are valid");
    }
    function logout(){
        Session:flush();
        Auth::logout();
        return redirect(route("login"));
    }
}
