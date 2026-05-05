<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function profile()
    {
        $admin = Auth::user();

        if($admin->role !== 'admin'){ 
            abort(403, 'Unauthorized action.');
        }
        
        return view('admin.dashboard.profile', compact('admin'));
    }

    public function orders()
    {
        $admin = Auth::user();

        if($admin->role !== 'admin'){ 
            abort(403, 'Unauthorized action.');
        }

        $orders = Order::with('products')->latest()->get();

        return view('admin.dashboard.orders', compact('orders'));
    }

    public function statistic()
    {
        $admin = Auth::user();

        if($admin->role !== 'admin'){ 
            abort(403, 'Unauthorized action.');
        }

        // sales trend
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();

        $salesTrend = [ // inisiate assoc array for days
            'MONDAY'    => 0,
            'TUESDAY'   => 0,
            'WEDNESDAY' => 0,
            'THURSDAY'  => 0,
            'FRIDAY'    => 0,
            'SATURDAY'  => 0,
            'SUNDAY'    => 0,
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
        $totalCustomers = User::where('role', '!=' ,'admin')->count();
        

        $latestOrders = Order::with('products')->latest()->get();

        return view('admin.dashboard.statistic', compact(
            'salesTrend',
            'totalSales',
            'totalCustomers', 
            'totalOrders',
            'latestOrders'
            ));
    }
}
