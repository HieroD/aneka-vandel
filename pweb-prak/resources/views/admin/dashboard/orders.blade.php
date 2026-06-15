<x-admin-layout title="Kelola Pesanan">

    <h1 class="text-[22px] font-bold text-text mb-6">Kelola Pesanan</h1>

    {{-- TODO: backend — filter form action + route is not yet wired --}}
    <form method="GET" action="" id="filterForm">
        <div class="flex gap-3 items-center mb-5 flex-wrap">

            <input
                type="text"
                name="search"
                placeholder="Cari pesanan..."
                value="{{ request('search') }}"
                data-search-debounce
                data-form-id="filterForm"
                class="flex-1 min-w-[200px] px-3.5 py-[9px] border border-border rounded-lg text-[13px] text-text-muted placeholder:text-text-subtle focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/40"
            />

            <div class="flex items-center gap-2 px-3.5 py-[9px] border border-border rounded-lg bg-white text-[13px] text-text-muted cursor-pointer">
                <svg class="w-[15px] h-[15px] text-text-subtle" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="3" y="4" width="18" height="18" rx="2" />
                    <line x1="16" y1="2" x2="16" y2="6" />
                    <line x1="8" y1="2" x2="8" y2="6" />
                    <line x1="3" y1="10" x2="21" y2="10" />
                </svg>
                <select
                    name="tanggal"
                    onchange="document.getElementById('filterForm').submit()"
                    class="bg-transparent outline-none text-[13px] cursor-pointer"
                >
                    <option value="">Pilih Tanggal</option>
                </select>
            </div>

            <div class="w-56">
                <x-select
                    name="status"
                    placeholder="Status: Semua"
                    :options="[
                        'menunggu' => 'Menunggu Pembayaran',
                        'dikemas'  => 'Dikemas',
                        'dikirim'  => 'Dikirim',
                        'selesai'  => 'Selesai',
                    ]"
                />
            </div>

        </div>
    </form>

    <div class="bg-white rounded-xl border border-border overflow-hidden">
        <table class="w-full border-collapse">

            <thead class="bg-surface-2">
                <tr>
                    <th class="px-4 py-3 text-left text-[12px] font-bold text-text-subtle uppercase">Order ID</th>
                    <th class="px-4 py-3 text-left text-[12px] font-bold text-text-subtle uppercase">Tanggal</th>
                    <th class="px-4 py-3 text-left text-[12px] font-bold text-text-subtle uppercase">Produk</th>
                    <th class="px-4 py-3 text-left text-[12px] font-bold text-text-subtle uppercase">Total Harga</th>
                    <th class="px-4 py-3 text-left text-[12px] font-bold text-text-subtle uppercase">Status Pesanan</th>
                    <th class="px-4 py-3 text-left text-[12px] font-bold text-text-subtle uppercase">ID Pelanggan</th>
                </tr>
            </thead>

            <tbody>
                @forelse($pesanans ?? [] as $pesanan)
                    @php $status = strtolower($pesanan->status); @endphp
                    <tr class="border-b border-border hover:bg-surface-2">
                        <td class="px-4 py-3 text-[13px] font-bold text-text">
                            {{ $pesanan->order_id }}
                        </td>

                        <td class="px-4 py-3 text-[13px] text-text-muted">
                            {{ \Carbon\Carbon::parse($pesanan->created_at)->translatedFormat('d M Y') }}
                        </td>

                        <td class="px-4 py-3 text-[13px] text-text-muted">
                            {{ $pesanan->produk_nama }} - {{ $pesanan->qty }} Pcs
                        </td>

                        <td class="px-4 py-3 text-[13px] text-text-muted">
                            Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}
                        </td>

                        <td class="px-4 py-3">
                            <div class="relative inline-block">

                                <button
                                    type="button"
                                    data-status-toggle="statusDd-{{ $pesanan->id }}"
                                    class="inline-flex items-center gap-1.5"
                                >
                                    <x-badge :variant="$status">{{ ucfirst($pesanan->status) }}</x-badge>
                                    <svg class="w-[10px] h-[10px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                                        <polyline points="6,9 12,15 18,9" />
                                    </svg>
                                </button>

                                <div
                                    id="statusDd-{{ $pesanan->id }}"
                                    class="hidden absolute left-0 top-[calc(100%+4px)] bg-white rounded-lg border border-border shadow-lg z-50 min-w-[160px]"
                                >
                                    @foreach(['dikirim' => 'Dikirim', 'selesai' => 'Selesai', 'dikemas' => 'Dikemas', 'menunggu' => 'Menunggu Pembayaran'] as $val => $label)
                                        <div
                                            data-status-update="{{ $val }}"
                                            data-order-id="{{ $pesanan->id }}"
                                            class="flex items-center gap-2 px-3.5 py-2 cursor-pointer hover:bg-surface-2"
                                        >
                                            <x-badge :variant="$val">{{ $label }}</x-badge>
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                        </td>

                        <td class="px-4 py-3 text-[13px] text-text-muted">
                            {{ $pesanan->user_id ?? 'U' . str_pad($pesanan->user_id, 4, '0', STR_PAD_LEFT) }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-12 text-text-subtle text-[14px]">
                            Belum ada pesanan.
                        </td>
                    </tr>
                @endforelse
            </tbody>

        </table>
    </div>

    {{-- Hidden form used by data-status-update (action is set dynamically in admin-layout script) --}}
    <form method="POST" id="statusForm" action="" class="hidden">
        @csrf
        @method('PATCH')
        <input type="hidden" name="status" id="statusInput" />
    </form>

</x-admin-layout>
