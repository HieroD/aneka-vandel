<x-admin-layout title="Edit Produk">

    <h1 class="text-[22px] font-bold text-text mb-1">Edit Produk</h1>
    <p class="text-[13px] text-text-subtle mb-7">Ubah informasi produk <span class="font-semibold text-text">{{ $product->name }}</span>.</p>

    <div class="bg-white rounded-xl border border-border p-8 max-w-3xl">
        <form action="{{ route('catalog.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-6">
            @csrf
            @method('PATCH')

            {{-- Nama Produk --}}
            <div>
                <label for="name" class="block text-sm font-semibold text-text-muted mb-1.5">
                    Nama Produk <span class="text-danger">*</span>
                </label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name', $product->name) }}"
                    placeholder="Contoh: Vandel Marmer Premium"
                    class="w-full px-4 py-2.5 rounded-xl border border-border text-sm text-text focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/40 transition"
                    required
                >
                @error('name')
                    <p class="text-xs text-danger mt-0.5">{{ $message }}</p>
                @enderror
            </div>

            {{-- Kategori --}}
            <div>
                <label for="category" class="block text-sm font-semibold text-text-muted mb-1.5">
                    Kategori <span class="text-danger">*</span>
                </label>
                <x-select
                    name="category"
                    :options="['Vandel' => 'Vandel', 'Prasasti' => 'Prasasti', 'Kijangan' => 'Kijangan']"
                    placeholder="-- Pilih Kategori --"
                    :selected="$product->category"
                    required
                />
                @error('category')
                    <p class="text-xs text-danger mt-0.5">{{ $message }}</p>
                @enderror
            </div>

            {{-- Harga --}}
            <div>
                <label for="price" class="block text-sm font-semibold text-text-muted mb-1.5">
                    Harga (Rp) <span class="text-danger">*</span>
                </label>
                <div class="relative">
                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-sm text-text-subtle font-medium select-none">Rp</span>
                    <input
                        type="number"
                        id="price"
                        name="price"
                        value="{{ old('price', $product->price) }}"
                        placeholder="0"
                        min="0"
                        class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-border text-sm text-text focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/40 transition"
                        required
                    >
                </div>
                @error('price')
                    <p class="text-xs text-danger mt-0.5">{{ $message }}</p>
                @enderror
            </div>

            {{-- Stok --}}
            <div>
                <label for="total_product" class="block text-sm font-semibold text-text-muted mb-1.5">
                    Stok <span class="text-danger">*</span>
                </label>
                <input
                    type="number"
                    id="total_product"
                    name="total_product"
                    value="{{ old('total_product', $product->total_product) }}"
                    placeholder="0"
                    min="0"
                    class="w-full px-4 py-2.5 rounded-xl border border-border text-sm text-text focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/40 transition"
                    required
                >
                @error('total_product')
                    <p class="text-xs text-danger mt-0.5">{{ $message }}</p>
                @enderror
            </div>

            {{-- Deskripsi --}}
            <x-textarea
                name="description"
                label="Deskripsi"
                placeholder="Tuliskan deskripsi produk..."
                :value="$product->description"
                :rows="4"
            />
            @error('description')
                <p class="text-xs text-danger mt-0.5">{{ $message }}</p>
            @enderror

            {{-- Gambar --}}
            <x-file-upload name="image" :current="$product->img_path" />

            {{-- Action Buttons --}}
            <div class="flex gap-3 pt-2">
                <a href="{{ route('catalog.index') }}" class="flex-1 text-center py-3 rounded-xl border border-border text-sm font-semibold text-text-muted hover:bg-surface-2 transition">Batal</a>
                <x-button type="submit" variant="primary" class="flex-1">Simpan Perubahan</x-button>
            </div>

        </form>

        {{-- Divider + Delete --}}
        <div class="mt-8 pt-6 border-t border-border">
            <p class="text-xs text-text-subtle mb-3">Zona Bahaya</p>
            <form action="{{ route('catalog.destroy', $product->id) }}" method="POST"
                onsubmit="return confirm('Yakin ingin menghapus produk {{ $product->name }}? Tindakan ini tidak bisa dibatalkan.')"
                @csrf
                @method('DELETE')
                <x-button type="submit" variant="danger" class="w-full">Hapus Produk Ini</x-button>
            </form>
        </div>

    </div>

</x-admin-layout>
