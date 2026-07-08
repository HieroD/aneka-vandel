<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function create(Product $product)
    {
        return view('user.order.create', compact('product'));
    }

    public function store(Request $request, Product $product)
    {
        $validated = $request->validate([
            'total_order' => ['required', 'integer', 'min:1', 'max:'.$product->total_product],
            'nama' => ['required', 'string', 'max:255'],
            'whatsapp' => ['required', 'string', 'max:20'],
            'alamat' => ['required', 'string'],
            'pengiriman' => ['required', 'in:jne,jt,cargo'],
        ]);

        $total_price = $validated['total_order'] * $product->price;

        // transaction
        try {
            DB::beginTransaction();

            $order = Auth::user()->orders()->create([
                'status' => 'menunggu',
                'order_date' => now(),
                'nama' => $validated['nama'],
                'whatsapp' => $validated['whatsapp'],
                'alamat' => $validated['alamat'],
                'shipping_method' => $validated['pengiriman'],
            ]);

            $order->products()->attach($product->id, [
                'total_order' => $validated['total_order'],
                'total_price' => $total_price,
            ]);

            $product->decrement('total_product', $validated['total_order']);

            DB::commit();

            return redirect()->route('catalog.index')->with('success', 'Order placed!');

        } catch (\Throwable $e) {
            DB::rollback();

            return back()->with('error', 'Transaction failed!'.$e->getMessage());
        }
    }

    public function update(Request $request, Order $order)
    {

        $validated = $request->validate([
            'status' => 'sometimes|string',
            'order_date' => 'sometimes|date',
            'completion_date' => 'sometimes|date',
        ]);

        $order->update($validated);

        return redirect()->route('admin.orders')->with('success', 'Order updated!');
    }
}
