<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{

    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => ['required', 'max:255'],
            'last_name'  => ['required', 'max:255'],
            'email'      => ['required', 'email', 'unique:users,email'],
            'password'   => ['required', 'confirmed', 'min:8'],
        ]);

        $user = User::create([
            'name'     => $validated['first_name'] . ' ' . $validated['last_name'],
            'email'    => $validated['email'],
            'password' => $validated['password'],
            'role'     => 'member'
        ]);

        event(new Registered($user));

        Auth::login($user);

        $request->session()->regenerate();
    
        return redirect()->route('verification.notice');
    }
}
