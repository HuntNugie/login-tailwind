<?php

namespace App\Http\Controllers;

use App\Mail\vermel;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;

class VerifEmailController extends Controller
{
    public function showForm(){
        return view('auth.verifEmail');
    }
    public function verifikasi(Request $request){
        $request->validate(["email" => "required | email | unique:users","name" => "required | string"]);
        // regenerate tokoen

        $token = rand(100000, 999999);
        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "otp" => $token,
            "expired_otp" => now()->addDay()
        ]);
        // buat session
        session(["vermel" => true]);
        // enkripsi id user
        $id =  Crypt::encryptString($user->id);
        Mail::to($request->email)->send(new vermel($token,$request->name));
        return redirect()->to("/register/kode-otp?data=".urlencode($id));
    }
    public function showOtp(Request $request){
        $id = $request->data;
        return view("auth.otp",compact("id"));
    }
    public function cekOtp(Request $request,$id){
        $user = User::findOrFail(Crypt::decryptString($id));
        if($user->otp == $request->otp ){
            return redirect()->to("/register/isi?data=".urlencode($id));
        }else{
            return redirect()->back()->withErrors(["gagal" => "kode otp salah"]);
        }
    }
}
