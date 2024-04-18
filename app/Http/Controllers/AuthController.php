<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Broadcast;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

use App\Models\RequestDetail;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('authToken');
            return redirect()->route('index', ['id' => $user->id]);

        }
        return redirect()->back()->withErrors(['email' => 'Invalid credentials']);
    }
    public function dashboard($id)
    {
        dd("hi");
        $user = User::find($id);
    
    
        return view('index', compact('user'));
    }

    public function logout()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $tokens = $user->tokens;
            $tokens->each(function ($token, $key) {
                $token->delete();
            });
    
            Auth::logout(); // Logging out the user
    
            return redirect('/welcome')->with('success', 'Logged out successfully.');
        }
    
        return redirect('/welcome')->with('error', 'Not authenticated');
    }
    

    public function create_user(){
        return view('Authentication.signup');
    }

   
    public function register(Request $request){

        $user = new User();
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->password = $request->password;

        $user->save();

        return redirect('/welcome')->with('success', 'User created successfully.');;
    }

  

}