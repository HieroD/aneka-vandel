<x-layout title="Profil Saya - Aneka Vandel">

    {{-- MAIN CONTENT --}}
    <div class="mx-auto flex w-full max-w-7xl flex-1 gap-6 px-6 py-8">

        {{-- SIDEBAR --}}
        <x-sidebar/>

        {{-- PROFILE FORM --}}
        <main class="flex-1 rounded-2xl bg-white p-8 shadow-sm">
            <h1 class="mb-1 text-2xl font-bold text-text">Profil Saya</h1>
            <p class="mb-8 text-sm text-text-muted">Perbarui informasi profil Anda</p>

            <x-flash-messages />

            <div class="flex gap-10">
                {{-- Form Fields --}}
                <form method="post" enctype="multipart/form-data" action="{{ route('user.update') }}" class="flex-1">
                    @csrf
                    @method('PUT')

                    <div class="mb-5 flex items-center gap-4">
                        <label for="name" class="w-36 shrink-0 text-sm font-medium text-text">Nama Lengkap</label>
                        <input
                            type="text"
                            id="name"
                            name="name"
                            value="{{ old('name', auth()->user()->name ?? '') }}"
                            placeholder="Masukkan nama lengkap Anda"
                            class="flex-1 rounded-lg border border-border px-3 py-2 text-sm text-text focus:border-primary focus:ring-2 focus:ring-primary/40 focus:outline-none"
                        >
                        @error('name') <p class="mt-1 text-xs text-danger">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-5 flex items-center gap-4">
                        <label for="email" class="w-36 shrink-0 text-sm font-medium text-text">Email</label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email', auth()->user()->email ?? '') }}"
                            placeholder="contoh@email.com"
                            class="flex-1 rounded-lg border border-border px-3 py-2 text-sm text-text focus:border-primary focus:ring-2 focus:ring-primary/40 focus:outline-none"
                        >
                        @error('email') <p class="mt-1 text-xs text-danger">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-8 flex items-center gap-4">
                        <label for="phone" class="w-36 shrink-0 text-sm font-medium text-text">Nomor Telepon</label>
                        <input
                            type="tel"
                            id="phone"
                            name="phone"
                            value="{{ old('phone', auth()->user()->phone ?? '') }}"
                            placeholder="08xxxxxxxxxx"
                            class="flex-1 rounded-lg border border-border px-3 py-2 text-sm text-text focus:border-primary focus:ring-2 focus:ring-primary/40 focus:outline-none"
                        >
                        @error('phone') <p class="mt-1 text-xs text-danger">{{ $message }}</p> @enderror
                    </div>

                    <div class="flex items-center gap-4">
                        <x-button type="submit" variant="primary">Simpan Perubahan</x-button>
                        <a href="{{ url()->previous() }}" class="text-sm font-medium text-danger transition hover:text-danger-hover">Batal</a>
                    </div>
                </form>

                {{-- Foto Profil --}}
                <div class="w-52 shrink-0 text-center">
                    <p class="mb-4 text-sm font-medium text-text">Foto Profil</p>

                    <div class="mx-auto mb-4 flex h-[120px] w-[120px] items-center justify-center overflow-hidden rounded-full border-[3px] border-border bg-surface-2">
                        @if(auth()->user()->avatar ?? false)
                            <img src="{{ asset('storage/' . auth()->user()->avatar) }}" alt="Avatar" class="h-full w-full object-cover">
                        @else
                            <div class="text-text-subtle">
                                <svg class="h-14 w-14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                    <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2" />
                                    <circle cx="12" cy="7" r="4" />
                                </svg>
                            </div>
                        @endif
                    </div>

                    <form method="post" enctype="multipart/form-data" action="{{ route('user.avatar.update') }}" class="contents">
                        @csrf
                        <input
                            type="file"
                            name="avatar"
                            id="avatar-input"
                            class="hidden"
                            accept="image/*"
                            onchange="this.form.submit()"
                        >
                    </form>

                    <x-button variant="secondary" onclick="document.getElementById('avatar-input').click()" class="cursor-pointer">
                        Pilih Foto
                    </x-button>
                </div>
            </div>
        </main>
    </div>

</x-layout>