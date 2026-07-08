<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
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

            $user = User::where('email', $googleUser->email)->first();

            if ($user) {
                $updateData = ['name' => $googleUser->name];

                if (! $user->gauth_id) {
                    $updateData['gauth_id'] = $googleUser->id;
                    $updateData['gauth_type'] = 'google';
                }

                $user->update($updateData);
            } else {
                $user = User::create([
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'gauth_id' => $googleUser->id,
                    'gauth_type' => 'google',
                    'password' => bcrypt(Str::random(16)),
                    'role' => 'member',
                    'email_verified_at' => now(),
                ]);
            }

            Auth::login($user);

            return redirect()->route('home');

        } catch (\Throwable $e) {
            return redirect()->route('login')->with('error', $e->getMessage());
        }
    }
}
