<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {   
        $validated = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if(Auth::attempt($validated)){
            $request->session()->regenerate();
            return redirect('/')->with('success', 'You are now succesfully logged in!');
        }

        return back()->withErrors([
            'match' => 'Email or password does not match'
        ])->onlyInput('email');
    }

    public function delete(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

}
