<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\http\Traits\ApiResponseTrait;
use App\Http\Resources\UserResource;

class AuthController extends Controller
{
    use ApiResponseTrait;

    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user && Hash::check($request->password, $user->password)) {
            $user->tokens()->delete();
            return $this->ApiResponce(UserResource::make($user), 'login successfully');
        }
        return $this->ApiResponce(null, 'login failed', 401);
    }

    public function register(RegisterUserRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);
        return $this->ApiResponce(UserResource::make($user), 'user created successfully');
    }

    public function logout()
    {
        $user = Auth::user();
        $user->currentAccessToken()->delete();
        return $this->ApiResponce(null, 'token deleted successfully');
    }
}
