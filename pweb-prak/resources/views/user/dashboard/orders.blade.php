<x-layout title="Selesaikan Pesanan - Aneka Vandel">

    <style>
        .shipping-option {
            border: 1.5px solid #e5e7eb;
            border-radius: 0.75rem;
            padding: 1rem 1.25rem;
            cursor: pointer;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .shipping-option:hover {
            border-color: #16a34a;
            background-color: #f0fdf4;
        }
        .shipping-option.selected {
            border-color: #16a34a;
            background-color: #f0fdf4;
        }
        .shipping-option input[type="radio"] {
            accent-color: #16a34a;
            width: 1.1rem;
            height: 1.1rem;
        }
        .qty-btn {
            width: 1.75rem;
            height: 1.75rem;
            border: 1.5px solid #d1d5db;
            border-radius: 0.375rem;
            background: white;
            font-size: 1rem;
            color: #374151;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.15s;
        }
        .qty-btn:hover {
            border-color: #1e3a5f;
            color: #1e3a5f;
        }
        input[type="text"],
        input[type="tel"],
        textarea {
            border: 1.5px solid #d1d5db;
            border-radius: 0.5rem;
            padding: 0.625rem 0.875rem;
            font-size: 0.875rem;
            color: #374151;
            width: 100%;
            background: white;
            transition: border-color 0.2s, box-shadow 0.2s;
            outline: none;
        }
        input[type="text"]:focus,
        input[type="tel"]:focus,
        textarea:focus {
            border-color: #1e3a5f;
            box-shadow: 0 0 0 3px rgba(30, 58, 95, 0.08);
        }
        textarea {
            resize: none;
            height: 5.5rem;
        }
        .section-card {
            background: white;
            border-radius: 1rem;
            box-shadow: 0 1px 4px rgba(0,0,0,0.07);
            padding: 1.75rem;
        }
        .section-icon {
            width: 2.25rem;
            height: 2.25rem;
            border-radius: 0.5rem;
            background: #e6f4ef;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .badge-selesai   { background:#dcfce7; color:#15803d; }
        .badge-dikirim   { background:#dbeafe; color:#1d4ed8; }
        .badge-dikemas   { background:#fef9c3; color:#a16207; }
        .badge-menunggu  { background:#fee2e2; color:#b91c1c; }
        .order-badge {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 600;
        }
    </style>

    {{-- TOP NAV --}}
    <div class="max-w-7xl mx-auto w-full px-6 pt-6 pb-2 flex items-center justify-between">
        <span class="text-xl font-bold text-[#1e3a5f]">Aneka Vandel</span>
        <a href="{{ route('catalog') }}"
           class="flex items-center gap-1.5 text-sm text-gray-500 hover:text-[#1e3a5f] transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            Kembali ke Katalog
        </a>
    </div>

    {{-- MAIN CONTENT --}}
    <div class="max-w-7xl mx-auto w-full px-6 py-8">

        <h1 class="text-2xl font-bold text-gray-800 mb-8">Selesaikan Pesanan Anda</h1>

        <div class="flex gap-6 items-start">

            {{-- LEFT COLUMN --}}
            <div class="flex-1 flex flex-col gap-5">

                {{-- Detail Pengiriman --}}
                <div class="section-card">
                    <div class="flex items-center gap-3 mb-5">
                        <div class="section-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-[#16a34a]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 17a2 2 0 11-4 0 2 2 0 014 0zm10 0a2 2 0 11-4 0 2 2 0 014 0M1 3h1l1.5 9h11l1.5-9H5"/>
                            </svg>
                        </div>
                        <h2 class="text-base font-semibold text-[#1e3a5f]">Detail Pengiriman</h2>
                    </div>

                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-sm text-gray-600 mb-1.5">Nama Lengkap</label>
                            <input type="text" name="nama" placeholder="Contoh: Budi Santoso"
                                   value="{{ old('nama') }}">
                        </div>
                        <div>
                            <label class="block text-sm text-gray-600 mb-1.5">Nomor WhatsApp</label>
                            <input type="tel" name="whatsapp" placeholder="0812xxxxxxxx"
                                   value="{{ old('whatsapp') }}">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm text-gray-600 mb-1.5">Alamat Lengkap</label>
                        <textarea name="alamat"
                                  placeholder="Nama Jalan, Nomor Rumah, Kelurahan, Kecamatan, Kota, Kode Pos">{{ old('alamat') }}</textarea>
                    </div>
                </div>

                {{-- Metode Pengiriman --}}
                <div class="section-card">
                    <div class="flex items-center gap-3 mb-5">
                        <div class="section-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-[#16a34a]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                            </svg>
                        </div>
                        <h2 class="text-base font-semibold text-[#1e3a5f]">Metode Pengiriman</h2>
                    </div>

                    <div class="flex flex-col gap-3">

                        {{-- JNE --}}
                        <label class="shipping-option selected" id="option-jne">
                            <div class="flex items-center gap-3">
                                <input type="radio" name="pengiriman" value="jne" checked
                                       onchange="selectShipping(this)">
                                <div>
                                    <p class="font-semibold text-gray-800 text-sm">JNE</p>
                                    <p class="text-xs text-gray-500">Reguler (2–3 Hari)</p>
                                </div>
                            </div>
                            <span class="font-semibold text-[#16a34a] text-sm">Rp 25.000</span>
                        </label>

                        {{-- J&T --}}
                        <label class="shipping-option" id="option-jt">
                            <div class="flex items-center gap-3">
                                <input type="radio" name="pengiriman" value="jt"
                                       onchange="selectShipping(this)">
                                <div>
                                    <p class="font-semibold text-gray-800 text-sm">J&T</p>
                                    <p class="text-xs text-gray-500">Ekspres (1–2 Hari)</p>
                                </div>
                            </div>
                            <span class="font-semibold text-gray-700 text-sm">Rp 30.000</span>
                        </label>

                        {{-- Cargo --}}
                        <label class="shipping-option" id="option-cargo">
                            <div class="flex items-center gap-3">
                                <input type="radio" name="pengiriman" value="cargo"
                                       onchange="selectShipping(this)">
                                <div>
                                    <p class="font-semibold text-gray-800 text-sm">Cargo</p>
                                    <p class="text-xs text-gray-500">Layanan Berat (5+ Hari)</p>
                                </div>
                            </div>
                            <span class="font-semibold text-gray-700 text-sm">Rp 15.000/kg</span>
                        </label>

                    </div>
                </div>

            </div>{{-- /LEFT COLUMN --}}

            {{-- RIGHT COLUMN: Ringkasan Pesanan --}}
            <div class="w-80 flex-shrink-0">
                <div class="rounded-2xl overflow-hidden shadow-sm">

                    {{-- Header --}}
                    <div class="bg-[#1e3a5f] px-6 py-4">
                        <h2 class="text-base font-bold text-white">Ringkasan Pesanan</h2>
                    </div>

                    {{-- Body --}}
                    <div class="bg-white px-6 py-5 flex flex-col gap-4">

                        {{-- Product item --}}
                        @if(isset($cartItem))
                        <div class="flex items-center gap-3">
                            {{-- Product thumbnail --}}
                            <div class="w-12 h-12 rounded-lg bg-gray-100 flex items-center justify-center flex-shrink-0 overflow-hidden">
                                @if($cartItem->product->image)
                                    <img src="{{ asset('storage/' . $cartItem->product->image) }}"
                                         alt="{{ $cartItem->product->name }}"
                                         class="w-full h-full object-cover">
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                @endif
                            </div>

                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-semibold text-gray-800 truncate">{{ $cartItem->product->name }}</p>

                                {{-- Qty control --}}
                                <div class="flex items-center gap-2 mt-1.5">
                                    <button type="button" class="qty-btn" onclick="changeQty(-1)">−</button>
                                    <span class="text-sm font-medium text-gray-700 w-5 text-center" id="qty-display">{{ $cartItem->quantity }}</span>
                                    <button type="button" class="qty-btn" onclick="changeQty(1)">+</button>
                                </div>
                            </div>

                            <span class="text-sm font-semibold text-[#1e3a5f]" id="item-price">
                                Rp {{ number_format($cartItem->product->price * $cartItem->quantity, 0, ',', '.') }}
                            </span>
                        </div>
                        @else
                        {{-- Placeholder / dev state --}}
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 rounded-lg bg-gray-100 flex items-center justify-center flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-semibold text-gray-800">[Nama Produk]</p>
                                <div class="flex items-center gap-2 mt-1.5">
                                    <button type="button" class="qty-btn" onclick="changeQty(-1)">−</button>
                                    <span class="text-sm font-medium text-gray-700 w-5 text-center" id="qty-display">1</span>
                                    <button type="button" class="qty-btn" onclick="changeQty(1)">+</button>
                                </div>
                            </div>
                            <span class="text-sm font-semibold text-[#1e3a5f]" id="item-price">Rp 250.000</span>
                        </div>
                        @endif

                        <hr class="border-gray-100">

                        {{-- Price breakdown --}}
                        <div class="flex flex-col gap-2 text-sm text-gray-600">
                            <div class="flex justify-between">
                                <span>Subtotal</span>
                                <span id="subtotal-display">Rp {{ number_format($cartItem->product->price ?? 250000, 0, ',', '.') }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Biaya Pengiriman (JNE)</span>
                                <span id="shipping-display">Rp 25.000</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Diskon</span>
                                <span class="font-semibold text-[#16a34a]">Rp 0</span>
                            </div>
                        </div>

                        <hr class="border-gray-100">

                        {{-- Total --}}
                        <div class="flex justify-between items-center">
                            <span class="font-bold text-gray-800 text-sm">Total Pembayaran</span>
                            <span class="font-bold text-[#1e3a5f] text-base" id="total-display">Rp 275.000</span>
                        </div>

                        {{-- CTA --}}
                        <button type="button"
                                onclick="submitOrder()"
                                class="w-full bg-[#1e3a5f] hover:bg-[#16305a] text-white font-semibold text-sm
                                       py-3 rounded-xl transition active:scale-[0.98]">
                            Buat Pesanan
                        </button>

                        {{-- Trust badge --}}
                        <p class="text-center text-xs text-gray-400 flex items-center justify-center gap-1.5">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                            </svg>
                            Transaksi aman &amp; terpercaya via WhatsApp Admin
                        </p>

                    </div>
                </div>
            </div>{{-- /RIGHT COLUMN --}}

        </div>
    </div>

    <script>
        // ----- Qty control -----
        const BASE_PRICE = {{ $cartItem->product->price ?? 250000 }};
        let qty = {{ $cartItem->quantity ?? 1 }};

        function fmt(n) {
            return 'Rp ' + n.toLocaleString('id-ID');
        }

        function changeQty(delta) {
            qty = Math.max(1, qty + delta);
            document.getElementById('qty-display').textContent = qty;
            document.getElementById('item-price').textContent = fmt(BASE_PRICE * qty);
            document.getElementById('subtotal-display').textContent = fmt(BASE_PRICE * qty);
            updateTotal();
        }

        // ----- Shipping selection -----
        const shippingCosts = { jne: 25000, jt: 30000, cargo: 0 };
        let selectedShipping = 25000;

        function selectShipping(radio) {
            // Reset all labels
            document.querySelectorAll('.shipping-option').forEach(el => el.classList.remove('selected'));
            // Mark selected
            radio.closest('.shipping-option').classList.add('selected');
            selectedShipping = shippingCosts[radio.value] ?? 0;
            const label = radio.value.toUpperCase();
            document.getElementById('shipping-display').textContent =
                radio.value === 'cargo' ? 'Rp 15.000/kg' : fmt(selectedShipping);
            updateTotal();
        }

        function updateTotal() {
            const subtotal = BASE_PRICE * qty;
            const total = subtotal + (selectedShipping);
            document.getElementById('total-display').textContent = fmt(total);
        }

        // ----- Submit -----
        function submitOrder() {
            const nama     = document.querySelector('input[name="nama"]').value.trim();
            const whatsapp = document.querySelector('input[name="whatsapp"]').value.trim();
            const alamat   = document.querySelector('textarea[name="alamat"]').value.trim();
            const metode   = document.querySelector('input[name="pengiriman"]:checked')?.value;

            if (!nama || !whatsapp || !alamat) {
                alert('Mohon lengkapi semua field pengiriman.');
                return;
            }

            // Submit via form POST to Laravel route
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = '{{ route("order.store") }}';

            const fields = {
                _token:    '{{ csrf_token() }}',
                nama,
                whatsapp,
                alamat,
                pengiriman: metode,
                quantity:   qty,
            };

            for (const [key, val] of Object.entries(fields)) {
                const input = document.createElement('input');
                input.type  = 'hidden';
                input.name  = key;
                input.value = val;
                form.appendChild(input);
            }

            document.body.appendChild(form);
            form.submit();
        }
    </script>

</x-layout>