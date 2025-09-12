<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Auth\Authenticatable;


class AuthController extends Controller
{

    public function showLogin() {
        return view('auth.login');
    }

    public function login(Request $request) {

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('posts.index')->with('success', 'Logged In Successfully!');
        }

        return back()->withErrors([
            'invalid_credentials' => 'Invalid credentials'
        ])->onlyInput('email');
    }

    public function showRegister(Request $request) {
        return view('auth.register');
    }

    public function register(Request $request) {
        $credentials = $request->validate([
            'name' => 'required|min:4|max:30',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed'
        ]);
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->route('posts.index')->with('success', 'Registration successful!');

    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('posts.index')->with('success', 'Logged out successfully!');
    }
}
