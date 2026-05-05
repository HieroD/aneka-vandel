<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Admin') - Aneka Vandel</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>

    @stack('styles')
</head>

<body class="font-['Segoe_UI'] bg-[#f5f7fa] flex flex-col min-h-screen">

    {{-- NAVBAR --}}
    <header class="bg-white border-b border-[#e2e8f0] sticky top-0 z-[100]">
        <nav class="flex items-center justify-between px-8 h-16">

            <a href="{{ route('home') }}" class="flex items-center gap-2.5">
                <img src="{{ asset('assets/logo-vandel.png') }}"
                    class="w-10 h-10 rounded-full">
                <span class="text-[16px] font-bold text-[#1a2744]">Aneka Vandel</span>
            </a>

            <div class="flex items-center gap-6">
                <a href="{{ route('about') }}" class="text-[#4a5568] text-[14px] font-medium">About</a>
                <a href="{{ route('catalog.index', ['kategori' => 'all'])}}" class="text-[#4a5568] text-[14px] font-medium">Catalog</a>

                <form method="POST" action="{{ route('logout') }}" class="m-0">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="flex items-center gap-1.5 bg-[#e53e3e] hover:bg-[#c53030] text-white px-4 py-2 rounded-lg text-[13px] font-semibold">
                        <svg class="w-[14px] h-[14px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                            <path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4" />
                            <polyline points="16,17 21,12 16,7" />
                            <line x1="21" y1="12" x2="9" y2="12" />
                        </svg>
                        Log Out
                    </button>
                </form>
            </div>

        </nav>
    </header>

    <div class="flex flex-1">

        {{-- SIDEBAR --}}
        <aside class="w-[200px] bg-white border-r border-[#e2e8f0] py-6 flex flex-col min-h-[calc(100vh-64px)]">

            <div class="px-5 pb-5 border-b border-[#f0f4f8]">
                <div class="text-[15px] font-bold text-[#1a202c]">
                    Halo, {{ auth()->user()->name ?? 'Azka'}}! 👋
                </div>
                <div class="text-[12px] text-[#718096] mt-[2px]">
                    Bagaimana kabarmu?
                </div>
            </div>

            <nav class="py-3 flex-1">

                <a href="{{ route('admin.profile') }}"
                    class="flex items-center gap-2.5 px-5 py-2.5 text-[13px] font-medium text-[#4a5568] hover:bg-[#f7fafc] hover:text-[#1a2744]
                    {{ request()->routeIs('admin.profile') ? 'bg-[#ebf4ff] text-[#1a2744] font-semibold mx-2 px-3 rounded-lg w-[calc(100%-16px)]' : '' }}">
                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2" />
                        <circle cx="12" cy="7" r="4" />
                    </svg>
                    Profil Admin
                </a>

                <a href="{{ route('admin.orders') }}"
                    class="flex items-center gap-2.5 px-5 py-2.5 text-[13px] font-medium text-[#4a5568] hover:bg-[#f7fafc] hover:text-[#1a2744]
                    {{ request()->routeIs('admin.orders') ? 'bg-[#ebf4ff] text-[#1a2744] font-semibold mx-2 px-3 rounded-lg w-[calc(100%-16px)]' : '' }}">
                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z" />
                        <line x1="3" y1="6" x2="21" y2="6" />
                    </svg>
                    Kelola Pesanan
                </a>

                <a href="{{ route('admin.statistic') }}"
                    class="flex items-center gap-2.5 px-5 py-2.5 text-[13px] font-medium text-[#4a5568] hover:bg-[#f7fafc] hover:text-[#1a2744]
                    {{ request()->routeIs('admin.statistic') ? 'bg-[#ebf4ff] text-[#1a2744] font-semibold mx-2 px-3 rounded-lg w-[calc(100%-16px)]' : '' }}">
                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <line x1="18" y1="20" x2="18" y2="10" />
                        <line x1="12" y1="20" x2="12" y2="4" />
                        <line x1="6" y1="20" x2="6" y2="14" />
                    </svg>
                    Statistik
                </a>

            </nav>

            <div class="py-3 border-t border-[#f0f4f8]">
                <form method="POST" action="{{ route('logout') }}" class="m-0">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="flex items-center gap-2.5 px-5 py-2.5 text-[13px] font-medium text-[#e53e3e] hover:bg-[#f7fafc] w-full">
                        <svg class="w-4 h-4 text-[#e53e3e]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4" />
                            <polyline points="16,17 21,12 16,7" />
                            <line x1="21" y1="12" x2="9" y2="12" />
                        </svg>
                        Keluar
                    </button>
                </form>
            </div>

        </aside>

        {{-- CONTENT --}}
        <div class="flex-1 px-10 py-8 max-w-[calc(100%-200px)]">

            @if(session('success'))
            <div class="bg-[#c6f6d5] text-[#276749] px-4 py-3 rounded-lg mb-5 text-[13px] font-semibold">
                ✓ {{ session('success') }}
            </div>
            @endif

            @if(session('error'))
            <div class="bg-[#fed7d7] text-[#c53030] px-4 py-3 rounded-lg mb-5 text-[13px] font-semibold">
                {{ session('error') }}
            </div>
            @endif

            @yield('content')

        </div>

    </div>

    {{-- FOOTER --}}
    <footer class="bg-[#1a2744] text-white px-8 py-5 flex items-center justify-between">

        <div class="flex gap-3">
            <img src="{{ asset('assets/linkedin.png') }}" class="w-7 h-7 brightness-0 invert opacity-80">
            <img src="{{ asset('assets/facebook.png') }}" class="w-7 h-7 brightness-0 invert opacity-80">
            <img src="{{ asset('assets/instagram.png') }}" class="w-7 h-7 brightness-0 invert opacity-80">
            <img src="{{ asset('assets/youtube.png') }}" class="w-7 h-7 brightness-0 invert opacity-80">
        </div>

        <p class="text-[12px] opacity-70">© 2026 Aneka Vandel. All rights reserved</p>

    </footer>

    @stack('scripts')

</body>

</html>