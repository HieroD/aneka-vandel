<!doctype html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sign Up — Vandel</title>

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

  <!-- SAMA PERSIS DENGAN LOGIN -->
  <div class="bg-[#163070] border border-dashed border-white/25 rounded-2xl p-10 w-full max-w-sm animate-[fadeUp_.45s_ease]">

    <!-- Logo -->
    <div class="text-center mb-3">
      <img src="{{ asset('assets/logo-vandel.png') }}"
        class="w-[72px] h-[72px] mx-auto rounded-full object-contain bg-white border border-white/20">
    </div>

    <h1 class="text-white text-2xl font-bold text-center mb-7">Sign up</h1>

    <!-- FORM -->
    <form action="{{ route('register.store') }}" method="POST">
      @csrf

      <!-- NAME -->
      <div class="grid grid-cols-2 gap-3 mb-4">
        <div>
          <label class="block text-white/80 text-[11px] font-semibold uppercase tracking-wider mb-2">First Name</label>
          <input type="text" name="first_name" value="{{ old('first_name') }}"
            placeholder="First name"
            class="w-full px-4 py-3 rounded-lg bg-white/90 text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-white/30 {{ $errors->has('first_name') ? 'border border-red-400' : '' }}">
          @error('first_name')
          <div class="text-red-300 text-[11px] mt-1">{{ $message }}</div>
          @enderror
        </div>

        <div>
          <label class="block text-white/80 text-[11px] font-semibold uppercase tracking-wider mb-2">Last Name</label>
          <input type="text" name="last_name" value="{{ old('last_name') }}"
            placeholder="Last name"
            class="w-full px-4 py-3 rounded-lg bg-white/90 text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-white/30 {{ $errors->has('last_name') ? 'border border-red-400' : '' }}">
          @error('last_name')
          <div class="text-red-300 text-[11px] mt-1">{{ $message }}</div>
          @enderror
        </div>
      </div>

      <!-- EMAIL -->
      <div class="mb-4">
        <label class="block text-white/80 text-[11px] font-semibold uppercase tracking-wider mb-2">Email</label>
        <input type="email" name="email" value="{{ old('email') }}"
          placeholder="Enter your email"
          class="w-full px-4 py-3 rounded-lg bg-white/90 text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-white/30 {{ $errors->has('email') ? 'border border-red-400' : '' }}">
        @error('email')
        <div class="text-red-300 text-[11px] mt-1">{{ $message }}</div>
        @enderror
      </div>

      <!-- PASSWORD -->
      <div class="mb-4">
        <label class="block text-white/80 text-[11px] font-semibold uppercase tracking-wider mb-2">Password</label>
        <div class="relative">
          <input type="password" id="password" name="password"
            placeholder="Create password"
            class="w-full px-4 py-3 pr-10 rounded-lg bg-white/90 text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-white/30 {{ $errors->has('password') ? 'border border-red-400' : '' }}">
          <button type="button" onclick="togglePass('password', this)"
            class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500">
            <svg viewBox="0 0 24 24" class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
              <circle cx="12" cy="12" r="3" />
            </svg>
          </button>
        </div>
        @error('password')
        <div class="text-red-300 text-[11px] mt-1">{{ $message }}</div>
        @enderror
      </div>

      <!-- CONFIRM -->
      <div class="mb-5">
        <label class="block text-white/80 text-[11px] font-semibold uppercase tracking-wider mb-2">Confirm Password</label>
        <div class="relative">
          <input type="password" id="password_confirmation" name="password_confirmation"
            placeholder="Confirm your password"
            class="w-full px-4 py-3 pr-10 rounded-lg bg-white/90 text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-white/30">
          <button type="button" onclick="togglePass('password_confirmation', this)"
            class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500">
            <svg viewBox="0 0 24 24" class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
              <circle cx="12" cy="12" r="3" />
            </svg>
          </button>
        </div>
      </div>

      <!-- BUTTON SAMA -->
      <button type="submit"
        class="w-full py-3 bg-gray-900 hover:bg-black text-white font-bold text-sm tracking-widest uppercase rounded-lg transition transform hover:-translate-y-1 shadow-lg">
        Register
      </button>

    </form>

    <!-- DIVIDER SAMA LOGIN -->
    <div class="flex items-center my-5 text-white/50 text-xs uppercase tracking-wider">
      <div class="flex-1 h-px bg-white/20"></div>
      <span class="px-3">or continue with</span>
      <div class="flex-1 h-px bg-white/20"></div>
    </div>

    <!-- GOOGLE BUTTON (DITAMBAH BIAR CONSISTENT) -->
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

    <!-- FOOTER SAMA -->
    <div class="text-center mt-6 text-white/60 text-sm">
      Already have an account?
      <a href="{{ route('login') }}" class="text-white font-semibold hover:underline">Sign in</a>
    </div>

    <div class="flex justify-center gap-6 mt-4 pt-4 border-t border-white/10 text-xs text-white/50">
      <a href="{{ route('about') }}" class="hover:text-white">About</a>
      <a href="{{ route('catalog.index', ['category' => 'all']) }}" class="hover:text-white">Catalog</a>
    </div>

  </div>

  <script>
    function togglePass(id) {
      const inp = document.getElementById(id);
      inp.type = inp.type === "text" ? "password" : "text";
    }
  </script>

</body>

</html>