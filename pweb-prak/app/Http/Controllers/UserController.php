<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function profile()
    {
        $user = Auth::user();
        return view('user.dashboard.profile', compact('user'));
    }

    public function orders()
    {
        $user = Auth::user();
        $orders = 
        Order::with('products')
        ->where('user_id', $user->id)
        ->latest()
        ->get();
        
        return view('user.dashboard.orders', compact('orders'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name'  => ['required', 'max:255'],
            'email' => ['email', 'required', Rule::unique('users')->ignore($user->id)],
            'phone' => [''],
        ]);
        
        $user->updateOrFail([
            'name'  => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            ]);
        
        return redirect()->route('user.profile')->with('success', 'Profil berhasil diperbarui!');
    }
}
