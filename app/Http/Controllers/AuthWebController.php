<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthWebController extends Controller
{
    //
    public function login(Request $request)
    {
                
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $credentials = $request->only('email','password');
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();

            return redirect('home');
        }
        return redirect('login');
    }
    
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
