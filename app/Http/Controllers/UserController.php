<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register(Request $request){
        $data =  $request->validate([
            'name' =>'required',
            'email' =>'required|email',
            'age' =>'required|numeric',
            'password' =>'required|confirmed',
            'role' =>'required',
        ]);
        $user = User::create($data);
        if($user){
            return redirect()->route('login');
        }
    }
    public function login(Request $request){
        $credentials =  $request->validate([
            'email' =>'required|email',
            'password' =>'required'
        ]);
        if(Auth::attempt($credentials)){
            return redirect()->route('dashboard');
        }
    }
    public function dashboardPage(){
        if(Auth::check()){
            return view('dashbord');
        }else{
            return redirect()->route('login');
        }
    }
    public function innerPage(){
        if(Auth::check()){
            return view('inner');
        }else{
            return redirect()->route('login');
        }
    }
    public function logout(){
      Auth::logout();
      return view('login');
    }
}
