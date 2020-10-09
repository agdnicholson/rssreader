<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Login extends Controller
{
    /** Login controller form
    */
    public function form()
    {
        if (Auth::check()) {
          // No need to see login page if logged in so redirect to dashboard.
          return redirect('/dashboard');
        }
        return view('login');
    }
    
    /** Authentication
    */
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Authenticated
            return redirect()->intended('/dashboard');
        } else {
            return view('login', ["error" => true]);
        }
    }
    
    /* Logout
    */
    public function logout()
    {
        auth()->logout();
        return redirect()->to('/');
    }
}