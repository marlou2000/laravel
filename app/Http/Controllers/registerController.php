<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class registerController extends Controller
{
    public function registerUser(Request $request){        
        $validatedData = $request->validate([
            'username' => 'required|string|min:6',
            'password' => 'required|string|min:6|confirmed',
        ], [
            'username.min' => 'The username must be greater than 6 characters.',
            'password.min' => 'The password must be greater than 6 characters.',
            'password.confirmed' => 'The passwords do not match.',
        ]);

        if ($request->has('username') && strlen($request->input('username')) < 6) {
            return redirect()->back()->withErrors(['username' => 'The username must be greater than 6 characters.']);
        }

        if ($request->has('password') && strlen($request->input('password')) < 6) {
            return redirect()->back()->withErrors(['password' => 'The password must be greater than 6 characters.']);
        }

        if ($request->has('password_confirmation') && strlen($request->input('password_confirmation')) < 6) {
            return redirect()->back()->withErrors(['password' => 'The password confirmation must be greater than 6 characters.']);
        }

        try {
            $user = new User();
            $user->username = $validatedData['username'];
            $user->password = bcrypt($validatedData['password']);
            $user->role = $request->role;
            $user->isExist = 1;
            $user->save();

            return redirect()->route('login');

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['other' => 'An error occurred while processing your request. Please try again later.']);
        }
    }
}
