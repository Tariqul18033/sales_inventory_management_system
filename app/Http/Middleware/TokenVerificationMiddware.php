<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Helper\JWTToken;

class TokenVerificationMiddware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $token = $request->header('token');
        $result = JWTToken::verifyToken($token);

        if($result == 'unauthorized' ){
           
            return response()->json([
                'status' => "error",
                'message' => "Unauthorized",

            ], 401);
        }
        else{
            $request->headers->set('email', $result);
        return $next($request);
        }
        
    }
}
