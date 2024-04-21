<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Rules\AllergensRule;
use App\Rules\ChronicDiseasesArray;
use App\Rules\ChronicDiseasesRule;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->validate([
            'first_name' => ['required', 'min:3'],
            'last_name' => ['required', 'min:3'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed', 'min:6'],
            'chronic_diseases' => ['nullable', 'array', new ChronicDiseasesRule],
            'allergies' => ['nullable', 'array', new AllergensRule],
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
