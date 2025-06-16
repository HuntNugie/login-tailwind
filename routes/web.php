<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\VerifEmailController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

Route::get("/",fn()=> redirect()->route("home"));
Route::get('/home', function () {
    return view('welcome');
})->name("home")->middleware(['auth','terverifikasi']);

// login
Route::get("/login",[LoginController::class,"index"])->name("login");
Route::post("/login",[LoginController::class,"push"])->name("login.post");

// register
Route::prefix("register")->group(function(){
    Route::get("/verifikasi-email",[VerifEmailController::class,"showForm"])->name("vermel");
    Route::post("/verifikasi-email",[VerifEmailController::class,"verifikasi"])->name("vermel.verifikasi");

    Route::get("/kode-otp",[VerifEmailController::class,"showOtp"])->name("vermel.otp")->middleware("verif-email");
    Route::post("/kode-otp/{id}",[VerifEmailController::class,"cekOtp"])->name("vermel.cekOtp");
    Route::get("/isi",[RegisterController::class,"index"])->name("register")->middleware("verif-email");
    Route::post("/register/{user:email}",[RegisterController::class,"store"])->name("register.store");
});
// verifikasi email untuk

Route::post("/logout",function(){
    Auth::logout();
    session()->invalidate();
    return redirect()->route("login");
})->name("logout");

Route::get("/pyus",function(){
    User::truncate();
    return "berhasil";
});
