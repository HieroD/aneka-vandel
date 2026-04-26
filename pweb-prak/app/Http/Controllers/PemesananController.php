<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;

class PemesananController extends Controller
{
    public function index()
    {
        return view('dashboard.order');
    }

    public function show($id)
    {
        $order_id = $id;
        return view('order.show', compact('order_id'));
    }

    public function create()
    {
        return view('order.create');
    }

    public function store(Request $request)
    {
           
    }

    public function edit(Pemesanan $pemesanan)
    {
        //
    }

    public function update(Request $request, Pemesanan $pemesanan)
    {
        //
    }

    public function destroy(Pemesanan $pemesanan)
    {
        //
    }
}
