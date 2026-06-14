<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index($category = 'all')
    {
        if ($category === 'all') {
            $products = Product::all();
        } else {
            $products = Product::where('category', $category)->get();
        }

        return view('front.catalog.index', compact('products'));
    }

    public function show(Product $product)
    {
        return view('front.catalog.show', compact('product'));
    }

    public function create()
    {
        return view('admin.catalog.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'min:3'],
            'description' => ['required'],
            'category' => ['required'],
            'price' => ['required', 'integer'],
            'total_product' => ['required', 'integer'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        if ($request->hasFile('image')) {
            $validated['img_path'] = $request->file('image')->store('products', 'public');
        }

        Product::create($validated);

        return back()->with('success', 'Product created!');
    }

    public function edit(Product $product)
    {
        return view('admin.catalog.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => ['required', 'min:3'],
            'description' => ['required'],
            'category' => ['required'],
            'price' => ['required', 'integer'],
            'total_product' => ['required', 'integer'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        if ($request->hasFile('image')) {
            $validated['img_path'] = $request->file('image')->store('products', 'public');
        }

        $product->update($validated);

        return back()->with('success', 'Product updated!');
    }

    public function destroy(Product $product)
    {
        if ($product->img_path) {
            Storage::disk('public')->delete($product->img_path);
        }

        $product->delete();

        return back()->with('success', 'Product deleted!');
    }
}
