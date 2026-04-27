<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya - Aneka Vandel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

    {{-- NAVBAR --}}
    <header class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-6 py-3 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-14 h-14 rounded-full object-cover">
                <span class="text-xl font-bold text-gray-800">Aneka Vandel</span>
            </div>

            <nav class="flex items-center gap-8">
                <a href="#" class="text-gray-600 hover:text-gray-900 font-medium transition">About</a>
                <a href="#" class="text-gray-600 hover:text-gray-900 font-medium transition">Catalog</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn-logout">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h6a2 2 0 012 2v1" />
                        </svg>
                        Log Out
                    </button>
                </form>
            </nav>
        </div>
    </header>

    {{-- MAIN CONTENT --}}
    <div class="flex flex-1 max-w-7xl mx-auto w-full px-6 py-8 gap-6">

        {{-- SIDEBAR --}}
        <aside class="w-60 shrink-0">
            <div class="mb-6">
                <h2 class="text-lg font-bold text-gray-800">Halo, {{ auth()->user()->name ?? 'Azka' }}! 👋</h2>
                <p class="text-sm text-gray-500">Bagaimana kabarmu?</p>
            </div>

            <nav class="flex flex-col gap-2">
                <a href="{{ route('profile.index') }}" class="sidebar-link active">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A8 8 0 1118.88 6.196M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    Profil Saya
                </a>

                <a href="{{ route('orders.index') }}" class="sidebar-link">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                    Pesanan Saya
                </a>
            </nav>

            <div class="mt-8">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="flex items-center gap-3 px-4 py-3 text-red-600 hover:text-red-700 font-medium transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h6a2 2 0 012 2v1" />
                        </svg>
                        Keluar
                    </button>
                </form>
            </div>
        </aside>

        {{-- PROFILE FORM --}}
        <main class="flex-1 bg-white rounded-2xl shadow-sm p-8">
            <h1 class="text-2xl font-bold text-gray-800 mb-1">Profil Saya</h1>
            <p class="text-sm text-gray-500 mb-8">Perbarui informasi profil Anda</p>

            <div class="flex gap-10">
                {{-- Form Fields --}}
                <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="flex-1">
                    @csrf
                    @method('PUT')

                    <div class="mb-6">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input type="text" id="name" name="name" value="{{ old('name', auth()->user()->name ?? 'Azka Danendra Cahya') }}" class="form-input">
                        @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email', auth()->user()->email ?? 'budi@email.com') }}" class="form-input">
                        @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-8">
                        <label for="phone" class="form-label">Nomor Telepon</label>
                        <input type="tel" id="phone" name="phone" value="{{ old('phone', auth()->user()->phone ?? '081234567890') }}" class="form-input">
                        @error('phone') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="flex items-center gap-4">
                        <button type="submit" class="btn-primary">Simpan Perubahan</button>
                        <a href="{{ url()->previous() }}" class="btn-secondary">Batal</a>
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

                    <form method="POST" action="{{ route('profile.avatar') }}" enctype="multipart/form-data" id="avatar-form">
                        @csrf
                        <input type="file" name="avatar" id="avatar-input" class="hidden" accept="image/*" onchange="document.getElementById('avatar-form').submit()">
                        <label for="avatar-input" class="btn-pilih-foto">Pilih Foto</label>
                    </form>
                </div>
            </div>
        </main>
    </div>

    {{-- FOOTER --}}
    <footer class="bg-navy text-white mt-auto">
        <div class="max-w-7xl mx-auto px-6 py-6 flex items-center justify-between">
            <div class="flex items-center gap-4">
                <a href="#" class="social-icon">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"/><circle cx="4" cy="4" r="2"/>
                    </svg>
                </a>
                <a href="#" class="social-icon">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"/>
                    </svg>
                </a>
            </div>
            <p class="text-sm text-white/70">© 2026 Aneka Vandel. All rights reserved</p>
        </div>
    </footer>

</body>
</html>