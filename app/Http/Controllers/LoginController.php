<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
   public function index(){
    if(Auth::check()){
        return redirect()->intended('home');
    }
    return view('auth.login');
    }
    public function push(Request $request){
    $credential = $request->validate([
        "email" => "required|email",
        "password" => "required"
    ]);
    $remember = $request->has('remember');
    if(Auth::attempt($credential,$remember)){
        $request->session()->regenerate();
        return redirect()->intended('home');
    }
    return back()->withErrors(["gagal" => "gagal login"]);
}
}
