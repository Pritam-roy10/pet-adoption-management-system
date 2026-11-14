<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    
    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users,username',
            'phone'    => 'required',
            'email'    => 'required|email|unique:users,email',
            'address'  => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'username' => $request->username,
            'phone'    => $request->phone,
            'email'    => $request->email,
            'address'  => $request->address,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect('/'); 
    }

  
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/'); 
        }

        return back()->withErrors([
            'username' => 'Incorrect username or password!',
        ]);
    }

   
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
