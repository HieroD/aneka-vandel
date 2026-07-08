@props(['title'])

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title }} - Aneka Vandel Admin</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
</head>

<body class="font-outfit bg-surface-2 flex flex-col min-h-screen">

    {{-- NAVBAR --}}
    <header class="bg-white border-b border-border sticky top-0 z-[100]">
        <nav class="flex items-center justify-between px-8 h-16">

            <a href="{{ route('home') }}" class="flex items-center gap-2.5">
                <img src="{{ asset('assets/logo-vandel.png') }}"
                    class="w-10 h-10 rounded-full">
                <span class="text-base font-bold text-text">Aneka Vandel</span>
            </a>

            <div class="flex items-center gap-6">
                <a href="{{ route('about') }}" class="text-text-muted text-sm font-medium hover:text-text">About</a>
                <a href="{{ route('catalog.index', ['category' => 'all']) }}" class="text-text-muted text-sm font-medium hover:text-text">Catalog</a>

                <form method="POST" action="{{ route('logout') }}" class="m-0">
                    @csrf
                    @method('DELETE')
                    <x-button variant="danger" size="sm" class="gap-1.5 cursor-pointer">
                        <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                            <path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4" />
                            <polyline points="16,17 21,12 16,7" />
                            <line x1="21" y1="12" x2="9" y2="12" />
                        </svg>
                        Log Out
                    </x-button>
                </form>
            </div>

        </nav>
    </header>

    <div class="flex flex-1">

        {{-- SIDEBAR --}}
        <x-admin-sidebar />

        {{-- CONTENT --}}
        <main class="flex-1 px-10 py-8 max-w-[calc(100%-200px)]">

            <x-flash-messages />

            {{ $slot }}

        </main>

    </div>

    {{-- FOOTER --}}
    <footer class="bg-text text-white px-8 py-5 flex items-center justify-between">

        <div class="flex gap-3">
            <img src="{{ asset('assets/linkedin.png') }}" class="w-7 h-7 brightness-0 invert opacity-80">
            <img src="{{ asset('assets/facebook.png') }}" class="w-7 h-7 brightness-0 invert opacity-80">
            <img src="{{ asset('assets/instagram.png') }}" class="w-7 h-7 brightness-0 invert opacity-80">
            <svg class="w-7 h-7 brightness-0 invert opacity-80" viewBox="0 0 24 24" fill="currentColor"><path d="M23.5 6.2a3.1 3.1 0 00-2.2-2.2C19.5 3.5 12 3.5 12 3.5s-7.5 0-9.3.5A3.1 3.1 0 00.5 6.2 33 33 0 000 12a33 33 0 00.5 5.8 3.1 3.1 0 002.2 2.2c1.8.5 9.3.5 9.3.5s7.5 0 9.3-.5a3.1 3.1 0 002.2-2.2 33 33 0 00.5-5.8 33 33 0 00-.5-5.8zM9.6 15.5V8.5l6.2 3.5z"/></svg>
        </div>

        <p class="text-xs opacity-70">© 2026 Aneka Vandel. All rights reserved</p>

    </footer>

    @stack('scripts')

    @once
    <script>
        // data-search-debounce: debounce text input + auto-submit a target form
        let _searchTimer;
        document.querySelectorAll('[data-search-debounce]').forEach(function (input) {
            input.addEventListener('input', function () {
                clearTimeout(_searchTimer);
                _searchTimer = setTimeout(function () {
                    var form = document.getElementById(input.dataset.formId);
                    if (form) form.submit();
                }, 500);
            });
        });

        // data-status-toggle: open/close a status dropdown
        // data-status-update: submit a hidden status form
        document.addEventListener('click', function (e) {
            var toggle = e.target.closest('[data-status-toggle]');
            if (toggle) {
                e.stopPropagation();
                var targetId = toggle.dataset.statusToggle;
                document.querySelectorAll('[id^="statusDd-"]').forEach(function (el) {
                    if (el.id !== targetId) el.classList.add('hidden');
                });
                var target = document.getElementById(targetId);
                if (target) target.classList.toggle('hidden');
                return;
            }

            var update = e.target.closest('[data-status-update]');
            if (update) {
                var orderId = update.dataset.orderId;
                var status = update.dataset.statusUpdate;
                var form = document.getElementById('statusForm');
                if (form && orderId && status) {
                    var routeTemplate = '{{ route('order.update', ':id') }}';
                    form.action = routeTemplate.replace(':id', orderId);
                    document.getElementById('statusInput').value = status;
                    form.submit();
                }
                return;
            }

            // click outside: close all dropdowns
            document.querySelectorAll('[id^="statusDd-"]').forEach(function (el) {
                el.classList.add('hidden');
            });
        });
    </script>
    @endonce
</body>

</html>
