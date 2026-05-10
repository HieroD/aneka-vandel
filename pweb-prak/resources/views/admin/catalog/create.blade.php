<x-layout title="Tambah Produk - Aneka Vandel">
    <main class="font-outfit text-gray-800 min-h-screen bg-gray-50 flex items-start justify-center py-12 px-4">
        <div class="w-full max-w-2xl">

            {{-- Header --}}
            <div class="mb-8">
                <a href="{{ route('catalog.index') }}"
                    class="inline-flex items-center gap-2 text-sm text-[#1C398E] font-medium hover:underline mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                    </svg>
                    Kembali ke Katalog
                </a>
                <h1 class="text-3xl font-bold text-[#1C398E]">Tambah Produk Baru</h1>
                <p class="text-gray-500 mt-1 text-sm">Isi semua informasi produk yang ingin ditambahkan ke katalog.</p>
            </div>

            {{-- Error Bag --}}
            @if ($errors->any())
            <div class="mb-6 bg-red-50 border border-red-200 text-red-700 rounded-xl px-5 py-4 text-sm">
                <p class="font-semibold mb-1">Terdapat kesalahan:</p>
                <ul class="list-disc list-inside space-y-0.5">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            {{-- Form Card --}}
            <div class="bg-white rounded-2xl shadow-md p-8">
                <form action="{{ route('catalog.store') }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-6">
                    @csrf

                    {{-- Nama Produk --}}
                    <div class="flex flex-col gap-1.5">
                        <label for="name" class="text-sm font-semibold text-gray-700">
                            Nama Produk <span class="text-red-500">*</span>
                        </label>
                        <input
                            type="text"
                            id="name"
                            name="name"
                            value="{{ old('name') }}"
                            placeholder="Contoh: Vandel Marmer Premium"
                            class="px-4 py-2.5 rounded-xl border border-gray-300 text-sm outline-none focus:ring-2 focus:ring-[#1C398E]/40 focus:border-[#1C398E] transition @error('name') border-red-400 bg-red-50 @enderror">
                        @error('name')
                        <p class="text-xs text-red-500 mt-0.5">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Kategori --}}
                    <div class="flex flex-col gap-1.5">
                        <label for="category" class="text-sm font-semibold text-gray-700">
                            Kategori <span class="text-red-500">*</span>
                        </label>
                        <select
                            id="category"
                            name="category"
                            class="px-4 py-2.5 rounded-xl border border-gray-300 text-sm outline-none focus:ring-2 focus:ring-[#1C398E]/40 focus:border-[#1C398E] transition bg-white @error('category') border-red-400 bg-red-50 @enderror">
                            <option value="" disabled {{ old('category') ? '' : 'selected' }}>-- Pilih Kategori --</option>
                            <option value="Vandel" {{ old('category') == 'Vandel'   ? 'selected' : '' }}>Vandel</option>
                            <option value="Prasasti" {{ old('category') == 'Prasasti' ? 'selected' : '' }}>Prasasti</option>
                            <option value="Kijangan" {{ old('category') == 'Kijangan' ? 'selected' : '' }}>Kijangan</option>
                        </select>
                        @error('category')
                        <p class="text-xs text-red-500 mt-0.5">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Harga --}}
                    <div class="flex flex-col gap-1.5">
                        <label for="price" class="text-sm font-semibold text-gray-700">
                            Harga (Rp) <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-sm text-gray-400 font-medium select-none">Rp</span>
                            <input
                                type="number"
                                id="price"
                                name="price"
                                value="{{ old('price') }}"
                                placeholder="0"
                                min="0"
                                class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-gray-300 text-sm outline-none focus:ring-2 focus:ring-[#1C398E]/40 focus:border-[#1C398E] transition @error('price') border-red-400 bg-red-50 @enderror">
                        </div>
                        @error('price')
                        <p class="text-xs text-red-500 mt-0.5">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Stok --}}
                    <div class="flex flex-col gap-1.5">
                        <label for="total_product" class="text-sm font-semibold text-gray-700">
                            Stok <span class="text-red-500">*</span>
                        </label>
                        <input
                            type="number"
                            id="total_product"
                            name="total_product"
                            value="{{ old('total_product') }}"
                            placeholder="0"
                            min="0"
                            class="px-4 py-2.5 rounded-xl border border-gray-300 text-sm outline-none focus:ring-2 focus:ring-[#1C398E]/40 focus:border-[#1C398E] transition @error('total_product') border-red-400 bg-red-50 @enderror">
                        @error('total_product')
                        <p class="text-xs text-red-500 mt-0.5">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Deskripsi --}}
                    <div class="flex flex-col gap-1.5">
                        <label for="description" class="text-sm font-semibold text-gray-700">Deskripsi</label>
                        <textarea
                            id="description"
                            name="description"
                            rows="4"
                            placeholder="Tuliskan deskripsi produk..."
                            class="px-4 py-2.5 rounded-xl border border-gray-300 text-sm outline-none focus:ring-2 focus:ring-[#1C398E]/40 focus:border-[#1C398E] transition resize-none @error('description') border-red-400 bg-red-50 @enderror">{{ old('description') }}</textarea>
                        @error('description')
                        <p class="text-xs text-red-500 mt-0.5">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Upload Gambar --}}
                    <div class="flex flex-col gap-1.5">
                        <label class="text-sm font-semibold text-gray-700">Foto Produk</label>

                        {{-- Preview area (tersembunyi sampai ada gambar dipilih) --}}
                        <div id="preview-wrapper" class="hidden mb-2">
                            <img id="image-preview" src="" alt="Preview" class="h-48 w-full object-cover rounded-xl border border-gray-200">
                        </div>

                        {{-- Drop zone --}}
                        <label for="image"
                            class="flex flex-col items-center justify-center gap-2 border-2 border-dashed border-gray-300 rounded-xl py-8 cursor-pointer hover:border-[#1C398E] hover:bg-[#1C398E]/5 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5m-13.5-9L12 3m0 0 4.5 4.5M12 3v13.5" />
                            </svg>
                            <span id="upload-label" class="text-sm text-gray-500">Klik untuk upload gambar</span>
                            <span class="text-xs text-gray-400">PNG, JPG, WEBP — maks. 2MB</span>
                            <input type="file" id="image" name="image" accept="image/*" class="hidden" onchange="previewImage(event)">
                        </label>
                        @error('image')
                        <p class="text-xs text-red-500 mt-0.5">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Action Buttons --}}
                    <div class="flex gap-3 pt-2">
                        <a href="{{ route('catalog.index') }}"
                            class="flex-1 text-center py-3 rounded-xl border border-gray-300 text-sm font-semibold text-gray-600 hover:bg-gray-50 transition">
                            Batal
                        </a>
                        <button type="submit"
                            class="flex-1 py-3 rounded-xl bg-[#1C398E] text-white text-sm font-semibold hover:bg-[#162d72] transition">
                            Simpan Produk
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </main>

    @push('scripts')
    <script>
        // Tampilkan preview gambar saat file dipilih
        function previewImage(event) {
            const file = event.target.files[0];
            if (!file) return;

            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('image-preview').src = e.target.result;
                document.getElementById('preview-wrapper').classList.remove('hidden');
                document.getElementById('upload-label').textContent = file.name;
            };
            reader.readAsDataURL(file);
        }
    </script>
    @endpush
</x-layout>