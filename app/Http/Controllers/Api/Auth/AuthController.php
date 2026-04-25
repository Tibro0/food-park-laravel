<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ], 400);
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = User::find(Auth::user()->id);

            if ($user->role == 'admin') {
                $token = $user->createToken('token')->plainTextToken;
                return response()->json([
                    'status' => 200,
                    'token' => $token,
                    'id' => $user->id,
                    'name' => $user->name,
                    'role' => $user->role,
                ], 200);
            } elseif ($user->role == 'user') {
                $token = $user->createToken('token')->plainTextToken;
                return response()->json([
                    'status' => 200,
                    'token' => $token,
                    'id' => $user->id,
                    'name' => $user->name,
                    'role' => $user->role,
                ], 200);
            }
            
        } elseif (!User::where(['email' => $request->email])->exists()) {
            return response()->json([
                'status' => 400,
                'errors' => [
                    'email' => ['Your Email is Incorrect.']
                ],
            ], 400);
        } elseif (!User::where(['password' => $request->password])->exists()) {
            return response()->json([
                'status' => 400,
                'errors' => [
                    'password' => ['Your Password is Incorrect.']
                ],
            ], 400);
        } else {
            return response()->json([
                'status' => 400,
                'errors' => [
                    'email' => ['These credentials do not match our records.']
                ],
            ], 400);
        }
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Successfully Logged Out!',
        ]);
    }
}
