<x-admin-layout title="Statistik Penjualan">

    <h1 class="text-[22px] font-bold text-text mb-6">Statistik Penjualan</h1>

    {{-- FILTER BAR --}}
    <form method="GET" action="" id="filterForm">
        <div class="flex items-center gap-3 mb-7 flex-wrap">

            <div class="relative flex-1 min-w-[180px]">
                <svg class="absolute left-3 top-1/2 -translate-y-1/2 text-text-subtle w-[15px] h-[15px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="11" cy="11" r="8" />
                    <line x1="21" y1="21" x2="16.65" y2="16.65" />
                </svg>
                <input
                    type="text"
                    name="search"
                    id="searchInput"
                    value="{{ request('search') }}"
                    placeholder="Cari pesanan..."
                    data-search-debounce
                    data-form-id="filterForm"
                    class="w-full pl-9 pr-4 py-[9px] border border-border rounded-lg text-[13px] text-text-muted focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/40"
                />
            </div>

            <div class="flex items-center gap-1.5 px-4 py-[9px] border border-border rounded-lg bg-white text-[13px] text-text-muted cursor-pointer">
                <svg class="w-[14px] h-[14px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="3" y="4" width="18" height="18" rx="2" />
                    <line x1="16" y1="2" x2="16" y2="6" />
                    <line x1="8" y1="2" x2="8" y2="6" />
                    <line x1="3" y1="10" x2="21" y2="10" />
                </svg>
                Pilih Tanggal
                <svg class="w-[12px] h-[12px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <polyline points="6 9 12 15 18 9" />
                </svg>
            </div>

            <div class="w-56">
                <x-select
                    name="status"
                    placeholder="Status: Semua"
                    onchange="document.getElementById('filterForm').submit()"
                    :options="[
                        'selesai'  => 'Selesai',
                        'dikirim'  => 'Dikirim',
                        'dikemas'  => 'Dikemas',
                        'menunggu' => 'Menunggu Pembayaran',
                    ]"
                />
            </div>
        </div>
    </form>

    {{-- STATS --}}
    <div class="grid grid-cols-[1fr_220px] gap-6 mb-8 items-start">

        {{-- CHART --}}
        <div class="bg-white rounded-[14px] border border-border p-6">
            <div class="flex justify-between mb-5">
                <div>
                    <div class="text-[15px] font-bold text-text">Sales Trend</div>
                    <div class="text-[11px] text-text-subtle mt-0.5">Daily revenue performance</div>
                </div>
            </div>

            <div class="flex items-end gap-2.5 h-[140px] pb-6 relative">
                <div class="absolute bottom-6 left-0 right-0 h-px bg-border"></div>

                @php
                    $days = ['MONDAY','TUESDAY','WEDNESDAY','THURSDAY','FRIDAY','SATURDAY','SUNDAY'];
                    $maxSale = max($salesTrend) ?: 1;
                    $heights = collect($salesTrend)->map(fn ($v) => max(10, (int) ($v / $maxSale * 100)))->values();
                    $active = strtoupper(\Carbon\Carbon::now()->format('l'));
                @endphp

                @foreach($days as $i => $day)
                    <div class="flex flex-col items-center gap-1 flex-1">
                        <div
                            class="w-full rounded-t-md cursor-pointer hover:opacity-80 relative {{ $day === $active ? 'bg-primary' : 'bg-info-soft' }}"
                            style="height: {{ $heights[$i] }}px;"
                        >
                            <span class="absolute -top-4 left-1/2 -translate-x-1/2 text-[9px] text-text-subtle whitespace-nowrap">
                                Rp {{ number_format($salesTrend[$day] ?? 0, 0, ',', '.') }}
                            </span>
                        </div>
                        <span class="text-[10px] text-text-subtle uppercase font-medium">{{ $day }}</span>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- KPI --}}
        <div class="flex flex-col gap-3.5">

            <div class="bg-white rounded-[14px] border border-border p-4 flex items-center gap-3 relative">
                <div class="w-[42px] h-[42px] rounded-lg flex items-center justify-center bg-info-soft text-info">
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <line x1="12" y1="1" x2="12" y2="23"/>
                        <path d="M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6"/>
                    </svg>
                </div>
                <div>
                    <div class="text-[11px] font-semibold text-text-subtle uppercase">Total Sales</div>
                    <div class="text-[18px] font-extrabold text-text">Rp {{ number_format($totalSales ?? 428900, 0, ',', '.') }}</div>
                </div>
            </div>

            <div class="bg-white rounded-[14px] border border-border p-4 flex items-center gap-3 relative">
                <div class="w-[42px] h-[42px] rounded-lg flex items-center justify-center bg-success-soft text-success">
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/>
                        <line x1="3" y1="6" x2="21" y2="6"/>
                    </svg>
                </div>
                <div>
                    <div class="text-[11px] font-semibold text-text-subtle uppercase">Total Orders</div>
                    <div class="text-[18px] font-extrabold text-text">{{ $totalOrders ?? 67 }}</div>
                </div>
            </div>

            <div class="bg-white rounded-[14px] border border-border p-4 flex items-center gap-3 relative">
                <div class="w-[42px] h-[42px] rounded-lg flex items-center justify-center bg-primary-soft text-primary">
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M17 21v-2a4 4 0 00-4-4H5"/>
                        <circle cx="9" cy="7" r="4"/>
                    </svg>
                </div>
                <div>
                    <div class="text-[11px] font-semibold text-text-subtle uppercase">Total Customers</div>
                    <div class="text-[18px] font-extrabold text-text">{{ $totalCustomers ?? 44 }}</div>
                </div>
            </div>

        </div>
    </div>

    {{-- TABLE --}}
    <div class="text-base font-bold text-text mb-4">Penjualan Terkini</div>

    <div class="bg-white rounded-[14px] border border-border overflow-hidden">
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-surface-2 text-[12px] text-text-subtle uppercase">
                    <th class="px-4 py-3 text-left">Order ID</th>
                    <th class="px-4 py-3 text-left">Tanggal</th>
                    <th class="px-4 py-3 text-left">Produk</th>
                    <th class="px-4 py-3 text-left">Total Harga</th>
                    <th class="px-4 py-3 text-left">Status</th>
                    <th class="px-4 py-3 text-left">Customer</th>
                </tr>
            </thead>

            <tbody id="ordersTableBody">
                @forelse($recentOrders ?? [] as $order)
                    @php $status = strtolower($order->status); @endphp
                    @forelse($order->products as $product)
                        <tr class="border-b hover:bg-surface-2">
                            <td class="px-4 py-3 font-semibold text-info text-xs font-mono">{{ $order->id }}</td>
                            <td class="px-4 py-3 text-[13px]">{{ \Carbon\Carbon::parse($order->created_at)->format('d M Y') }}</td>
                            <td class="px-4 py-3 text-[13px]">{{ $product->name }}</td>
                            <td class="px-4 py-3 text-[13px]">Rp {{ number_format($product->pivot->total_price, 0, ',', '.') }}</td>
                            <td class="px-4 py-3">
                                @if(in_array($status, ['menunggu', 'dikemas', 'dikirim', 'selesai']))
                                    <x-badge :variant="$status">{{ $order->status }}</x-badge>
                                @else
                                    <x-badge>{{ $order->status }}</x-badge>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-xs text-text-subtle">{{ $order->user->name ?? $order->user_id }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-4 py-3 text-[13px] text-text-muted">Tidak ada produk</td>
                        </tr>
                    @endforelse
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-12 text-text-subtle text-[14px]">Belum ada penjualan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</x-admin-layout>
