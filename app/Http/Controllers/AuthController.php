<?php

namespace App\Http\Controllers;

use App\Http\Middleware\JwtAuth;
use App\Models\Pelicula;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth as FacadesJWTAuth;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware(JwtAuth::class)->except(['login','register']);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        $credentials = $request->only('email', 'password');

        $token = Auth::guard('api')->attempt($credentials);
        if (!$token) return response()->json(['status' => 'error','message' => 'Wrong credentials',], 404);
        /* Intellisense doesnt detect factory method but still works*/
        $user =Auth::guard('api')->user();
        return response()->json([
            'status' => 'success',
            'user' => $user,
            'authorization' => [
                'access_token' => $token,
                'token_type' => 'bearer',
                'expires_in' => Auth::guard('api')->factory()->getTTL()*60
            ]
        ]);
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:15'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'Success' => 'Has sido registrado correctamente'
        ], 200);
    }
}
