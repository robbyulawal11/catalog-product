<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class AuthenticationController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validator Errors',
                'data' => $validator->errors()
            ]);
        }

        if(!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return response()->json([
                'success' => false,
                'message' => 'Email / Password salah',
                'data' => null
            ]);
        }

        $user = Auth::user();
        $token = $user->createToken('belajar-laravel-123')->plainTextToken;

        return response()->json([
            'success' => true,
            'message' => 'success',
            'data' => [
                'email' => $user->email,
                'token' => [
                    'type' => 'Bearer',
                    'token' => $token,
                ]
            ],
            ]);
    }
    public function logout(Request $request)
    {
        $user = Auth::user();

        $user->tokens()->delete();

        return response()->json([
            'success' => false,
            'message' => 'Success logout',
            'data' => null
        ]);
    }
}
