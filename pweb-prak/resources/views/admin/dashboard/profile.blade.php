<x-admin-layout title="Profil Admin">

    <h1 class="text-[22px] font-bold text-text mb-1">Profil Admin</h1>
    <p class="text-[13px] text-text-subtle mb-7">Perbarui informasi profil Anda</p>

    {{-- TODO: backend — form action + route for profile update is not yet wired --}}
    <form method="POST" action="" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="grid grid-cols-[1fr_260px] gap-10 items-start">

            {{-- FORM --}}
            <div>

                <div class="mb-5">
                    <label class="block text-[13px] font-semibold text-text-muted mb-1.5">Nama Lengkap</label>
                    <input
                        type="text"
                        name="name"
                        value="{{ auth()->user()->name ?? 'Admin' }}"
                        class="w-full px-3.5 py-2.5 border border-border rounded-lg text-[14px] text-text focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/40"
                    >
                    @error('name')
                        <p class="text-[11px] text-danger mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label class="block text-[13px] font-semibold text-text-muted mb-1.5">Email</label>
                    <input
                        type="email"
                        name="email"
                        value="{{ auth()->user()->email ?? 'admin@example.com' }}"
                        readonly
                        class="w-full px-3.5 py-2.5 border border-border rounded-lg text-[14px] text-text-muted bg-surface-2 cursor-not-allowed"
                    >
                </div>

                <div class="mb-5">
                    <label class="block text-[13px] font-semibold text-text-muted mb-1.5">Nomor Telepon</label>
                    <input
                        type="tel"
                        name="phone"
                        value="{{ old('phone', auth()->user()->phone ?? '') }}"
                        placeholder="Contoh: 08123456789"
                        class="w-full px-3.5 py-2.5 border border-border rounded-lg text-[14px] text-text focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/40"
                    >
                    @error('phone')
                        <p class="text-[11px] text-danger mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex gap-2.5 mt-2">
                    <x-button type="submit" variant="primary" class="cursor-pointer">Simpan Perubahan</x-button>
                    <a href="{{ url()->previous() }}" class="inline-flex items-center justify-center font-semibold rounded-lg transition-colors duration-200 px-5 py-2.5 text-sm bg-white border border-border text-text-muted hover:bg-surface-2">Batal</a>
                </div>

            </div>

            {{-- FOTO --}}
            <div class="text-center">

                <p class="text-[13px] font-semibold text-text-muted mb-4">Foto Profil</p>

                <div id="fotoPreview"
                    class="w-[120px] h-[120px] rounded-full bg-surface-2 mx-auto mb-4 flex items-center justify-center overflow-hidden border-[3px] border-border">

                    @if(auth()->user()->foto ?? false)
                        <img src="{{ asset('storage/' . auth()->user()->foto) }}"
                            class="w-full h-full object-cover" />
                    @else
                        <div class="text-text-subtle">
                            <svg class="w-14 h-14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2" />
                                <circle cx="12" cy="7" r="4" />
                            </svg>
                        </div>
                    @endif

                </div>

                <input type="file" id="fotoInput" name="foto" accept="image/*"
                    class="hidden"
                    data-image-preview
                />

                <x-button variant="secondary" size="md" onclick="document.getElementById('fotoInput').click()" class="cursor-pointer">
                    Pilih Foto
                </x-button>

            </div>

        </div>

    </form>

</x-admin-layout>
