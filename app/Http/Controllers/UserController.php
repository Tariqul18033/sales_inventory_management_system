<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function userRegister(Request $request){
       
        try{      
            User::create([
                'firstName'=>$request->firstName,
                'lastName'=>$request->lastName,
                'email'=>$request->email,
                'mobile'=>$request->mobile,
                'password'=>$request->password,


            ]);
            return response()->json([
                'status' => "success",
                'message' => "User Created Successfully",
            
            ],200);
        }
        catch(\Exception $e){
            return response()->json([
                'status' => "error",
                'message' => "User cannot be Created",
            
            ],400);
        }
    }

  
}




