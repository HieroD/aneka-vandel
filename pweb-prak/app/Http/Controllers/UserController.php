<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function profile()
    {
        $user = Auth::user();

        return view('user.dashboard.profile', compact('user'));
    }

    public function updateAvatar(Request $request)
    {
        $request->validate([
            'avatar' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        $user = Auth::user();

        if ($user->avatar) {
            Storage::disk('public')->delete($user->avatar);
        }

        $user->update([
            'avatar' => $request->file('avatar')->store('avatars', 'public'),
        ]);

        return back()->with('success', 'Foto profil berhasil diperbarui!');
    }

    public function orders(Request $request)
    {
        $user = Auth::user();
        $orders =
        Order::with('products')
            ->where('user_id', $user->id)
            ->when($request->filled('status'), fn ($q) => $q->where('status', $request->status))
            ->when($request->filled('search'), fn ($q) => $q->where(function ($q) use ($request) {
                $q->where('id', 'like', '%'.$request->search.'%')
                    ->orWhereHas('products', fn ($pq) => $pq->where('name', 'like', '%'.$request->search.'%'));
            }))
            ->latest()
            ->get();

        return view('user.dashboard.orders', compact('orders'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['email', 'required', Rule::unique('users')->ignore($user->id)],
            'phone' => ['nullable', 'string', 'max:15'],
        ]);

        $user->updateOrFail([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
        ]);

        return redirect()->route('user.profile')->with('success', 'Profil berhasil diperbarui!');
    }
}
