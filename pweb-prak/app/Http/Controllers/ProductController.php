<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request, $category = 'all')
    {
        $query = Product::query();

        if ($category !== 'all') {
            $query->whereRaw('LOWER(category) = ?', [strtolower($category)]);
        }

        if ($request->filled('search')) {
            $query->where('name', 'like', '%'.$request->search.'%');
        }

        $products = $query->get();

        $waNumber = User::where('role', 'admin')->value('phone') ?? '6281234567890';

        return view('front.catalog.index', compact('products', 'waNumber'));
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
            if ($product->img_path) {
                Storage::disk('public')->delete($product->img_path);
            }

            $validated['img_path'] = $request->file('image')->store('products', 'public');
        }

        $product->update($validated);

        return back()->with('success', 'Product updated!');
    }

    public function destroy(Product $product)
    {
        try {
            if ($product->img_path) {
                Storage::disk('public')->delete($product->img_path);
            }

            $product->delete();
        } catch (QueryException $e) {
            return back()->with('error', 'Produk tidak dapat dihapus karena masih memiliki riwayat pesanan.');
        }

        return back()->with('success', 'Product deleted!');
    }
}
