<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            $user = User::updateOrcreate([
                'gauth_id' => $googleUser->id,
            ], [
                'name' => $googleUser->name,
                'email' => $googleUser->email,
                'gauth_id' => $googleUser->id,
                'gauth_type' => 'google',
                'password' => bcrypt(str()->random(16)),
                'role' => 'member',
                'email_verified_at' => now(),
            ]);

            Auth::login($user);

            return redirect()->route('home');

        } catch (\Throwable $e) {
            return redirect()->route('login')->with('error', $e->getMessage());
        }
    }
}
