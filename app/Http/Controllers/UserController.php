<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::all();
        return $this->ApiResponse(UserResource::collection($data), 'all users successfully');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $data = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);
        $data->createToken($request->userAgent())->plainTextToken;
        return $this->ApiResponse(UserResource::make($data), 'user created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = user::findOrFail($id);
        return $this->ApiResponse(UserResource::make($data), 'user show successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, string $id)
    {
        $data = User::findOrFail($id);
        $data->update([
            'name' => $request->name,
            'email' => $request->email,
            // 'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);
        return $this->ApiResponse(UserResource::make($data), 'user updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = User::findOrFail($id);
        if ($data->id != Auth::user()->id && Auth::user()->role == 1) {
            $data->delete();
            return $this->ApiResponse(null, 'user deleted successfully');
        }
        return $this->ApiResponse(null, 'cant  deleted successfully');
    }


    // Change Password
    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:6',
            'newPassword' => 'required|string|min:6',
        ]);
        $user = Auth::user();
        if ($user && Hash::check($request->password, $user->password)) {
            $user->password = Hash::make($request->newPassword);
            $user->save();
            return $this->ApiResponse(UserResource::make($user), 'user password updated successfully');
        } else {
            return $this->ApiResponse(null, 'old password not correct');
        }
    }
}
