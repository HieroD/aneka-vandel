<x-layout title="Catalog - Aneka Vandel">
    <!-- MAIN -->
    <main class="m-0 flex grow flex-col bg-white font-outfit text-text">
        <section style="background-image: url('{{ asset('assets/catalog-background.png') }}');"
         class="flex h-auto w-full grow flex-col items-center justify-center bg-cover px-[10%] py-12.5">

            <h2 class="mb-8 text-center text-4xl font-bold">Our Collection</h2>

            {{-- Category Filter Buttons --}}
            @php
                $currentCategory = request()->route('category') ?? 'all';
                $categories = [
                    'all'      => 'All',
                    'vandel'   => 'Vandel',
                    'prasasti' => 'Prasasti',
                    'kijangan' => 'Kijangan',
                ];
            @endphp

            <div class="mb-7.5 flex h-7 w-full items-center justify-around gap-2 md:w-1/2 lg:w-5/12">
                @foreach ($categories as $slug => $label)
                    <a href="{{ route('catalog.index', ['category' => $slug]) }}"
                       class="{{ $currentCategory === $slug ? 'bg-primary text-white' : 'bg-white hover:bg-primary' }} flex h-full w-1/5
                              cursor-pointer items-center justify-center rounded-full
                                  border border-primary text-center
                                  text-[14px] font-bold text-primary transition duration-200 hover:text-white">
                        {{ $label }}
                    </a>
                @endforeach
            </div>

            {{-- Search --}}
            <div class="mb-12.5 flex w-full flex-wrap items-center justify-between gap-4 text-base">
                <form action="{{ route('catalog.index', ['category' => $currentCategory]) }}" id="search-bar" method="GET">
                    <input type="text" name="search" id="search-text"
                           value="{{ request('search') }}"
                           placeholder="Search..."
                           class="h-8 w-auto rounded-md border border-primary px-2.5 text-base outline-none focus:ring-1 focus:ring-primary">
                </form>
                <span class="font-medium text-primary-hover">Menampilkan {{ count($products) }} Produk</span>
            </div>

            <div class="mb-10 flex w-full flex-wrap gap-5">
                @forelse ($products as $product)
                    <div onclick="openProductModal(
                            {{ $product->id }},
                            '{{ addslashes($product->name) }}',
                            '{{ $product->price }}',
                            '{{ addslashes($product->category ?? '') }}',
                            '{{ addslashes($product->description ?? '') }}',
                            '{{ $product->image_url }}'
                         )"
                         class="w-full cursor-pointer sm:w-[calc((100%-20px)/2)] lg:w-[calc((100%-60px)/4)]">
                        <x-product-card :product="$product" />
                    </div>
                @empty
                    <div class="w-full py-10 text-center">
                        <p class="text-text">Belum ada produk yang tersedia.</p>
                    </div>
                @endforelse
            </div>
        </section>

        {{-- MODAL POPUP --}}
        <div
            id="product-modal"
            class="fixed inset-0 z-50 hidden items-center justify-center bg-black/40 px-4 backdrop-blur-sm"
            onclick="closeProductModal(event)"
        >
            <div
                class="relative flex w-full max-w-3xl flex-col overflow-hidden rounded-2xl bg-white shadow-2xl md:flex-row"
                style="animation: modalIn 0.25s ease-out;"
                onclick="event.stopPropagation()"
            >
                {{-- Kolom Kiri: Gambar --}}
                <div class="relative flex min-h-64 items-center justify-center bg-surface-2 p-6 md:w-[45%]">
                    <span id="modal-category" class="absolute top-4 left-4 rounded-full bg-primary px-3 py-1 text-xs font-semibold text-white"></span>
                    <img id="modal-image" src="" alt="Foto Produk" class="h-60 w-full rounded-lg object-contain">
                </div>

                {{-- Kolom Kanan: Info --}}
                <div class="flex flex-col justify-between gap-4 p-7 md:w-[55%]">
                    {{-- Tombol tutup --}}
                    <button
                        onclick="closeProductModal()"
                        class="absolute top-4 right-4 flex h-8 w-8 cursor-pointer items-center justify-center rounded-full bg-surface-2 text-xl leading-none text-text-subtle transition hover:bg-border hover:text-text"
                    >&times;</button>

                    <div>
                        <h2 id="modal-name" class="mb-1 pr-8 font-outfit text-2xl font-bold text-text"></h2>
                        <p id="modal-price" class="mb-4 font-outfit text-xl font-semibold text-primary"></p>
                        <hr class="mb-4 border-border">
                        <p class="mb-1 text-xs font-semibold tracking-widest text-text-subtle uppercase">Deskripsi</p>
                        <p id="modal-description" class="font-outfit text-sm leading-relaxed text-text-muted"></p>
                    </div>

                    {{-- Tombol Aksi --}}
                    <div class="mt-2 flex flex-col gap-3 sm:flex-row">
                        <a id="modal-wa-btn" href="#" target="_blank"
                            class="flex w-full items-center justify-center gap-2 rounded-full bg-primary py-3 text-sm font-semibold text-white transition-colors hover:bg-primary-hover">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20.52 3.48A11.94 11.94 0 0 0 12 0C5.37 0 0 5.37 0 12c0 2.11.55 4.16 1.6 5.97L0 24l6.22-1.57A11.94 11.94 0 0 0 12 24c6.63 0 12-5.37 12-12 0-3.2-1.25-6.22-3.48-8.52zM12 22a9.94 9.94 0 0 1-5.06-1.38l-.36-.21-3.69.93.99-3.59-.23-.37A9.94 9.94 0 0 1 2 12C2 6.48 6.48 2 12 2s10 4.48 10 10-4.48 10-10 10zm5.44-7.4c-.3-.15-1.76-.87-2.03-.97-.27-.1-.47-.15-.67.15s-.77.97-.94 1.17c-.17.2-.35.22-.65.07a8.16 8.16 0 0 1-2.4-1.48 9.04 9.04 0 0 1-1.66-2.07c-.17-.3-.02-.46.13-.6.13-.13.3-.35.45-.52.15-.17.2-.3.3-.5.1-.2.05-.37-.02-.52-.07-.15-.67-1.6-.91-2.2-.24-.57-.48-.5-.67-.5h-.57c-.2 0-.52.07-.79.37s-1.04 1.02-1.04 2.48 1.07 2.88 1.22 3.08c.15.2 2.1 3.2 5.08 4.49.71.31 1.27.5 1.7.63.72.23 1.37.2 1.88.12.57-.09 1.76-.72 2.01-1.41.25-.69.25-1.28.17-1.41-.07-.13-.27-.2-.57-.35z"/>
                            </svg>
                            Pesan via WhatsApp
                        </a>
                        <button id="modal-cart-btn"
                            class="flex w-full cursor-pointer items-center justify-center gap-2 rounded-full bg-primary py-3 text-sm font-semibold text-white transition-colors hover:bg-primary-hover">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-1.4 7h12.8M7 13H5.4M10 21a1 1 0 1 0 2 0 1 1 0 0 0-2 0zm8 0a1 1 0 1 0 2 0 1 1 0 0 0-2 0z"/>
                            </svg>
                            Beli Sekarang
                        </button>
                    </div>

                    <div class="flex items-center gap-2 text-xs text-text-subtle">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M1.5 8.25h13.5m0 0V6a1.5 1.5 0 0 1 1.5-1.5h3a3 3 0 0 1 3 3v9a1.5 1.5 0 0 1-1.5 1.5H18m-3 0H6m12 0a1.5 1.5 0 1 0 3 0 1.5 1.5 0 0 0-3 0zM6 18a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0z"/>
                        </svg>
                        Pengiriman Seluruh Indonesia
                    </div>
                </div>
            </div>
        </div>
        {{-- END MODAL --}}

    </main>

    {{-- SCRIPT --}}
    @push('scripts')
    <script>
        let _currentProduct = {};

        function openProductModal(id, name, price, category, description, image) {
            _currentProduct = { id, name, price, image };

            document.getElementById('modal-name').textContent        = name;
            document.getElementById('modal-category').textContent    = category;
            document.getElementById('modal-description').textContent = description;
            document.getElementById('modal-price').textContent       = 'Rp ' + Number(price).toLocaleString('id-ID');
            document.getElementById('modal-image').src               = image;
            document.getElementById('modal-image').alt               = name;

            const waNumber = '{{ $waNumber }}';
            const waText   = encodeURIComponent(`Halo, saya ingin memesan: ${name} (Rp ${Number(price).toLocaleString('id-ID')})`);
            document.getElementById('modal-wa-btn').href = `https://wa.me/${waNumber}?text=${waText}`;

            // Reset tombol beli
            const btn = document.getElementById('modal-cart-btn');
            btn.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-1.4 7h12.8M7 13H5.4M10 21a1 1 0 1 0 2 0 1 1 0 0 0-2 0zm8 0a1 1 0 1 0 2 0 1 1 0 0 0-2 0z"/></svg> Beli Sekarang`;
            btn.disabled = false;
            btn.classList.remove('bg-success', 'hover:bg-success-hover');
            btn.classList.add('bg-primary', 'hover:bg-primary-hover');

            const modal = document.getElementById('product-modal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.classList.add('overflow-hidden');
        }

        document.getElementById('modal-cart-btn').addEventListener('click', function () {
            if (!_currentProduct.id) return;
            let checkoutUrl = "{{ route('user.order.create', ':id') }}";
            window.location.href = checkoutUrl.replace(':id', _currentProduct.id);
        });

        function closeProductModal(event) {
            if (event && event.target !== document.getElementById('product-modal')) return;
            const modal = document.getElementById('product-modal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.classList.remove('overflow-hidden');
        }

        document.addEventListener('keydown', e => {
            if (e.key === 'Escape') {
                const modal = document.getElementById('product-modal');
                modal.classList.add('hidden');
                modal.classList.remove('flex');
                document.body.classList.remove('overflow-hidden');
            }
        });
    </script>

    <style>
        @keyframes modalIn {
            from { opacity: 0; transform: scale(0.95) translateY(10px); }
            to   { opacity: 1; transform: scale(1)    translateY(0); }
        }
    </style>
    @endpush

</x-layout>
