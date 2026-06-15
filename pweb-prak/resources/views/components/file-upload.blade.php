@props([
    'name' => 'image',
    'accept' => 'image/*',
    'current' => null,
    'maxSize' => '2MB',
])

@php
    $hasCurrent = $current !== null && $current !== '';
@endphp

<div class="flex flex-col gap-1.5">
    <label class="text-sm font-semibold text-text-muted">Foto Produk</label>

    {{-- Current image (edit mode) --}}
    @if ($hasCurrent)
        <div class="mb-2">
            <p class="text-xs text-text-subtle mb-1">Gambar saat ini:</p>
            <img
                id="{{ $name }}-preview"
                src="{{ asset('storage/' . $current) }}"
                alt="Preview"
                class="h-48 w-full object-cover rounded-xl border border-border"
            >
        </div>
    @else
        <div id="{{ $name }}-preview-wrapper" class="hidden mb-2">
            <img
                id="{{ $name }}-preview"
                src=""
                alt="Preview"
                class="h-48 w-full object-cover rounded-xl border border-border"
            >
        </div>
    @endif

    {{-- Drop zone --}}
    <label
        for="{{ $name }}"
        class="flex flex-col items-center justify-center gap-2 border-2 border-dashed border-border rounded-xl py-8 cursor-pointer hover:border-primary hover:bg-primary-soft transition"
    >
        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-text-subtle" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5m-13.5-9L12 3m0 0 4.5 4.5M12 3v13.5" />
        </svg>
        <span id="{{ $name }}-upload-label" class="text-sm text-text-muted">
            {{ $hasCurrent ? 'Ganti gambar (opsional)' : 'Klik untuk upload gambar' }}
        </span>
        <span class="text-xs text-text-subtle">PNG, JPG, WEBP — maks. {{ $maxSize }}</span>
        <input
            type="file"
            id="{{ $name }}"
            name="{{ $name }}"
            accept="{{ $accept }}"
            class="hidden"
            data-image-preview
        >
    </label>

    @error($name)
        <p class="text-xs text-danger mt-0.5">{{ $message }}</p>
    @enderror
</div>

@once
@push('scripts')
<script>
document.querySelectorAll('input[type="file"][data-image-preview]').forEach(function (input) {
    input.addEventListener('change', function (e) {
        var name = e.target.id;
        var file = e.target.files[0];
        if (!file) return;
        var reader = new FileReader();
        reader.onload = function (ev) {
            var preview = document.getElementById(name + '-preview');
            var wrapper = document.getElementById(name + '-preview-wrapper');
            var label = document.getElementById(name + '-upload-label');
            if (preview) preview.src = ev.target.result;
            if (wrapper) wrapper.classList.remove('hidden');
            if (label) label.textContent = file.name;
        };
        reader.readAsDataURL(file);
    });
});
</script>
@endpush
@endonce
