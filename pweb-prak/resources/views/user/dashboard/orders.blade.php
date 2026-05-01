<x-layout title="Pesanan Saya - Aneka Vandel">


    {{-- MAIN CONTENT --}}
    <div class="flex flex-1 max-w-7xl mx-auto w-full px-6 py-8 gap-6">

        {{-- SIDEBAR --}}
        <aside class="w-60 shrink-0">
            <div class="mb-6">
                <h2 class="text-lg font-bold text-gray-800">Halo, {{ auth()->user()->name ?? 'Azka' }}! 👋</h2>
                <p class="text-sm text-gray-500">Bagaimana kabarmu?</p>
            </div>

            <nav class="flex flex-col gap-2">
                <a href=""
                    class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-xl font-medium text-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5.121 17.804A8 8 0 1118.88 6.196M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    Profil Saya
                </a>

                <a href=""
                    class="sidebar-link active flex items-center gap-3 px-4 py-3 rounded-xl font-medium text-gray-800 bg-white shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-600" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                    Pesanan Saya
                </a>
            </nav>

            {{-- Keluar --}}
            <div class="mt-8">
                <form method=""
                    @csrf
                    <button type="submit"
                        class="flex items-center gap-3 px-4 py-3 text-red-600 hover:text-red-700 font-medium transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h6a2 2 0 012 2v1" />
                        </svg>
                        Keluar
                    </button>
                </form>
            </div>
        </aside>

        {{-- ORDERS CONTENT --}}
        <main class="flex-1 bg-white rounded-2xl shadow-sm p-8">
            <h1 class="text-2xl font-bold text-gray-800 mb-6">Pesanan Saya</h1>

            {{-- Filter Bar --}}
            <div class="flex items-center gap-4 mb-6">
                {{-- Search --}}
                <div class="flex-1">
                    <input
                        type="text"
                        placeholder="Cari pesanan..."
                        class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm text-gray-600
                               focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                </div>

                {{-- Date Picker --}}
                <div class="relative">
                    <select class="filter-select appearance-none border border-gray-300 rounded-lg pl-9 pr-8 py-2.5
                                   text-sm text-gray-600 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500
                                   focus:border-transparent transition cursor-pointer">
                        <option value="">Pilih Tanggal</option>
                        <option>Mei 2026</option>
                        <option>April 2026</option>
                        <option>Maret 2026</option>
                    </select>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-400 absolute left-3 top-1/2 -translate-y-1/2 pointer-events-none"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-400 absolute right-2 top-1/2 -translate-y-1/2 pointer-events-none"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </div>

                {{-- Status Filter --}}
                <div class="relative">
                    <select class="filter-select appearance-none border border-gray-300 rounded-lg px-4 pr-8 py-2.5
                                   text-sm text-gray-600 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500
                                   focus:border-transparent transition cursor-pointer">
                        <option value="">Status: Semua</option>
                        <option value="selesai">Selesai</option>
                        <option value="dikirim">Dikirim</option>
                        <option value="dikemas">Dikemas</option>
                        <option value="menunggu">Menunggu Pembayaran</option>
                    </select>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-400 absolute right-2 top-1/2 -translate-y-1/2 pointer-events-none"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </div>
            </div>

            {{-- Orders Table --}}
            <div class="border border-gray-200 rounded-xl overflow-hidden">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="bg-white border-b border-gray-200">
                            <th class="text-left px-6 py-4 font-semibold text-gray-700">Order ID</th>
                            <th class="text-left px-6 py-4 font-semibold text-gray-700">Tanggal</th>
                            <th class="text-left px-6 py-4 font-semibold text-gray-700">Produk</th>
                            <th class="text-left px-6 py-4 font-semibold text-gray-700">Total Harga</th>
                            <th class="text-left px-6 py-4 font-semibold text-gray-700">Status Pesanan</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($orders ?? [] as $order)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 font-medium text-gray-800">{{ $order->order_id }}</td>
                            <td class="px-6 py-4 text-gray-600">{{ \Carbon\Carbon::parse($order->tanggal)->translatedFormat('d M Y') }}</td>
                            <td class="px-6 py-4 text-gray-600">{{ $order->produk }}</td>
                            <td class="px-6 py-4 text-gray-600">Rp {{ number_format($order->total_harga, 0, ',', '.') }}</td>
                            <td class="px-6 py-4">
                                @php
                                $statusClass = match($order->status) {
                                'selesai' => 'badge-selesai',
                                'dikirim' => 'badge-dikirim',
                                'dikemas' => 'badge-dikemas',
                                default => 'badge-menunggu',
                                };
                                $statusLabel = match($order->status) {
                                'selesai' => 'Selesai',
                                'dikirim' => 'Dikirim',
                                'dikemas' => 'Dikemas',
                                default => 'Menunggu Pembayaran',
                                };
                                @endphp
                                <span class="order-badge {{ $statusClass }}">{{ $statusLabel }}</span>
                            </td>
                        </tr>
                        @empty
                        {{-- Static dummy rows for display / development --}}
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 font-medium text-gray-800">AV-20260520-001</td>
                            <td class="px-6 py-4 text-gray-600">20 Mei 2026</td>
                            <td class="px-6 py-4 text-gray-600">Vandel A - 50 Pcs</td>
                            <td class="px-6 py-4 text-gray-600">Rp 750.000</td>
                            <td class="px-6 py-4">
                                <span class="order-badge badge-selesai">Selesai</span>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 font-medium text-gray-800">AV-20260522-002</td>
                            <td class="px-6 py-4 text-gray-600">22 Mei 2026</td>
                            <td class="px-6 py-4 text-gray-600">Vandel B - 10 Pcs</td>
                            <td class="px-6 py-4 text-gray-600">Rp 150.000</td>
                            <td class="px-6 py-4">
                                <span class="order-badge badge-dikirim">Dikirim</span>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 font-medium text-gray-800">AV-20260525-003</td>
                            <td class="px-6 py-4 text-gray-600">25 Mei 2026</td>
                            <td class="px-6 py-4 text-gray-600">Vandel C - 3 Pcs</td>
                            <td class="px-6 py-4 text-gray-600">Rp 45.000</td>
                            <td class="px-6 py-4">
                                <span class="order-badge badge-dikemas">Dikemas</span>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 font-medium text-gray-800">AV-20260528-004</td>
                            <td class="px-6 py-4 text-gray-600">28 Mei 2026</td>
                            <td class="px-6 py-4 text-gray-600">Kijangan</td>
                            <td class="px-6 py-4 text-gray-600">Rp 1.200.000</td>
                            <td class="px-6 py-4">
                                <span class="order-badge badge-menunggu">Menunggu Pembayaran</span>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </main>

    </div>

</x-layout>