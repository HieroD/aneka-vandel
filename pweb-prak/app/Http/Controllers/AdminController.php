<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function profile()
    {
        $admin = Auth::user();

        return view('admin.dashboard.profile', compact('admin'));
    }

    public function updateProfile(Request $request)
    {
        $admin = Auth::user();

        $validated = $request->validate([
            'name' => ['required', 'max:255'],
            'phone' => ['nullable', 'max:15'],
        ]);

        $admin->update($validated);

        return redirect()->route('admin.profile')->with('success', 'Profil berhasil diperbarui!');
    }

    public function updateAvatar(Request $request)
    {
        $request->validate([
            'avatar' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        $admin = Auth::user();

        if ($admin->avatar) {
            Storage::disk('public')->delete($admin->avatar);
        }

        $admin->update([
            'avatar' => $request->file('avatar')->store('avatars', 'public'),
        ]);

        return back()->with('success', 'Foto profil berhasil diperbarui!');
    }

    public function orders(Request $request)
    {
        $admin = Auth::user();

        $orders = Order::with('products', 'user')
            ->when($request->filled('status'), fn($q) => $q->where('status', $request->status))
            ->when($request->filled('date'), fn($q) => $q->whereDate('created_at', $request->date))
            ->when($request->filled('search'), function ($q) use ($request) {
                $q->where(function ($q) use ($request) {
                    $q->where('id', 'like', '%' . $request->search . '%')
                        ->orWhereHas('products', fn($sq) => $sq->where('name', 'like', '%' . $request->search . '%'));
                });
            })
            ->latest()->get();

        return view('admin.dashboard.orders', compact('orders'));
    }

    public function statistic(Request $request)
    {
        $admin = Auth::user();

        // sales trend
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();

        $salesTrend = [ // inisiate assoc array for days
            'MONDAY' => 0,
            'TUESDAY' => 0,
            'WEDNESDAY' => 0,
            'THURSDAY' => 0,
            'FRIDAY' => 0,
            'SATURDAY' => 0,
            'SUNDAY' => 0,
        ];

        $weeklyOrders = Order::with('products')
            ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
            ->get();

        foreach ($weeklyOrders as $order) {
            $orderDay = strtoupper($order->created_at->format('l'));

            $orderSales = $order->total_price;

            $salesTrend[$orderDay] += $orderSales;
        }

        // total sales
        $orders = Order::with('products')->get();
        $totalSales = $orders->sum('total_price');

        // total orders
        $totalOrders = Order::count();

        // total customers
        $totalCustomers = User::where('role', '!=', 'admin')->count();

        $recentOrders = Order::with('products', 'user')
            ->when($request->filled('status'), fn($q) => $q->where('status', $request->status))
            ->when($request->filled('search'), function ($q) use ($request) {
                $q->where(function ($q) use ($request) {
                    $q->where('id', 'like', '%' . $request->search . '%')
                        ->orWhereHas('products', fn($sq) => $sq->where('name', 'like', '%' . $request->search . '%'));
                });
            })
            ->latest()->get();

        return view('admin.dashboard.statistic', compact(
            'salesTrend',
            'totalSales',
            'totalCustomers',
            'totalOrders',
            'recentOrders',
        ));
    }
}
