<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/home', function () {
    return view('welcome');
})->name("home")->middleware('auth');
Route::get("/login",function(){
    if(Auth::check()){
        return redirect()->intended('home');
    }
    return view('auth.login');
})->name("login");
Route::post("/login",function(Request $request){
    $credential = $request->validate([
        "email" => "required|email",
        "password" => "required"
    ]);
    if(Auth::attempt($credential)){
        $request->session()->regenerate();
        return redirect()->intended('home');
    }
    return back()->withErrors(["gagal" => "gagal login"]);
})->name("login.post");
Route::get("/register",fn()=>view("auth.register"))->name("register");
// Route::post('users/{id}', function ($id) {

// });
