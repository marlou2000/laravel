<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function verifyCredential(Request $request)
    {        
        $username = $request->input('username');
        $password = $request->input('password');

        if (Auth::attempt(['username' => $username, 'password' => $password, 'isExist' => 1])) {
            $user = Auth::user();

            $request->session()->put('user_id', $user->id);

            return redirect('/post');
        } 
        
        else {
            return redirect('/')->with('error', 'Invalid username or password');
        }
    }
}
