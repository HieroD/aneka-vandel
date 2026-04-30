<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($kategori = 'all')
    {
        if($kategori === 'all'){
            $items = Product::all();
        } 
        else{
            $items = Product::where('kategori', $kategori)->get();
        }

        return view('product.index', compact('items'));
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
            'name'          => ['required', 'min:3'],
            'description'   => ['required'],
            'category'      => ['required'],
            'price'         => ['required', 'integer'],
            'total_product' => ['required', 'integer'],
            'img_path'      => [],
        ]);

        Product::create([
            'name'          => $validated['name'],
            'description'   => $validated['description'],
            'category'      => $validated['category'],
            'price'         => $validated['price'],
            'total_product' => $validated['total_product'],
            'img_path'      => $validated['img_path'],
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
            'name'          => ['required', 'min:3'],
            'description'   => ['required'],
            'category'      => ['required'],
            'price'         => ['required', 'integer'],
            'total_product' => ['required', 'integer'],
            'img_path'      => [],
        ]);

        Product::where('id', $id)->update([
            'name'          => $validated['name'],
            'description'   => $validated['description'],
            'category'      => $validated['category'],
            'price'         => $validated['price'],
            'total_product' => $validated['total_product'],
            'img_path'      => $validated['img_path'],
        ]);

        return back()->with('success', 'Product updated!');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        
        return back()->with('success', 'Product deleted!');
    }
}
