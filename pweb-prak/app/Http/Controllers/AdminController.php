<?php

namespace App\Http\Controllers;

use App\Models\Order;
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

        return view('admin.dashboard.profile', compact('orders'));
    }

    public function statistic()
    {
        // some code idk

        return view('admin.dashboard.statistic');
    }
}
