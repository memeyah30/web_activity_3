<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Show Login Page
    public function index()
    {
        return view('login');
    }

    // Handle Login
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('std.myView');
        }

        return back()->withErrors(['error' => 'Invalid email or password']);
    }

    // Handle Logout
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
