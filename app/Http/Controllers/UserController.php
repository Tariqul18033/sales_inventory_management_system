<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function userRegister(Request $request){
        return User::create([
            'firstName'=>$request->firstName,
            'lastName'=>$request->lastName,
            'email'=>$request->email,
            'mobile'=>$request->mobile,
            'password'=>$request->password,


        ]);
    }
        
}
