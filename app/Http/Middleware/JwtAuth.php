<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class JwtAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        /* Check if token is expired and authorized as told in this github issue
        https://github.com/tymondesigns/jwt-auth/issues/1431
        With exceptions we can differentiate if a token is present but expiry
        or if a token is not present or if a token is present and not expiry*/
        try {
            if(\PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth::parseToken()->toUser()) return $next($request);
        } catch (\PHPOpenSourceSaver\JWTAuth\Exceptions\TokenExpiredException $th) {
            Log::error($th);
            return response()->json([
                'Status'=>'Unauthorized',
                'Message'=>'Token Expired'
            ],401);
        }catch(\PHPOpenSourceSaver\JWTAuth\Exceptions\JWTException $tr){
            Log::error($tr);
            return response()->json([
                'status' => 'error',
                'message' => 'No authorized',
            ], 401);
        }
     /*   if (auth('api')->check()) {
            //Log::info('ok');
            return $next($request);
        }
        
        return response()->json([
            'status' => 'error',
            'message' => 'No authorized',
        ], 401);*/
    }
}
