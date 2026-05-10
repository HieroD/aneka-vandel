<x-layout title="Catalog - Aneka Vandel">
    <!-- MAIN -->
    <main class="font-outfit text-gray-800 m-0 bg-white flex flex-col grow">
        <section style="background-image: url('{{ asset('assets/catalog-background.png') }}');"
         class="px-[10%] py-12.5 bg-cover h-auto w-full flex flex-col items-center justify-center grow">
            
            <h2 class="text-4xl text-center mb-8 font-bold">Our Collection</h2>
            
             {{-- Pagination --}}
            <div class="w-full md:w-1/2 lg:w-5/12 h-7 mb-7.5 flex items-center justify-around gap-2">
                <button class="text-[14px] cursor-pointer text-primary font-bold border border-primary rounded-full bg-white w-1/5 h-full transition duration-200 hover:text-white hover:bg-primary">All</button>
                <button class="text-[14px] cursor-pointer text-primary font-bold border border-primary rounded-full bg-white w-1/5 h-full transition duration-200 hover:text-white hover:bg-primary">Vandel</button>
                <button class="text-[14px] cursor-pointer text-primary font-bold border border-primary rounded-full bg-white w-1/5 h-full transition duration-200 hover:text-white hover:bg-primary">Prasasti</button>
                <button class="text-[14px] cursor-pointer text-primary font-bold border border-primary rounded-full bg-white w-1/5 h-full transition duration-200 hover:text-white hover:bg-primary">Kijangan</button>
            </div>

            {{-- Search --}}
            <div class="mb-12.5 w-full flex flex-wrap gap-4 items-center justify-between text-base">
                <form action="" id="search-bar" method="GET">
                    <input type="text" name="search-text" id="search-text" placeholder="Search..." 
                        class="px-2.5 h-8 w-auto text-base rounded-md border border-primary outline-none focus:ring-1 focus:ring-primary">
                </form>
                <span class="text-primary-hover font-medium">Menampilkan {{ count($products) }} Produk</span>
            </div>
            
            <div class="w-full flex flex-wrap gap-5 mb-10">
                @forelse ($products as $product)
                    {{-- Tambah onclick pada wrapper card &pop up --}}
                    <div onclick="openProductModal({{ $product->id }}, '{{ addslashes($product->name) }}', '{{ $product->price }}', '{{ addslashes($product->category ?? '') }}', '{{ addslashes($product->description ?? '') }}', '{{ $product->image ? asset('storage/' . $product->image) : asset('assets/placeholder.png') }}')" class="cursor-pointer">
                        <x-product-card :product="$product" />
                    </div>
                @empty
                    <div class="w-full text-center py-10">
                        <p class="text-gray-500 text-lg">Belum ada produk yang tersedia.</p>
                    </div>
                @endforelse
                
                {{-- Placeholder --}}
                {{-- <!-- Card 1 -->
                <div class="p-5 rounded-xl bg-white flex flex-col items-center shadow-lg transition duration-100 hover:-translate-y-1.5 hover:shadow-2xl hover:cursor-pointer w-[calc((100%-60px)/4)]">
                    <img src="{{ asset('assets/vandel-produk.png') }}" alt="vandel" class="h-64 w-full object-cover rounded-md mb-4">
                    <h3 class="mb-0 text-lg text-gray-800 font-semibold">Vandel</h3>
                    <p class="mb-0 w-full h-24 text-gray-500 text-sm text-left">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Beatae qui velit veritatis quae ipsa incidunt veniam delectus mollitia</p>
                    <p class="m-0 mr-auto text-gray-800 text-lg font-medium">Rp. 20.000 / Pcs</p>
                    <button class="mt-5 h-10 w-full text-lg rounded-lg cursor-pointer text-white font-normal bg-primary transition-colors hover:bg-primary-hover">Pesan Sekarang</button>
                </div>

                <!-- Card 2 -->
                <div class="p-5 rounded-xl bg-white flex flex-col items-center shadow-lg transition duration-100 hover:-translate-y-1.5 hover:shadow-2xl hover:cursor-pointer w-[calc((100%-60px)/4)]">
                    <img src="{{ asset('assets/kijangan-produk.png') }}" alt="kijangan" class="h-64 w-full object-cover rounded-md mb-4">
                    <h3 class="mb-0 text-lg text-gray-800 font-semibold">Kijangan</h3>
                    <p class="mb-0 w-full h-24 text-gray-500 text-sm text-left">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, voluptas. Enim, labore rerum. </p>
                    <p class="m-0 mr-auto text-gray-800 text-lg font-medium">Rp. 150.000 / Pcs</p>
                    <button class="mt-5 h-10 w-full text-lg rounded-lg cursor-pointer text-white font-normal bg-primary transition-colors hover:bg-primary-hover">Pesan Sekarang</button>
                </div>

                <!-- Card 3 -->
                <div class="p-5 rounded-xl bg-white flex flex-col items-center shadow-lg transition duration-100 hover:-translate-y-1.5 hover:shadow-2xl hover:cursor-pointer w-[calc((100%-60px)/4)]">
                    <img src="{{ asset('assets/batu-produk.png') }}" alt="batu" class="h-64 w-full object-cover rounded-md mb-4">
                    <h3 class="mb-0 text-lg text-gray-800 font-semibold">Balok</h3>
                    <p class="mb-0 w-full h-24 text-gray-500 text-sm text-left">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus molestias </p>
                    <p class="m-0 mr-auto text-gray-800 text-lg font-medium">Rp. 15.000 / Pcs</p>
                    <button class="mt-5 h-10 w-full text-lg rounded-lg cursor-pointer text-white font-normal bg-primary transition-colors hover:bg-primary-hover">Pesan Sekarang</button>
                </div>

                <!-- Card 4 -->
                <div class="p-5 rounded-xl bg-white flex flex-col items-center shadow-lg transition duration-100 hover:-translate-y-1.5 hover:shadow-2xl hover:cursor-pointer w-[calc((100%-60px)/4)]">
                    <img src="{{ asset('assets/kijangan-produk.png') }}" alt="kijangan" class="h-64 w-full object-cover rounded-md mb-4">
                    <h3 class="mb-0 text-lg text-gray-800 font-semibold">Kijangan</h3>
                    <p class="mb-0 w-full h-24 text-gray-500 text-sm text-left">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, voluptas. Enim</p>
                    <p class="m-0 mr-auto text-gray-800 text-lg font-medium">Rp. 150.000 / Pcs</p>
                    <button class="mt-5 h-10 w-full text-lg rounded-lg cursor-pointer text-white font-normal bg-primary transition-colors hover:bg-primary-hover">Pesan Sekarang</button>
                </div>

                <!-- Card 5 -->
                <div class="p-5 rounded-xl bg-white flex flex-col items-center shadow-lg transition duration-100 hover:-translate-y-1.5 hover:shadow-2xl hover:cursor-pointer w-[calc((100%-60px)/4)]">
                    <img src="{{ asset('assets/vandel-produk.png') }}" alt="vandel" class="h-64 w-full object-cover rounded-md mb-4">
                    <h3 class="mb-0 text-lg text-gray-800 font-semibold">Vandel</h3>
                    <p class="mb-0 w-full h-24 text-gray-500 text-sm text-left">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Beatae qui velit veritatis quae ipsa incidunt veniam delectus mollitia</p>
                    <p class="m-0 mr-auto text-gray-800 text-lg font-medium">Rp. 20.000 / Pcs</p>
                    <button class="mt-5 h-10 w-full text-lg rounded-lg cursor-pointer text-white font-normal bg-primary transition-colors hover:bg-primary-hover">Pesan Sekarang</button>
                </div> --}}
            </div>
        </section>

        {{-- ===================== MODAL POPUP --}}
        <div
            id="product-modal"
            class="fixed inset-0 z-50 hidden items-center justify-center bg-black/40 backdrop-blur-sm px-4"
            onclick="closeProductModal(event)"
        >
            <div
                class="relative bg-white rounded-2xl shadow-2xl w-full max-w-3xl flex flex-col md:flex-row overflow-hidden"
                style="animation: modalIn 0.25s ease-out;"
                onclick="event.stopPropagation()"
            >
                {{-- Kolom Kiri: Gambar --}}
                <div class="relative md:w-[45%] bg-gray-50 flex items-center justify-center p-6 min-h-64">
                    <span id="modal-category" class="absolute top-4 left-4 bg-primary text-white text-xs font-semibold px-3 py-1 rounded-full"></span>
                    <img id="modal-image" src="" alt="Foto Produk" class="w-full h-60 object-contain rounded-lg">
                </div>

                {{-- Kolom Kanan: Info --}}
                <div class="md:w-[55%] flex flex-col justify-between p-7 gap-4">
                    {{-- Tombol tutup --}}
                    <button
                        onclick="closeProductModal()"
                        class="absolute top-4 right-4 w-8 h-8 flex items-center justify-center rounded-full bg-gray-100 hover:bg-gray-200 transition text-gray-500 hover:text-gray-800 text-xl leading-none cursor-pointer"
                    >&times;</button>

                    <div>
                        <h2 id="modal-name" class="font-outfit text-2xl font-bold text-gray-800 mb-1 pr-8"></h2>
                        <p id="modal-price" class="font-outfit text-xl font-semibold text-primary mb-4"></p>
                        <hr class="border-gray-200 mb-4">
                        <p class="text-xs uppercase tracking-widest text-gray-400 font-semibold mb-1">Deskripsi</p>
                        <p id="modal-description" class="font-outfit text-gray-600 text-sm leading-relaxed"></p>
                    </div>

                    {{-- Tombol Aksi --}}
                    <div class="flex flex-col sm:flex-row gap-3 mt-2">
                        <a id="modal-wa-btn" href="#" target="_blank"
                            class="flex items-center justify-center gap-2 w-full py-3 rounded-full bg-primary hover:bg-primary-hover text-white font-semibold text-sm transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20.52 3.48A11.94 11.94 0 0 0 12 0C5.37 0 0 5.37 0 12c0 2.11.55 4.16 1.6 5.97L0 24l6.22-1.57A11.94 11.94 0 0 0 12 24c6.63 0 12-5.37 12-12 0-3.2-1.25-6.22-3.48-8.52zM12 22a9.94 9.94 0 0 1-5.06-1.38l-.36-.21-3.69.93.99-3.59-.23-.37A9.94 9.94 0 0 1 2 12C2 6.48 6.48 2 12 2s10 4.48 10 10-4.48 10-10 10zm5.44-7.4c-.3-.15-1.76-.87-2.03-.97-.27-.1-.47-.15-.67.15s-.77.97-.94 1.17c-.17.2-.35.22-.65.07a8.16 8.16 0 0 1-2.4-1.48 9.04 9.04 0 0 1-1.66-2.07c-.17-.3-.02-.46.13-.6.13-.13.3-.35.45-.52.15-.17.2-.3.3-.5.1-.2.05-.37-.02-.52-.07-.15-.67-1.6-.91-2.2-.24-.57-.48-.5-.67-.5h-.57c-.2 0-.52.07-.79.37s-1.04 1.02-1.04 2.48 1.07 2.88 1.22 3.08c.15.2 2.1 3.2 5.08 4.49.71.31 1.27.5 1.7.63.72.23 1.37.2 1.88.12.57-.09 1.76-.72 2.01-1.41.25-.69.25-1.28.17-1.41-.07-.13-.27-.2-.57-.35z"/>
                            </svg>
                            Pesan via WhatsApp
                        </a>
                        <button id="modal-cart-btn"
                            class="flex items-center justify-center gap-2 w-full py-3 rounded-full bg-primary hover:bg-primary-hover text-white font-semibold text-sm transition-colors cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-1.4 7h12.8M7 13H5.4M10 21a1 1 0 1 0 2 0 1 1 0 0 0-2 0zm8 0a1 1 0 1 0 2 0 1 1 0 0 0-2 0z"/>
                            </svg>
                            Masukkan ke Keranjang
                        </button>
                    </div>

                    <div class="flex items-center gap-2 text-gray-400 text-xs">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
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
        // Simpan data produk yang sedang dibuka
        let _currentProduct = {};

        function openProductModal(id, name, price, category, description, image) {
            _currentProduct = { id, name, price, image };

            document.getElementById('modal-name').textContent        = name;
            document.getElementById('modal-category').textContent    = category;
            document.getElementById('modal-description').textContent = description;
            document.getElementById('modal-price').textContent       = 'Rp ' + Number(price).toLocaleString('id-ID');
            document.getElementById('modal-image').src               = image;
            document.getElementById('modal-image').alt               = name;

            const waNumber = '{{ config("app.wa_number", "6281234567890") }}';
            const waText   = encodeURIComponent(`Halo, saya ingin memesan: ${name} (Rp ${Number(price).toLocaleString('id-ID')})`);
            document.getElementById('modal-wa-btn').href = `https://wa.me/${waNumber}?text=${waText}`;

            // Reset tombol keranjang
            const btn = document.getElementById('modal-cart-btn');
            btn.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-1.4 7h12.8M7 13H5.4M10 21a1 1 0 1 0 2 0 1 1 0 0 0-2 0zm8 0a1 1 0 1 0 2 0 1 1 0 0 0-2 0z"/></svg> Masukkan ke Keranjang`;
            btn.className = btn.className.replace('bg-green-600', '').replace('hover:bg-green-700', '');

            const modal = document.getElementById('product-modal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.classList.add('overflow-hidden');
        }

        // Tambah ke keranjang (session) lalu redirect ke checkout
        document.getElementById('modal-cart-btn').addEventListener('click', function () {
            if (!_currentProduct.id) return;

            const btn = this;
            btn.textContent = 'Menambahkan...';
            btn.disabled = true;

            fetch('/cart/add', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                },
                body: JSON.stringify({
                    id:    _currentProduct.id,
                    name:  _currentProduct.name,
                    price: _currentProduct.price,
                    image: _currentProduct.image,
                    qty:   1
                })
            })
            .then(res => res.json())
            .then(() => {
                btn.textContent = '✓ Ditambahkan! Menuju checkout...';
                btn.classList.add('bg-green-600');
                setTimeout(() => {
                    window.location.href = '{{ route("checkout") }}';
                }, 800);
            })
            .catch(() => {
                btn.textContent = 'Gagal, coba lagi';
                btn.disabled = false;
            });
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
                document.getElementById('product-modal').classList.add('hidden');
                document.getElementById('product-modal').classList.remove('flex');
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