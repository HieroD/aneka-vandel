<x-layout title="Selesaikan Pesanan - Aneka Vandel">

    {{-- TOP NAV --}}
    <div class="max-w-7xl mx-auto w-full px-6 pt-6 pb-2 flex items-center justify-between">
        <span class="text-xl font-bold text-primary font-sans">Aneka Vandel</span>
        <a href="{{ route('catalog.index') }}"
           class="flex items-center gap-1.5 text-sm text-text-muted hover:text-primary transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            Kembali ke Katalog
        </a>
    </div>

    {{-- MAIN --}}
    <div class="max-w-7xl mx-auto w-full px-6 py-8">

        <h1 class="text-2xl font-bold text-text mb-8 font-sans">Selesaikan Pesanan Anda</h1>

        <div class="flex gap-6 items-start">

            {{-- ===== LEFT COLUMN ===== --}}
            <div class="flex-1 flex flex-col gap-5">

                {{-- Detail Pengiriman --}}
                <div class="bg-white rounded-2xl shadow-sm p-7">
                    <div class="flex items-center gap-3 mb-5">
                        <div class="w-9 h-9 rounded-lg bg-success-soft flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-success" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 17a2 2 0 11-4 0 2 2 0 014 0zm10 0a2 2 0 11-4 0 2 2 0 014 0M1 3h1l1.5 9h11l1.5-9H5"/>
                            </svg>
                        </div>
                        <h2 class="text-base font-semibold text-primary font-sans">Detail Pengiriman</h2>
                    </div>

                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-sm text-text-muted mb-1.5">Nama Lengkap</label>
                            <input type="text" name="nama" placeholder="Contoh: Budi Santoso"
                                   value="{{ old('nama') }}"
                                   class="w-full border border-border rounded-lg px-3.5 py-2.5 text-sm text-text
                                          focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary transition">
                        </div>
                        <div>
                            <label class="block text-sm text-text-muted mb-1.5">Nomor WhatsApp</label>
                            <input type="tel" name="whatsapp" placeholder="0812xxxxxxxx"
                                   value="{{ old('whatsapp') }}"
                                   class="w-full border border-border rounded-lg px-3.5 py-2.5 text-sm text-text
                                          focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary transition">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm text-text-muted mb-1.5">Alamat Lengkap</label>
                        <textarea name="alamat" rows="3"
                                  placeholder="Nama Jalan, Nomor Rumah, Kelurahan, Kecamatan, Kota, Kode Pos"
                                  class="w-full border border-border rounded-lg px-3.5 py-2.5 text-sm text-text resize-none
                                         focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary transition">{{ old('alamat') }}</textarea>
                    </div>
                </div>

                {{-- Metode Pengiriman --}}
                <div class="bg-white rounded-2xl shadow-sm p-7">
                    <div class="flex items-center gap-3 mb-5">
                        <div class="w-9 h-9 rounded-lg bg-success-soft flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-success" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                            </svg>
                        </div>
                        <h2 class="text-base font-semibold text-primary font-sans">Metode Pengiriman</h2>
                    </div>

                    <div class="flex flex-col gap-3">

                        {{-- JNE --}}
                        <label id="opt-jne"
                               class="flex items-center justify-between border-2 border-success bg-success-soft rounded-xl px-5 py-3.5 cursor-pointer transition">
                            <div class="flex items-center gap-3">
                                <input type="radio" name="pengiriman" value="jne" checked
                                       onchange="selectShipping(this)"
                                       class="w-4 h-4 accent-success">
                                <div>
                                    <p class="font-semibold text-sm text-text">JNE</p>
                                    <p class="text-xs text-text-muted">Reguler (2–3 Hari)</p>
                                </div>
                            </div>
                            <span class="font-semibold text-sm text-success">Rp 25.000</span>
                        </label>

                        {{-- J&T --}}
                        <label id="opt-jt"
                               class="flex items-center justify-between border border-border rounded-xl px-5 py-3.5 cursor-pointer hover:border-success hover:bg-success-soft transition">
                            <div class="flex items-center gap-3">
                                <input type="radio" name="pengiriman" value="jt"
                                       onchange="selectShipping(this)"
                                       class="w-4 h-4 accent-success">
                                <div>
                                    <p class="font-semibold text-sm text-text">J&T</p>
                                    <p class="text-xs text-text-muted">Ekspres (1–2 Hari)</p>
                                </div>
                            </div>
                            <span class="font-semibold text-sm text-text-muted">Rp 30.000</span>
                        </label>

                        {{-- Cargo --}}
                        <label id="opt-cargo"
                               class="flex items-center justify-between border border-border rounded-xl px-5 py-3.5 cursor-pointer hover:border-success hover:bg-success-soft transition">
                            <div class="flex items-center gap-3">
                                <input type="radio" name="pengiriman" value="cargo"
                                       onchange="selectShipping(this)"
                                       class="w-4 h-4 accent-success">
                                <div>
                                    <p class="font-semibold text-sm text-text">Cargo</p>
                                    <p class="text-xs text-text-muted">Layanan Berat (5+ Hari)</p>
                                </div>
                            </div>
                            <span class="font-semibold text-sm text-text-muted">Rp 15.000/kg</span>
                        </label>

                    </div>
                </div>

            </div>{{-- /LEFT --}}

            {{-- ===== RIGHT COLUMN: Ringkasan Pesanan ===== --}}
            <div class="w-80 flex-shrink-0 rounded-2xl overflow-hidden shadow-sm">

                {{-- Header navy --}}
                <div class="bg-primary px-6 py-4">
                    <h2 class="text-base font-bold text-white font-sans">Ringkasan Pesanan</h2>
                </div>

                {{-- Body --}}
                <div class="bg-white px-6 py-5 flex flex-col gap-4">

                    {{-- Product row --}}
                    <div class="flex items-center gap-3">
                        {{-- Thumbnail --}}
                        <div class="w-12 h-12 rounded-lg bg-surface-2 flex items-center justify-center flex-shrink-0 overflow-hidden">
                            @if($product->img_path)
                                <img src="{{ asset('storage/' . $product->img_path) }}"
                                     alt="{{ $product->name }}"
                                     class="w-full h-full object-cover">
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-text-subtle" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            @endif
                        </div>

                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-semibold text-text truncate">
                                {{ $product->name }}
                            </p>
                            {{-- Qty control --}}
                            <div class="flex items-center gap-2 mt-1.5">
                                <button type="button" onclick="changeQty(-1)"
                                        class="w-7 h-7 border border-border rounded-md flex items-center justify-center text-text-muted
                                               hover:border-primary hover:text-primary transition text-base leading-none">-</button>
                                <span id="qty-display" class="text-sm font-medium text-text w-5 text-center">1</span>
                                <button type="button" onclick="changeQty(1)"
                                        class="w-7 h-7 border border-border rounded-md flex items-center justify-center text-text-muted
                                               hover:border-primary hover:text-primary transition text-base leading-none">+</button>
                            </div>
                        </div>

                        <span id="item-price" class="text-sm font-semibold text-primary">
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </span>
                    </div>

                    <hr class="border-border">

                    {{-- Price breakdown --}}
                    <div class="flex flex-col gap-2 text-sm text-text-muted">
                        <div class="flex justify-between">
                            <span>Subtotal</span>
                            <span id="subtotal-display">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span id="shipping-label">Biaya Pengiriman (JNE)</span>
                            <span id="shipping-display">Rp 25.000</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Diskon</span>
                            <span class="font-semibold text-success">Rp 0</span>
                        </div>
                    </div>

                    <hr class="border-border">

                    {{-- Total --}}
                    <div class="flex justify-between items-center">
                        <span class="font-bold text-text text-sm">Total Pembayaran</span>
                        <span id="total-display" class="font-bold text-primary text-base">
                            Rp {{ number_format($product->price + 25000, 0, ',', '.') }}
                        </span>
                    </div>

                    {{-- CTA --}}
                    <x-button variant="primary" class="w-full active:scale-[0.98] font-sans" onclick="submitOrder()">
                        Buat Pesanan
                    </x-button>

                    {{-- Trust badge --}}
                    <p class="text-center text-xs text-text-subtle flex items-center justify-center gap-1.5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                        Transaksi aman &amp; terpercaya via WhatsApp Admin
                    </p>

                </div>
            </div>{{-- /RIGHT --}}

        </div>
    </div>

    <script>
        const BASE_PRICE = {{ $product->price }};
        let qty = 1;

        const shippingOptions = {
            jne:   { label: 'JNE',   cost: 25000, display: 'Rp 25.000' },
            jt:    { label: 'J&T',   cost: 30000, display: 'Rp 30.000' },
            cargo: { label: 'Cargo', cost: 0,     display: 'Rp 15.000/kg' },
        };
        let selectedKey = 'jne';

        function fmt(n) {
            return 'Rp ' + n.toLocaleString('id-ID');
        }

        function render() {
            const subtotal = BASE_PRICE * qty;
            const shipping = shippingOptions[selectedKey].cost;
            document.getElementById('qty-display').textContent      = qty;
            document.getElementById('item-price').textContent       = fmt(subtotal);
            document.getElementById('subtotal-display').textContent = fmt(subtotal);
            document.getElementById('shipping-label').textContent   = 'Biaya Pengiriman (' + shippingOptions[selectedKey].label + ')';
            document.getElementById('shipping-display').textContent = shippingOptions[selectedKey].display;
            document.getElementById('total-display').textContent    = fmt(subtotal + shipping);
        }

        function changeQty(delta) {
            qty = Math.max(1, qty + delta);
            render();
        }

        function selectShipping(radio) {
            ['jne', 'jt', 'cargo'].forEach(key => {
                const el = document.getElementById('opt-' + key);
                el.classList.remove('border-2', 'border-success', 'bg-success-soft');
                el.classList.add('border', 'border-border');
            });
            const sel = document.getElementById('opt-' + radio.value);
            sel.classList.remove('border', 'border-border');
            sel.classList.add('border-2', 'border-success', 'bg-success-soft');

            selectedKey = radio.value;
            render();
        }

        function submitOrder() {
            const nama     = document.querySelector('input[name="nama"]').value.trim();
            const whatsapp = document.querySelector('input[name="whatsapp"]').value.trim();
            const alamat   = document.querySelector('textarea[name="alamat"]').value.trim();
            const metode   = document.querySelector('input[name="pengiriman"]:checked')?.value;

            if (!nama || !whatsapp || !alamat) {
                alert('Mohon lengkapi semua field pengiriman.');
                return;
            }

            const form = document.createElement('form');
            form.method = 'POST';
            form.action = '{{ route("user.order.store", $product) }}';

            const fields = {
                _token:     '{{ csrf_token() }}',
                nama,
                whatsapp,
                alamat,
                pengiriman: metode,
                quantity:   qty,
            };

            for (const [k, v] of Object.entries(fields)) {
                const inp = document.createElement('input');
                inp.type  = 'hidden';
                inp.name  = k;
                inp.value = v;
                form.appendChild(inp);
            }

            document.body.appendChild(form);
            form.submit();
        }
    </script>

</x-layout>
