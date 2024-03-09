<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed', 'min:6'],
            'DOB' => ['nullable', 'date'],
            'gender' => ['nullable', 'string'],
            'weight' => ['nullable', 'integer'],
            'height' => ['nullable', 'integer'],
            'bmi' => ['nullable', 'float'],
            'chronic_diseases' => ['nullable', 'array'],
            'allergies' => ['nullable', 'array'],
            'dietary_preferences' => ['nullable', 'array'],
            'health_goals' => ['nullable', 'array'],
            'ethical_meal_considerations' => ['nullable', 'array'],
        ]);

        $data['password'] = bcrypt($data['password']);

        $user = User::create($data);

        $token = $user->createToken(request()->ip());

        return response(['success' => true, 'data' => [
            'user' => $user,
            'token' => $token->plainTextToken
        ]]);
    }

    public function login(Request $request) {
        $data = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (! auth()->attempt($data)) {
            throw ValidationException::withMessages([
                'email' => 'Invalid Credentials.'
            ]);
        }

        $user = auth()->user();

        $token = $user->createToken(request()->ip());

        return response(['success' => true, 'data' => [
            'user' => $user,
            'token' => $token->plainTextToken
        ]]);

    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response(['success' => true, 'message' => 'Logged out successfully']);
    }
}
