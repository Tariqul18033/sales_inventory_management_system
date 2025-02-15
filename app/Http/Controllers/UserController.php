<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Helper\JWTToken;
use App\Mail\OTPMail;
use Illuminate\Support\Facades\Mail;

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



    //otpmail handling
    function sendOTPCode(Request $request){



        $email = $request->input('email');
        $otp = rand(1000,9999);

        $count = User::where('email',"=", $email)->count();

        if ($count == 1) {

            Mail::to($email)->send(new OTPMail($otp));
            User::where('email', $email)->update(['otp' => $otp]);

            return response()->json([
                'status' => "success",
                'message' => "OTP Sent Successfully",
                
            ]);



        }
        else{
            return response()->json([
                'status' => "error",
                'message' => "User does not exist",
            
            ],400);
        }
    }

    function verifyOTP(Request $request){
        

        $email = $request->input('email');
        $otp = $request->input('otp');

        $count = User::where('email',"=", $email)->where('otp',"=", $otp)->count();

        if ($count == 1) {

            User::where('email','=', $email)->update(['otp' => '0']);
            $token = JWTToken::generateTokenForOTP($email);

            return response()->json([
                'status' => "success",
                'message' => "OTP Verified Successfully",
                'token' => $token,],200);
            
        }
        else{
            return response()->json([
                'status' => "error",
                'message' => "OTP does not match"
            ], 400);
        }
    }


    //password reset
    function resetPassword(Request $request){
        
        try{
        $email = $request->header('email');
        $password = $request->input('password');
        User::where('email',"=", $email)->update(['password' => $password]);
        return response()->json([
            'status' => "success",
            'message' => "Password Reset Successfully",
            
        ],200);
    }
    catch(\Exception $e){
        return response()->json([
            'status' => "error",
            'message' => "Password cannot be Reset",
        ],400);
    }
    }





}




