<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth; // ✅ Import Auth

class UserController extends Controller
{
    public function login(Request $request) {
        $incomingFields = $request->validate([
            'loginname' => 'required',
            'loginpassword' => 'required'
        ]);

        // ✅ Use Auth::attempt() correctly
        if (Auth::attempt(['username' => $incomingFields['loginname'], 'password' => $incomingFields['loginpassword']])) {
            $request->session()->regenerate();
            return redirect('/');
        }
        
        return back()->withErrors(['login' => 'Invalid login credentials.']);
    }

    public function logout() {
        Auth::logout(); // ✅ Use Auth::logout()
        return redirect('/login');
    }

   
}
