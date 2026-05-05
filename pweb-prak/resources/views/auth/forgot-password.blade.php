<!doctype html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Forgot Password — Vandel</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />

    <style>
        body {
            font-family: "Poppins", sans-serif;
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body class="bg-[#0f2d6b] min-h-screen flex items-center justify-center p-5">

    <div class="bg-[#163070] border border-dashed border-white/25 rounded-2xl p-10 w-full max-w-sm animate-[fadeUp_.45s_ease]">

        <!-- Logo -->
        <div class="text-center mb-3">
            <img src="{{ asset('assets/logo-vandel.png') }}"
                class="w-[72px] h-[72px] mx-auto rounded-full object-contain bg-white border border-white/20">
        </div>

        <h1 class="text-white text-2xl font-bold text-center mb-7">Forgot Password</h1>

        <!-- FLASH -->
        @if (session('status'))
        <div class="bg-green-500/15 border border-green-500/30 text-green-300 text-xs px-4 py-2 rounded-lg mb-4">
            {{ session('status') }}
        </div>
        @endif

        @if (session('error'))
        <div class="bg-red-500/15 border border-red-500/30 text-red-300 text-xs px-4 py-2 rounded-lg mb-4">
            {{ session('error') }}
        </div>
        @endif

        <!-- FORM -->
        <form action="{{ route('password.email') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block text-white/80 text-[11px] font-semibold uppercase tracking-wider mb-2">
                    Email
                </label>

                <input type="email" name="email" value="{{ old('email') }}"
                    placeholder="Enter your email"
                    class="w-full px-4 py-3 rounded-lg bg-white/90 text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-white/30 {{ $errors->has('email') ? 'border border-red-400' : '' }}">

                @error('email')
                <div class="text-red-300 text-[11px] mt-1">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit"
                class="w-full py-3 bg-gray-900 hover:bg-black text-white font-bold text-sm tracking-widest uppercase rounded-lg transition transform hover:-translate-y-1 shadow-lg">
                Send Reset Link
            </button>

        </form>

        <!-- Divider -->
        <div class="flex items-center my-5 text-white/50 text-xs uppercase tracking-wider">
            <div class="flex-1 h-px bg-white/20"></div>
            <span class="px-3">or continue with</span>
            <div class="flex-1 h-px bg-white/20"></div>
        </div>

        <!-- Google -->
        <button onclick="window.location.href='{{ route('home') }}'"
            class="w-full flex items-center justify-center gap-2 py-3 bg-gray-900 hover:bg-black text-white text-sm font-semibold tracking-wide uppercase rounded-lg transition transform hover:-translate-y-1 shadow-lg">

            <svg class="w-5 h-5" viewBox="0 0 48 48">
                <path fill="#EA4335" d="M24 9.5c3.54 0 6.36 1.22 8.36 3.22l6.22-6.22C34.68 2.42 29.76 0 24 0 14.82 0 6.73 5.48 2.69 13.44l7.27 5.64C11.9 12.36 17.4 9.5 24 9.5z" />
                <path fill="#4285F4" d="M46.1 24.5c0-1.6-.14-3.14-.4-4.63H24v9.26h12.46c-.54 2.9-2.18 5.36-4.64 7.02l7.27 5.64C43.96 37.1 46.1 31.36 46.1 24.5z" />
                <path fill="#FBBC05" d="M9.96 28.09A14.5 14.5 0 0 1 9.5 24c0-1.42.25-2.79.7-4.09l-7.27-5.64A23.94 23.94 0 0 0 0 24c0 3.85.92 7.49 2.53 10.73l7.43-6.64z" />
                <path fill="#34A853" d="M24 48c6.48 0 11.92-2.14 15.9-5.82l-7.27-5.64c-2.02 1.36-4.6 2.16-8.63 2.16-6.6 0-12.1-2.86-14.04-9.58l-7.43 6.64C6.73 42.52 14.82 48 24 48z" />
            </svg>

            Google
        </button>

        <!-- Footer -->
        <div class="text-center mt-6 text-white/60 text-sm">
            Remember your password?
            <a href="{{ route('login') }}" class="text-white font-semibold hover:underline">Sign in</a>
        </div>

        <div class="flex justify-center gap-6 mt-4 pt-4 border-t border-white/10 text-xs text-white/50">
            <a href="{{ route('about') }}" class="hover:text-white">About</a>
            <a href="{{ route('catalog.index', ['category' => 'all']) }}" class="hover:text-white">Catalog</a>
        </div>

    </div>

</body>

</html>