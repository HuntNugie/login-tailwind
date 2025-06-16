<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(Request $request){
        $user = User::findOrFail(Crypt::decryptString($request->data));
        return view('auth.register',compact("user"));
    }
    public function store(Request $request,User $user){
    $credential = $request->validate([
        "password" => "required",
        "confirm_password" => "required"
    ]);

    if($request->password !== $request->confirm_password){
        return back()->withErrors(["gagal" => "Confirmasi password tidak sama dengan password"]);
    }


   $user->update([
        "password" => Hash::make($request->password),
        "email_verified_at" => now()
   ]);
   session()->forget("vermel");

    Auth::login($user);

    return redirect()->intended('home');
}
}
