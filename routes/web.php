<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Middleware\TokenVerificationMiddware;

// test

Route::get('/', function () {
    return view('welcome');
});
Route::get('/user-register', function () {
    return view('test');
    
});
Route::get('/user-login', function () {
    return view('test2');
    
});




Route::post('/user-register', [UserController::class, 'userRegister']);

Route::post('/user-login', [UserController::class, 'userLogin']);


//sendOTPCode

Route::post('/send-otp', [UserController::class, 'sendOTPCode']);

//verifyOTP

Route::post('/verify-otp', [UserController::class, 'verifyOTP']);


//resetPassword

Route::post('/reset-password', [UserController::class, 'resetPassword'])
->middleware(TokenVerificationMiddware::class);