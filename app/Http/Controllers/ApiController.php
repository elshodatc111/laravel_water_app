<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class ApiController extends Controller{
    public function login(Request $request){
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $Users = User::where('email',$request->email)->first();
            if($Users->type == 'despetcher'){
                return response()->json([
                    'status' => 'false',
                    'message' => "Kirishga ruxsatingiz yo'q",
                ],501);
            }
            if($Users->status == 'false'){
                return response()->json([
                    'status' => 'false',
                    'message' => "Tizimga kirish ruxsatingiz tasdiqlangan",
                ],501);
            }
            $user = Auth::user();
            $token = $user->createToken('authToken')->plainTextToken;
            return response()->json([
                'status' => 200,
                'token' => $token,
            ],200);
        } else {
            return response()->json([
                'status' => 401,
                'message' => 'Login yoki parol noto\'g\'ri'
            ], 401);
        }
    }





    
}
