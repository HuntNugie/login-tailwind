<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

Route::get("/",fn()=> redirect()->route("home"));
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
Route::post("/register",function(Request $request){
    $credential = $request->validate([
        "name" => "required | string",
        "email" => "required | email | unique:users",
        "password" => "required"
    ]);

    if($request->password !== $request->confirm_password){
        return back()->withErrors(["gagal" => "Confirmasi password tidak sama dengan password"]);
    }
   $user =  User::create([
        "name" => $request->name,
        "email" => $request->email,
        "password" => Hash::make($request->password)
    ]);
    Auth::login($user);

    return redirect()->intended('home');
})->name("register.store");
Route::post("/logout",function(){
    Auth::logout();
    session()->invalidate();
    return redirect()->route("login");
})->name("logout");


