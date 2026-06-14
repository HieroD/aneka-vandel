<?php

namespace App\Http\Controllers;

use App\Models\Product;

class PageController extends Controller
{
    public function home()
    {
        $products = Product::latest()->take(4)->get();

        return view('front.home', compact('products'));

    }

    public function about()
    {
        return view('front.about');
    }
}
