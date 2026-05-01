<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $admin = Auth::user();

        if($admin->role !== 'admin'){ 
            abort(403, 'Unauthorized action.');
        }
        
        return view('admin.dashboard.profile', compact('admin'));
    }

    public function statistic()
    {
        // some code idk

        return view('admin.dashboard.statistic');
    }
}
