<?php

namespace App\Helper;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JWTToken
{
    public static function generateToken($user):string
    {
        $key = env('JWT_KEY');
        $payload = [
            'iss' => 'Laravel',
            
            'iat' => time(),
            'exp' => time() + (60 * 60),
            'userEmail' => $user->email,
        ];
            
       

        return JWT::encode($payload, $key, 'HS256');
    }


public static function verifyToken($token){
    $key = env('JWT_KEY');
    try{
    $decoded = JWT::decode($token, new Key($key, 'HS256'));

    return $decoded->userEmail;}
    catch(\Exception $e){
        return false;
    }
}
}