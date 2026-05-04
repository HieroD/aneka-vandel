<aside class="w-60 shrink-0">
    <div class="mb-6">
        <h2 class="text-lg font-bold text-gray-800">Halo, {{ auth()->user()->name ?? 'Azka' }}! 👋</h2>
        <p class="text-sm text-gray-500">Bagaimana kabarmu?</p>
    </div>

    <nav class="flex flex-col gap-2">
        <a href=" {{ route('user.profile') }} "
            class="sidebar-link active flex items-center gap-3 px-4 py-3 rounded-xl font-medium text-gray-600
            {{ request()->routeIs('user.profile') ? 'text-gray-800 bg-white shadow-sm' : 'text-gray-600 hover:bg-white/60' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-600" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5.121 17.804A8 8 0 1118.88 6.196M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            Profil Saya
        </a>

        <a href=" {{ route('user.orders') }} "
            class="sidebar-link active flex items-center gap-3 px-4 py-3 rounded-xl font-medium text-gray-600
            {{ request()->routeIs('user.orders') ? 'text-gray-800 bg-white shadow-sm' : 'text-gray-600 hover:bg-white/60' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-600" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
            </svg>
            Pesanan Saya
        </a>

        @if(auth()->user()->role === 'admin')
        <a href=" {{ route('admin.statistic') }} " class="sidebar-link active flex items-center gap-3 px-4 py-3 rounded-xl font-medium text-gray-600
            {{ request()->routeIs('admin.statistic') ? 'text-gray-800 bg-white shadow-sm' : 'text-gray-600 hover:bg-white/60' }}">
            <svg class="w-5 h-5 text-gray-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <line x1="18" y1="20" x2="18" y2="10" />
                <line x1="12" y1="20" x2="12" y2="4" />
                <line x1="6" y1="20" x2="6" y2="14" />
            </svg>
            Statistik
        </a>
        @endif
    </nav>

    {{-- Keluar --}}
    <div class="mt-8">
        <form method="post" action="{{ route('logout') }}">
            @csrf
            @method('DELETE')
            <button type="submit"
                class="flex items-center gap-3 px-4 py-3 text-red-600 hover:text-red-700 font-medium transition cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h6a2 2 0 012 2v1" />
                </svg>
                Keluar
            </button>
        </form>
    </div>
</aside>