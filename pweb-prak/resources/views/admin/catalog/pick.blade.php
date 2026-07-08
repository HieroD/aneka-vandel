<x-admin-layout title="Edit Produk">

    <div class="flex items-center justify-center min-h-[70vh]">
        <div class="bg-white rounded-2xl border border-border shadow-xl w-full max-w-2xl p-7">

            <div class="flex items-start justify-between mb-1">
                <h1 class="text-lg font-bold text-text">Pilih Produk untuk Diedit</h1>
                <a href="{{ url()->previous(route('admin.orders')) }}" class="text-text-subtle hover:text-text -mt-1 -mr-1 p-1" aria-label="Tutup">
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </a>
            </div>
            <p class="text-[13px] text-text-subtle mb-5">Cari dan pilih vandel yang ingin diperbarui.</p>

            <form method="GET" action="{{ route('catalog.pick') }}" id="pickSearchForm" class="mb-6">
                <div class="relative">
                    <svg class="absolute left-3.5 top-1/2 -translate-y-1/2 w-4 h-4 text-text-subtle" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="11" cy="11" r="8" />
                        <line x1="21" y1="21" x2="16.65" y2="16.65" />
                    </svg>
                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Cari nama produk..."
                        data-search-debounce
                        data-form-id="pickSearchForm"
                        class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-border text-sm text-text placeholder:text-text-subtle bg-surface-2/60 focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/40 transition">
                </div>
            </form>

            @if ($products->isEmpty())
            <p class="text-center text-sm text-text-subtle py-10">
                @if(request('search'))
                Produk "{{ request('search') }}" tidak ditemukan.
                @else
                Belum ada produk. <a href="{{ route('catalog.create') }}" class="text-primary font-semibold">Tambah produk baru</a>.
                @endif
            </p>
            @else
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-3.5">
                @foreach ($products as $product)
                <a href="{{ route('catalog.edit', $product) }}" class="group text-left">
                    <div class="relative aspect-square rounded-xl overflow-hidden border border-border bg-surface-2">
                        <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                        <span class="absolute top-1.5 right-1.5 w-6 h-6 rounded-full bg-white/90 flex items-center justify-center shadow group-hover:bg-primary group-hover:text-white transition">
                            <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11 4H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2v-5M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z" />
                            </svg>
                        </span>
                    </div>
                    <p class="mt-1.5 text-[13px] font-semibold text-text leading-tight line-clamp-1 group-hover:text-primary transition">
                        {{ $product->name }}
                    </p>
                    <p class="text-[11px] text-text-subtle">{{ $product->category }}</p>
                </a>
                @endforeach
            </div>
            @endif

            <div class="mt-7 flex justify-center">
                <a href="{{ url()->previous(route('admin.orders')) }}" class="text-sm font-semibold text-text-muted hover:text-text">Batal</a>
            </div>

        </div>
    </div>

</x-admin-layout>