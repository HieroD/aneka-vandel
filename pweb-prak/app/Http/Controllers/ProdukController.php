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

        return view('product.catalog', compact('items'));
    }

    public function show($id)
    {
        $product_id = $id;
        return view('product.show', compact('product_id'));
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_produk' => ['required', 'min:3'],
            'deskripsi'   => ['required'],
            'kategori'    => ['required'],
            'harga'       => ['required', 'integer'],
            'path_gambar' => [],
        ]);

        Produk::create([
            'nama_produk' => $validated['nama_produk'],
            'deskripsi'   => $validated['deskripsi'],
            'kategori'    => $validated['kategori'],
            'harga'       => $validated['harga'],
            'path_gambar' => $validated['path_gambar'],
        ]);

        return back()->with('success', 'Product created!');
    }

    public function edit($id)
    {
        $product_id = $id;
        return view('product.edit', compact('product_id'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_produk' => ['required', 'min:3'],
            'deskripsi'   => ['required'],
            'kategori'    => ['required'],
            'harga'       => ['required', 'integer'],
            'path_gambar' => [],
        ]);

        Produk::where('id', $id)->update([
            'nama_produk' => $validated['nama_produk'],
            'deskripsi'   => $validated['deskripsi'],
            'kategori'    => $validated['kategori'],
            'harga'       => $validated['harga'],
            'path_gambar' => $validated['path_gambar'],
        ]);

        return back()->with('success', 'Product updated!');
    }

    public function destroy($id)
    {
        $product = Produk::find($id);
        $product->delete();
        
        return back()->with('success', 'Product deleted!');
    }
}
