<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Admin') - Aneka Vandel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f5f7fa;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* ── TOP NAVBAR ── */
        header {
            background: white;
            border-bottom: 1px solid #e2e8f0;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        header nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 32px;
            height: 64px;
        }

        #logo {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
        }

        #logo img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }

        #logo span {
            font-size: 16px;
            font-weight: 700;
            color: #1a2744;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 24px;
        }

        .nav-links a {
            color: #4a5568;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
        }

        .btn-logout {
            display: flex;
            align-items: center;
            gap: 6px;
            background: #e53e3e;
            color: white;
            padding: 8px 16px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-family: inherit;
            transition: background 0.2s;
        }

        .btn-logout:hover {
            background: #c53030;
        }

        /* ── LAYOUT WRAPPER ── */
        .admin-wrapper {
            display: flex;
            flex: 1;
        }

        /* ── SIDEBAR ── */
        .sidebar {
            width: 200px;
            background: white;
            border-right: 1px solid #e2e8f0;
            padding: 24px 0;
            min-height: calc(100vh - 64px);
            display: flex;
            flex-direction: column;
        }

        .sidebar-greeting {
            padding: 0 20px 20px;
            border-bottom: 1px solid #f0f4f8;
        }

        .sidebar-greeting .greeting {
            font-size: 15px;
            font-weight: 700;
            color: #1a202c;
        }

        .sidebar-greeting .sub {
            font-size: 12px;
            color: #718096;
            margin-top: 2px;
        }

        .sidebar-nav {
            padding: 12px 0;
            flex: 1;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 20px;
            font-size: 13px;
            font-weight: 500;
            color: #4a5568;
            text-decoration: none;
            transition: background 0.15s, color 0.15s;
            border: none;
            background: none;
            width: 100%;
            cursor: pointer;
            font-family: inherit;
        }

        .sidebar-link:hover {
            background: #f7fafc;
            color: #1a2744;
        }

        .sidebar-link.active {
            background: #ebf4ff;
            color: #1a2744;
            font-weight: 600;
            border-radius: 8px;
            margin: 0 8px;
            padding: 10px 12px;
            width: calc(100% - 16px);
        }

        .sidebar-link svg {
            width: 16px;
            height: 16px;
            flex-shrink: 0;
        }

        .sidebar-bottom {
            padding: 12px 0;
            border-top: 1px solid #f0f4f8;
        }

        .sidebar-link.red {
            color: #e53e3e;
        }

        .sidebar-link.red svg {
            color: #e53e3e;
        }

        /* ── MAIN CONTENT ── */
        .admin-content {
            flex: 1;
            padding: 32px 40px;
            max-width: calc(100% - 200px);
        }

        /* ── FOOTER ── */
        footer {
            background: #1a2744;
            color: white;
            padding: 20px 32px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        footer .sosmed {
            display: flex;
            gap: 12px;
        }

        footer .sosmed img {
            width: 28px;
            height: 28px;
            filter: brightness(0) invert(1);
            opacity: 0.8;
        }

        footer p {
            font-size: 12px;
            opacity: 0.7;
        }
    </style>
    @stack('styles')
</head>

<body>

    {{-- TOP NAVBAR --}}
    <header>
        <nav>
            <a href="{{ route('home') }}" id="logo">
                <img src="{{ asset('assets/logo-vandel.png') }}" alt="logo" />
                <span>Aneka Vandel</span>
            </a>
            <div class="nav-links">
                <a href="{{ route('about') }}">About</a>
                <a href="{{ route('catalog.index', ['kategori' => 'all'])}}">Catalog</a>
                <form method="POST" action="{{ route('logout') }}" style="margin:0;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-logout">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
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

    <div class="admin-wrapper">
        {{-- SIDEBAR --}}
        <aside class="sidebar">
            <div class="sidebar-greeting">
                <div class="greeting">Halo, {{ auth()->user()->name ?? 'Azka'}}! 👋</div>
                <div class="sub">Bagaimana kabarmu?</div>
            </div>

            <nav class="sidebar-nav">

                <a href=" {{ route('admin.profile') }} "
                    class="sidebar-link {{ request()->routeIs('admin.profile') ? 'active' : '' }}">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2" />
                        <circle cx="12" cy="7" r="4" />
                    </svg>
                    Profil Admin
                </a>


                <a href=" {{ route('admin.orders') }} "
                    class="sidebar-link {{ request()->routeIs('admin.orders') ? 'active' : '' }}">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z" />
                        <line x1="3" y1="6" x2="21" y2="6" />
                    </svg>
                    Kelola Pesanan
                </a>


                <a href=" {{ route('admin.statistic') }} "
                    class="sidebar-link {{ request()->routeIs('admin.statistic') ? 'active' : '' }}">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <line x1="18" y1="20" x2="18" y2="10" />
                        <line x1="12" y1="20" x2="12" y2="4" />
                        <line x1="6" y1="20" x2="6" y2="14" />
                    </svg>
                    Statistik
                </a>
            </nav>

            <div class="sidebar-bottom">
                <form method="POST" action="{{ route('logout') }}" style="margin:0;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="sidebar-link red">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4" />
                            <polyline points="16,17 21,12 16,7" />
                            <line x1="21" y1="12" x2="9" y2="12" />
                        </svg>
                        Keluar
                    </button>
                </form>
            </div>
        </aside>

        {{-- MAIN CONTENT AREA --}}
        <div class="admin-content">
            @if(session('success'))
            <div style="background:#c6f6d5;color:#276749;padding:12px 16px;border-radius:8px;margin-bottom:20px;font-size:13px;font-weight:600;">
                ✓ {{ session('success') }}
            </div>
            @endif
            @if(session('error'))
            <div style="background:#fed7d7;color:#c53030;padding:12px 16px;border-radius:8px;margin-bottom:20px;font-size:13px;font-weight:600;">
                {{ session('error') }}
            </div>
            @endif

            @yield('content')
        </div>
    </div>

    {{-- FOOTER --}}
    <footer>
        <div class="sosmed">
            <img src="{{ asset('assets/linkedin.png') }}" alt="LinkedIn" />
            <img src="{{ asset('assets/facebook.png') }}" alt="Facebook" />
            <img src="{{ asset('assets/instagram.png') }}" alt="Instagram" />
            <img src="{{ asset('assets/youtube.png') }}" alt="YouTube" />
        </div>
        <p>© 2026 Aneka Vandel. All rights reserved</p>
    </footer>

    @stack('scripts')
</body>

</html>