<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;

class PageController extends Controller
{
    public function home()
    {
        $products = Product::latest()->take(4)->get();

        $admin = User::where('role', 'admin')->first();

        $adminEmail = $admin?->email ?? 'admin@gmail.com';
        $adminWa = $admin?->phone ?? '6281234567890';

        return view('front.home', compact('products', 'adminEmail', 'adminWa'));

    }

    public function about()
    {
        return view('front.about');
    }
}
