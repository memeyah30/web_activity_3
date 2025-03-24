<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // Get user details (if needed)
    public function show($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }
}
