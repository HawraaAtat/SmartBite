<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Broadcast;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Rules\AllergensRule;
use App\Rules\ChronicDiseasesRule;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Enums\ChronicDiseasesEnum;
use App\Models\MealHistory;
use GuzzleHttp\Client;




class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('authToken')->accessToken;
            return redirect()->route('dashboard');
        }
        return redirect()->back()->withErrors(['email' => 'Invalid credentials'])->withInput($request->only('email'));
    }


    public function logout()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $tokens = $user->tokens;
            $tokens->each(function ($token, $key) {
                $token->delete();
            });

            Auth::logout();

            return redirect('/welcome')->with('success', 'Logged out successfully.');
        }

        return redirect('/welcome')->with('error', 'Not authenticated');
    }


    public function create_user(){
        return view('Authentication.signup');
    }


    public function register(Request $request){
        $validatedData = $request->validate([
            'first_name' => ['required', 'min:3'],
            'last_name' => ['required', 'min:3'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'min:6'],
            'password_confirmation' => ['required', 'string', 'min:6', 'same:password'],
            'chronic_diseases' => ['nullable', 'array', new ChronicDiseasesRule],
            'allergies' => ['nullable', 'array', new AllergensRule],
            'ethical_meal_considerations' => ['nullable', 'boolean'],
        ]);

        $user = User::create($validatedData);

        if ($user) {
            Auth::login($user);
            return redirect()->route('dashboard');
        } else {
            return back();
        }
    }

    function forgetPassword(){
        return view('Authentication/forget-password');
    }

    Public function forgetPasswordPost(Request $request)
    {

        $request->validate([
            'email' => ['required', 'email', 'exists:users'],
        ]);

        // Check if email already exists in the password_reset_tokens table
        $existingToken = DB::table('password_reset_tokens')
                          ->where('email', $request->email)
                          ->first();

        if ($existingToken) {
            // Handle the case where the email already exists
            // For example, update the existing token or return an error message
            return redirect()->back()->withErrors(['email' => 'Password reset request already sent.']);
        } else {
            // Email does not exist, generate a new token and insert it into the table
            $token = Str::random(64);
            DB::table('password_reset_tokens')->insert([
                'email' => $request->email,
                'token' => $token,
                'created_at' => Carbon::now()
            ]);

            // Send the password reset email
            Mail::send("emails.forget-password", ['token'=> $token], function ($message) use ($request){
                $message -> to($request->email);
                $message -> subject("Reset Password");
            });

            return redirect()->route('forget.password')->with('success','We have sent an email to reset the password');
        }
    }

    function resetPassword($token){
        return view("Authentication/new-password", compact('token'));
    }

    public function resetPasswordPost(Request $request)
    {

        $request->validate([
            'email' => ['required', 'email', 'exists:users'],
            'password' => ['required', 'string', 'min:6'],
            'password_confirmation' => ['required', 'string', 'min:6', 'same:password'],
            'token' => ['required'],
        ]);


        $passwordResetToken = DB::table('password_reset_tokens')
            ->where('email', $request->email)
            ->where('token', $request->token)
            ->first();
        if (!$passwordResetToken) {
            // If the token is invalid or doesn't match the user's email, redirect back with an error
            return redirect()->route('forget.password')->with('error', 'Invalid password reset token.');
        }

        // Update the user's password
        User::where('email', $request->email)->update(['password' => Hash::make($request->password)]);

        // Delete the used token from the password_reset_tokens table
        DB::table('password_reset_tokens')->where('email', $request->email)->delete();

        // Redirect to the login page with a success message
        return redirect('/welcome')->with('success', 'User created successfully.');
    }
}
