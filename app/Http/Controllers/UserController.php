<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Helper\JWTToken;

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




    function userLogin(Request $request){
        $count = User::where("email","=",$request->email)
        ->where("password","=",$request->password)-> count();


        if($count == 1){
            $token = JWTToken::generateToken($request->email);
            return response()->json([
                'status' => "success",
                'message' => "User Logged In Successfully",
                'token' => $token
                
            ]);
        }
        else{
            return response()->json([
                'status' => "error",
                'message' => "User cannot be Logged In",
            
            ],400);
        }
        
    }

  
}




