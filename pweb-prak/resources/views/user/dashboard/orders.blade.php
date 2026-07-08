<x-layout title="Pesanan Saya - Aneka Vandel">


    {{-- MAIN CONTENT --}}
    <div class="flex flex-1 max-w-7xl mx-auto w-full px-6 py-8 gap-6">

        {{-- SIDEBAR --}}
        <x-sidebar/>

        {{-- ORDERS CONTENT --}}
        <main class="flex-1 bg-white rounded-2xl shadow-sm p-8">
            <h1 class="text-2xl font-bold text-text mb-6">Pesanan Saya</h1>

            {{-- Filter Bar --}}
            <form method="GET" action="" id="filterFormUser">
                <div class="flex items-center gap-4 mb-6">
                    {{-- Search --}}
                    <div class="flex-1">
                        <input
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            placeholder="Cari pesanan..."
                            data-search-debounce
                            data-form-id="filterFormUser"
                            class="w-full border border-border rounded-lg px-4 py-2.5 text-sm text-text
                                   focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary transition"
                        >
                    </div>

                    {{-- Status Filter --}}
                    <div class="w-56">
                        <x-select
                            name="status"
                            placeholder="Status: Semua"
                            onchange="document.getElementById('filterFormUser').submit()"
                            :options="[
                                'selesai' => 'Selesai',
                                'dikirim' => 'Dikirim',
                                'dikemas' => 'Dikemas',
                                'menunggu' => 'Menunggu Pembayaran',
                            ]"
                        />
                    </div>
                </div>
            </form>

            {{-- Orders Table --}}
            <div class="border border-border rounded-xl overflow-hidden">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="bg-white border-b border-border">
                            <th class="text-left px-6 py-4 font-semibold text-text-muted">Order ID</th>
                            <th class="text-left px-6 py-4 font-semibold text-text-muted">Tanggal</th>
                            <th class="text-left px-6 py-4 font-semibold text-text-muted">Produk</th>
                            <th class="text-left px-6 py-4 font-semibold text-text-muted">Total Harga</th>
                            <th class="text-left px-6 py-4 font-semibold text-text-muted">Status Pesanan</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-border">
                        @forelse($orders ?? [] as $order)
                            @forelse ($order->products as $product)
                                <tr class="hover:bg-surface-2 transition">
                                    <td class="px-6 py-4 font-medium text-text">{{ $order->id }}</td>
                                    <td class="px-6 py-4 text-text-muted">{{ \Carbon\Carbon::parse($order->order_date)->translatedFormat('d M Y') }}</td>
                                    <td class="px-6 py-4 text-text-muted">{{ $product->name }}</td>
                                    <td class="px-6 py-4 text-text-muted">Rp {{ number_format($product->pivot->total_price, 0, ',', '.') }}</td>
                                    <td class="px-6 py-4">
                                        @php
                                            $status = strtolower($order->status ?? '');
                                        @endphp
                                        @if($status === 'selesai')
                                            <x-badge variant="selesai">Selesai</x-badge>
                                        @elseif($status === 'dikirim')
                                            <x-badge variant="dikirim">Dikirim</x-badge>
                                        @elseif($status === 'dikemas')
                                            <x-badge variant="dikemas">Dikemas</x-badge>
                                        @elseif($status === 'menunggu')
                                            <x-badge variant="menunggu">Menunggu Pembayaran</x-badge>
                                        @else
                                            <x-badge>{{ $order->status ?? '—' }}</x-badge>
                                        @endif
                                    </td>
                                </tr>
                            @empty

                            @endforelse

                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-12 text-text-subtle text-[14px]">Belum ada pesanan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </main>

    </div>

</x-layout>
