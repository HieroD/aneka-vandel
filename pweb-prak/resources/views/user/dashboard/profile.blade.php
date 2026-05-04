<x-layout title="Profil Saya - Aneka Vandel">

    {{-- MAIN CONTENT --}}
    <div class="flex flex-1 max-w-7xl mx-auto w-full px-6 py-8 gap-6">

        {{-- SIDEBAR --}}
        <x-sidebar/>

        {{-- PROFILE FORM --}}
        <main class="flex-1 bg-white rounded-2xl shadow-sm p-8">
            <h1 class="text-2xl font-bold text-gray-800 mb-1">Profil Saya</h1>
            <p class="text-sm text-gray-500 mb-8">Perbarui informasi profil Anda</p>

            <div class="flex gap-10">
                {{-- Form Fields --}}
                <form method="post" enctype="multipart/form-data" action="{{ route('user.update') }}" class="flex-1">
                    @csrf
                    @method('PUT')

                    <div class="flex items-center gap-4 mb-5">
                        <label for="name" class="w-36 shrink-0 text-sm font-medium text-gray-700">Nama Lengkap</label>
                        <input type="text" id="name" name="name"
                            value="{{ old('name', auth()->user()->name ?? '') }}"
                            placeholder="Masukkan nama lengkap Anda"
                            class="flex-1 px-3 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-300">
                        @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="flex items-center gap-4 mb-5">
                        <label for="email" class="w-36 shrink-0 text-sm font-medium text-gray-700">Email</label>
                        <input type="email" id="email" name="email"
                            value="{{ old('email', auth()->user()->email ?? '') }}"
                            placeholder="contoh@email.com"
                            class="flex-1 px-3 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-300">
                        @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="flex items-center gap-4 mb-8">
                        <label for="phone" class="w-36 shrink-0 text-sm font-medium text-gray-700">Nomor Telepon</label>
                        <input type="tel" id="phone" name="phone"
                            value="{{ old('phone', auth()->user()->phone ?? '') }}"
                            placeholder="08xxxxxxxxxx"
                            class="flex-1 px-3 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-300">
                        @error('phone') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="flex items-center gap-4">
                        <button type="submit" class="cursor-pointer text-blue-600 font-medium text-sm hover:text-blue-700 transition">Simpan Perubahan</button>
                        <a href="{{ url()->previous() }}" class="text-red-500 font-medium text-sm hover:text-red-600 transition">Batal</a>
                    </div>
                </form>

                {{-- Foto Profil --}}
                <div class="flex flex-col items-center gap-4 w-52 shrink-0">
                    <p class="text-sm font-medium text-gray-700">Foto Profil</p>
                    <div class="avatar-circle">
                        @if(auth()->user()->avatar ?? false)
                            <img src="{{ asset('storage/' . auth()->user()->avatar) }}" alt="Avatar" class="w-full h-full object-cover">
                        @else
                            <div class="avatar-placeholder">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 12c2.7 0 4.8-2.1 4.8-4.8S14.7 2.4 12 2.4 7.2 4.5 7.2 7.2 9.3 12 12 12zm0 2.4c-3.2 0-9.6 1.6-9.6 4.8v2.4h19.2v-2.4c0-3.2-6.4-4.8-9.6-4.8z"/>
                                </svg>
                            </div>
                        @endif
                    </div>

                    <form method="">
                        @csrf
                        <input type="file" name="avatar" id="avatar-input" class="hidden" accept="image/*" onchange="document.getElementById('avatar-form').submit()">
                        <label for="avatar-input" class="btn-pilih-foto">Pilih Foto</label>
                    </form>
                </div>
            </div>
        </main>
    </div>

</x-layout>
