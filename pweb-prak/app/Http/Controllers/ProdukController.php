<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index($kategori = 'all')
    {
        if($kategori === 'all'){
            $items = Produk::all();
            
        } 
        else{
            $items = Produk::where('kategori', $kategori)->get();
        }

        return view('catalog', compact('items'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Produk $produk)
    {
        //
    }

    public function edit(Produk $produk)
    {
        //
    }

    public function update(Request $request, Produk $produk)
    {
        //
    }

    public function destroy(Produk $produk)
    {
        //
    }
}
