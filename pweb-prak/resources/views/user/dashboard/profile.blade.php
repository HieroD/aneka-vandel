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
                <div class="flex w-52 shrink-0 flex-col items-center gap-4">
                    <p class="text-sm font-medium text-text">Foto Profil</p>
                    <div class="avatar-circle">
                        @if(auth()->user()->avatar ?? false)
                            <img src="{{ asset('storage/' . auth()->user()->avatar) }}" alt="Avatar" class="h-full w-full object-cover">
                        @else
                            <div class="avatar-placeholder">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 12c2.7 0 4.8-2.1 4.8-4.8S14.7 2.4 12 2.4 7.2 4.5 7.2 7.2 9.3 12 12 12zm0 2.4c-3.2 0-9.6 1.6-9.6 4.8v2.4h19.2v-2.4c0-3.2-6.4-4.8-9.6-4.8z"/>
                                </svg>
                            </div>
                        @endif
                    </div>

                    {{-- TODO: backend — form action + route for avatar upload is not yet wired --}}
                    <form method="post" enctype="multipart/form-data" action="" class="contents">
                        @csrf
                        <input
                            type="file"
                            name="avatar"
                            id="avatar-input"
                            class="hidden"
                            accept="image/*"
                            onchange="this.form.submit()"
                        >
                        <label for="avatar-input">
                            <x-button variant="secondary" :type="'button'">Pilih Foto</x-button>
                        </label>
                    </form>
                </div>
            </div>
        </main>
    </div>

</x-layout>
