<x-admin-layout title="Edit Produk">

    <form action="{{ route('catalog.update', $product) }}" method="POST" enctype="multipart/form-data" id="productForm">
        @csrf
        @method('PATCH')

        {{-- HEADER --}}
        <div class="flex items-start justify-between mb-7">
            <div>
                <h1 class="text-[22px] font-bold text-text mb-1">Edit Produk</h1>
                <p class="text-[13px] text-text-subtle">Silahkan perbarui detail produk vandel Anda.</p>
            </div>
            <div class="flex gap-2.5 shrink-0">
                <a href="{{ route('catalog.pick') }}" class="inline-flex items-center justify-center font-semibold rounded-lg transition-colors duration-200 px-5 py-2.5 text-sm bg-white border border-border text-text-muted hover:bg-surface-2">Batal</a>
                <x-button type="submit" variant="primary">Perbarui Produk</x-button>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-[320px_1fr] gap-6 items-start">

            {{-- FOTO PRODUK --}}
            <div class="bg-white rounded-xl border border-border p-5">
                <label
                    for="image"
                    class="flex flex-col items-center justify-center gap-2 aspect-square w-full rounded-xl border-2 border-dashed border-border bg-surface-2 cursor-pointer hover:border-primary hover:bg-primary-soft transition overflow-hidden">
                    @if ($product->img_path)
                    <img id="image-preview" src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                    <div id="image-placeholder" class="hidden flex-col items-center gap-2 text-text-subtle"></div>
                    @else
                    <img id="image-preview" src="" alt="Preview" class="hidden w-full h-full object-cover">
                    <div id="image-placeholder" class="flex flex-col items-center gap-2 text-text-subtle">
                        <svg class="w-9 h-9" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 9a2 2 0 012-2h1.5l1-1.5h5l1 1.5H16a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                            <circle cx="12" cy="13.5" r="3.2" stroke-linecap="round" stroke-linejoin="round" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.8 7l.6-1h1.1" />
                        </svg>
                        <span class="text-[13px] font-medium">Unggah Foto Produk</span>
                    </div>
                    @endif
                </label>
                <input type="file" id="image" name="image" accept="image/*" class="hidden" data-image-preview>
                @error('image')
                <p class="text-xs text-danger mt-1.5">{{ $message }}</p>
                @enderror

                <div class="grid grid-cols-3 gap-2.5 mt-2.5">
                    <label for="image" class="aspect-square rounded-lg border-2 border-dashed border-border flex items-center justify-center text-text-subtle cursor-pointer hover:border-primary hover:text-primary transition">
                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" d="M12 5v14M5 12h14" />
                        </svg>
                    </label>
                    <div class="aspect-square rounded-lg bg-surface-2"></div>
                    <div class="aspect-square rounded-lg bg-surface-2"></div>
                </div>
                <p class="text-[11px] text-text-subtle mt-2 text-center">PNG, JPG, WEBP — maks. 2MB</p>
            </div>

            {{-- FORM FIELDS --}}
            <div class="bg-white rounded-xl border border-border p-6 flex flex-col gap-5">

                {{-- Nama Produk --}}
                <div>
                    <label for="name" class="block text-sm font-semibold text-text-muted mb-1.5">Nama Produk</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name', $product->name) }}"
                        placeholder="Masukkan nama vandel (contoh: Vandel Kayu Eksklusif)"
                        class="w-full px-4 py-2.5 rounded-xl border border-border text-sm text-text focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/40 transition"
                        required>
                    @error('name')
                    <p class="text-xs text-danger mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Kategori Produk --}}
                <div>
                    <label class="block text-sm font-semibold text-text-muted mb-1.5">Kategori Produk</label>
                    @php $selectedCategory = old('category', $product->category); @endphp
                    <input type="hidden" name="category" id="category" value="{{ $selectedCategory }}" required>
                    <div class="flex gap-2" data-category-picker>
                        @foreach (['Vandel', 'Prasasti', 'Kijangan'] as $cat)
                        <button
                            type="button"
                            data-category-option="{{ $cat }}"
                            @class([ 'px-4 py-2 rounded-lg text-sm font-semibold border transition' , 'bg-primary text-white border-primary'=> $selectedCategory === $cat,
                            'bg-white text-text-muted border-border hover:bg-surface-2' => $selectedCategory !== $cat,
                            ])
                            >{{ $cat }}</button>
                        @endforeach
                    </div>
                    @error('category')
                    <p class="text-xs text-danger mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Harga Produk --}}
                <div>
                    <label for="price" class="block text-sm font-semibold text-text-muted mb-1.5">Harga Produk</label>
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
                            required>
                    </div>
                    @error('price')
                    <p class="text-xs text-danger mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Deskripsi Produk --}}
                <div>
                    <label for="description" class="block text-sm font-semibold text-text-muted mb-1.5">Deskripsi Produk</label>
                    <textarea
                        id="description"
                        name="description"
                        rows="5"
                        placeholder="Tuliskan detail produk seperti bahan, ukuran, dan keunggulan..."
                        class="w-full px-4 py-2.5 rounded-xl border border-border text-sm text-text focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/40 transition resize-none"
                        required>{{ old('description', $product->description) }}</textarea>
                    @error('description')
                    <p class="text-xs text-danger mt-1">{{ $message }}</p>
                    @enderror
                </div>

            </div>

        </div>

        <input type="hidden" name="total_product" value="{{ $product->total_product }}">

    </form>

    {{-- ZONA BAHAYA --}}
    <div class="mt-6 flex justify-end">
        <button
            type="button"
            class="text-xs font-semibold text-danger hover:underline"
            onclick="if (confirm('Yakin ingin menghapus produk {{ $product->name }}? Tindakan ini tidak bisa dibatalkan.')) { document.getElementById('deleteForm').submit(); }">
            Hapus Produk Ini
        </button>
    </div>
    <form action="{{ route('catalog.destroy', $product) }}" method="POST" id="deleteForm" class="hidden">
        @csrf
        @method('DELETE')
    </form>

    @push('scripts')
    <script>
        document.querySelectorAll('[data-category-picker]').forEach(function(picker) {
            picker.querySelectorAll('[data-category-option]').forEach(function(btn) {
                btn.addEventListener('click', function() {
                    document.getElementById('category').value = btn.dataset.categoryOption;
                    picker.querySelectorAll('[data-category-option]').forEach(function(b) {
                        b.classList.remove('bg-primary', 'text-white', 'border-primary');
                        b.classList.add('bg-white', 'text-text-muted', 'border-border');
                    });
                    btn.classList.remove('bg-white', 'text-text-muted', 'border-border');
                    btn.classList.add('bg-primary', 'text-white', 'border-primary');
                });
            });
        });

        document.querySelectorAll('input[type="file"][data-image-preview]').forEach(function(input) {
            input.addEventListener('change', function(e) {
                var file = e.target.files[0];
                if (!file) return;
                var reader = new FileReader();
                reader.onload = function(ev) {
                    var preview = document.getElementById('image-preview');
                    var placeholder = document.getElementById('image-placeholder');
                    preview.src = ev.target.result;
                    preview.classList.remove('hidden');
                    placeholder.classList.add('hidden');
                };
                reader.readAsDataURL(file);
            });
        });
    </script>
    @endpush

</x-admin-layout>