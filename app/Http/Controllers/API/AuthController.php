<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Helpers\ApiResponse;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function login(Request $request)
    {

        $request->validate([
            'login' => 'required',   // email or mobile
            'password' => 'required'
        ]);

        // find user by email or mobile
        $user = User::where('email', $request->login)
                    ->orWhere('mobile', $request->login)
                    ->first();

        if (!$user) {
            return ApiResponse::error('User not found');
        }

        if (!Hash::check($request->password, $user->password)) {
            return ApiResponse::error('Invalid password');
        }

        // generate token (Sanctum)
        $token = $user->createToken('authToken')->plainTextToken; 

        // get user role
        $role = $user->getRoleNames()->first();
        $permissions = $user->getAllPermissions()->pluck('name');

        return ApiResponse::success('Login successful', [
            'token' => $token,
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'mobile' => $user->mobile,
                'role' => $role,
                'permissions' => $permissions
            ]
        ]);
    }

    public function logout(Request $request)
    {
        try {

            // 🔥 delete current token (recommended)
            $request->user()->currentAccessToken()->delete();

            return ApiResponse::success('Logout successful');

        } catch (\Exception $e) {

            return ApiResponse::error($e->getMessage());

        }
    }
}