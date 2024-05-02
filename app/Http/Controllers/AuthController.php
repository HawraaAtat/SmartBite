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
            return redirect()->route('dashboard', ['id' => $user->id]);
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
            'password' => ['required', 'confirmed', 'min:6'],
            'chronic_diseases' => ['nullable', 'array', new ChronicDiseasesRule],
            'allergies' => ['nullable', 'array', new AllergensRule],
            'ethical_meal_considerations' => ['nullable', 'boolean'],
        ]);

        $user = User::create($validatedData);

        if ($user) {
            Auth::login($user);
            return redirect()->route('dashboard', ['id' => $user->id]);
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
            'email' => 'required|email|exists:users',
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
            'email' => 'required|email|exists:users',
            'password' => 'required|string|confirmed',
            'token' => 'required',
        ]);


        $passwordResetToken = DB::table('password_reset_tokens')
            ->where('email', $request->email)
            ->where('token', $request->token)
            ->first();
        if (!$passwordResetToken) {
            return redirect()->route('forget.password')->with('error', 'Invalid password reset token.');
        }

        User::where('email', $request->email)->update(['password' => Hash::make($request->password)]);
        DB::table('password_reset_tokens')->where('email', $request->email)->delete();
        return redirect('/welcome')->with('success', 'User created successfully.');
    }

    
    public function profile($id){
        $user = User::find($id);

        return view('profile',compact('user'));
    }

    public function edit_profile($id){
        $user = User::find($id);

        return view('edit-profile',compact('user'));
    }

    public function update_profile(Request $request,$id){
        $validatedData = $request->validate([
            'first_name' => ['required', 'min:3'],
            'last_name' => ['required', 'min:3'],
            'email' => ['required', 'email'],
            'chronic_diseases' => ['nullable', 'array', new ChronicDiseasesRule],
            'allergies' => ['nullable', 'array', new AllergensRule],
            'ethical_meal_considerations' => ['nullable', 'boolean'],
        ]);
    
        $user = User::findOrFail($id);
        $user->fill($validatedData);
    
        if ($request->has('password')) {
            $user->password = bcrypt($request->password);
        }
    
        $user->save();
    
        return redirect()->route('dashboard', ['id' => $user->id])->with('success', 'User information updated successfully.');
    }

}
