<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($category = 'all')
    {
        if ($category === 'all') {
            $products = Product::all();
        } else {
            $products = Product::where('category', $category)->get();
        }

        return view('product.index', compact('products'));
    }

    public function show(Product $product)
    {
        return view('product.show', compact('product'));
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

        Product::create($validated);

        return back()->with('success', 'Product created!');
    }

    public function edit(Product $product)
    {
        return view('product.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name'          => ['required', 'min:3'],
            'description'   => ['required'],
            'category'      => ['required'],
            'price'         => ['required', 'integer'],
            'total_product' => ['required', 'integer'],
            'img_path'      => [],
        ]);

        $product->update($validated);

        return back()->with('success', 'Product updated!');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        
        return back()->with('success', 'Product deleted!');
    }
}