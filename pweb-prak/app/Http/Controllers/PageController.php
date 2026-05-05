<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function home()
    {
        return view('front.home');
    }

    public function about()
    {
        return view('front.about');
    }
}
