<x-layout title="Pesanan Saya - Aneka Vandel">


    {{-- MAIN CONTENT --}}
    <div class="flex flex-1 max-w-7xl mx-auto w-full px-6 py-8 gap-6">

        {{-- SIDEBAR --}}
        <x-sidebar/>

        {{-- ORDERS CONTENT --}}
        <main class="flex-1 bg-white rounded-2xl shadow-sm p-8">
            <h1 class="text-2xl font-bold text-text mb-6">Pesanan Saya</h1>

            {{-- Filter Bar --}}
            <div class="flex items-center gap-4 mb-6">
                {{-- Search --}}
                <div class="flex-1">
                    <input
                        type="text"
                        placeholder="Cari pesanan..."
                        class="w-full border border-border rounded-lg px-4 py-2.5 text-sm text-text
                               focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary transition"
                    >
                </div>

                {{-- Date Picker (custom — left calendar icon) --}}
                <div class="relative">
                    <select
                        class="block w-full appearance-none border border-border rounded-lg pl-9 pr-8 py-2.5
                               text-sm text-text bg-white focus:outline-none focus:ring-2 focus:ring-primary/40
                               focus:border-primary transition cursor-pointer"
                    >
                        <option value="">Pilih Tanggal</option>
                        <option>Mei 2026</option>
                        <option>April 2026</option>
                        <option>Maret 2026</option>
                    </select>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-text-subtle absolute left-3 top-1/2 -translate-y-1/2 pointer-events-none"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-text-subtle absolute right-2 top-1/2 -translate-y-1/2 pointer-events-none"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </div>

                {{-- Status Filter --}}
                <div class="w-56">
                    <x-select
                        name="status"
                        placeholder="Status: Semua"
                        :options="[
                            'selesai' => 'Selesai',
                            'dikirim' => 'Dikirim',
                            'dikemas' => 'Dikemas',
                            'menunggu' => 'Menunggu Pembayaran',
                        ]"
                    />
                </div>
            </div>

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
                        {{-- Static dummy rows for display / development --}}
                        <tr class="hover:bg-surface-2 transition">
                            <td class="px-6 py-4 font-medium text-text">AV-20260520-001</td>
                            <td class="px-6 py-4 text-text-muted">20 Mei 2026</td>
                            <td class="px-6 py-4 text-text-muted">Vandel A - 50 Pcs</td>
                            <td class="px-6 py-4 text-text-muted">Rp 750.000</td>
                            <td class="px-6 py-4">
                                <x-badge variant="selesai">Selesai</x-badge>
                            </td>
                        </tr>
                        <tr class="hover:bg-surface-2 transition">
                            <td class="px-6 py-4 font-medium text-text">AV-20260522-002</td>
                            <td class="px-6 py-4 text-text-muted">22 Mei 2026</td>
                            <td class="px-6 py-4 text-text-muted">Vandel B - 10 Pcs</td>
                            <td class="px-6 py-4 text-text-muted">Rp 150.000</td>
                            <td class="px-6 py-4">
                                <x-badge variant="dikirim">Dikirim</x-badge>
                            </td>
                        </tr>
                        <tr class="hover:bg-surface-2 transition">
                            <td class="px-6 py-4 font-medium text-text">AV-20260525-003</td>
                            <td class="px-6 py-4 text-text-muted">25 Mei 2026</td>
                            <td class="px-6 py-4 text-text-muted">Vandel C - 3 Pcs</td>
                            <td class="px-6 py-4 text-text-muted">Rp 45.000</td>
                            <td class="px-6 py-4">
                                <x-badge variant="dikemas">Dikemas</x-badge>
                            </td>
                        </tr>
                        <tr class="hover:bg-surface-2 transition">
                            <td class="px-6 py-4 font-medium text-text">AV-20260528-004</td>
                            <td class="px-6 py-4 text-text-muted">28 Mei 2026</td>
                            <td class="px-6 py-4 text-text-muted">Kijangan</td>
                            <td class="px-6 py-4 text-text-muted">Rp 1.200.000</td>
                            <td class="px-6 py-4">
                                <x-badge variant="menunggu">Menunggu Pembayaran</x-badge>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </main>

    </div>

</x-layout>
