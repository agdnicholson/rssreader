<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class Signup extends Controller
{
    /**
     * Signup Controller
     */
    public function form()
    {
        if (Auth::check()) {
          // No need to see signup page if logged in so redirect to dashboard.
          return redirect('/dashboard');
        }
        return view('signup');
    }

    /**
     * Registration handling
     */
    public function signup(Request $request)
    {
        // validation
        $this->validate(request(), [
            'email' => 'required|email:rfc,dns',
            'password' => 'required|same:password_confirm'
        ]);

        // check email is unique.
        $existingUser = User::where('email', '=', $request->email)->first();
        if($existingUser) {
            return view('signup', ['error'=>true]);
        }

        // save user (also hash password)
        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // login & redirect
        auth()->login($user);
        return redirect()->to('/dashboard');
    }
}