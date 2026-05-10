<!doctype html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Reset Password — Vandel</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap"
        rel="stylesheet" />

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
            <img
                src="{{ asset('assets/logo-vandel.png') }}"
                class="size-[72px] mx-auto rounded-full object-contain bg-white border border-white/20"
                alt="Logo">
        </div>

        <!-- Heading -->
        <h1 class="text-white text-2xl font-bold text-center mb-2">
            New Password
        </h1>

        <p class="text-white/60 text-[13px] text-center mb-7">
            Please enter your new password below.
        </p>


        <!-- Form -->
        <form action="{{ route('password.update') }}" method="POST">

            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <input
                type="hidden"
                name="email"
                value="{{ old('email', $email) }}">


            <!-- Password -->
            <div class="mb-4">

                <label class="block text-white/80 text-[11px] font-semibold uppercase tracking-wider mb-2">
                    New Password
                </label>

                <div class="relative">

                    <input
                        type="password"
                        id="password"
                        name="password"
                        required
                        minlength="8"
                        placeholder="Create new password"
                        class="w-full px-4 py-3 pr-10 rounded-lg bg-white/90 text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-white/30 {{ $errors->has('password') ? 'border border-red-400' : '' }}">

                    <button
                        type="button"
                        onclick="togglePass('password')"
                        aria-label="Toggle password visibility"
                        class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500">

                        <svg
                            viewBox="0 0 24 24"
                            class="w-4 h-4"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                            <circle cx="12" cy="12" r="3" />
                        </svg>

                    </button>

                </div>

                @error('password')
                <div class="text-red-300 text-[11px] mt-1">
                    {{ $message }}
                </div>
                @enderror

            </div>


            <!-- Confirm Password -->
            <div class="mb-6">

                <label class="block text-white/80 text-[11px] font-semibold uppercase tracking-wider mb-2">
                    Confirm Password
                </label>

                <div class="relative">

                    <input
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        required
                        minlength="8"
                        placeholder="Repeat new password"
                        class="w-full px-4 py-3 pr-10 rounded-lg bg-white/90 text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-white/30">

                    <button
                        type="button"
                        onclick="togglePass('password_confirmation')"
                        aria-label="Toggle password visibility"
                        class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500">

                        <svg
                            viewBox="0 0 24 24"
                            class="w-4 h-4"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                            <circle cx="12" cy="12" r="3" />
                        </svg>

                    </button>

                </div>

            </div>


            <!-- Submit -->
            <button
                type="submit"
                class="w-full py-3 bg-gray-900 hover:bg-black text-white font-bold text-sm tracking-widest uppercase rounded-lg transition transform hover:-translate-y-1 shadow-lg">
                Reset Password
            </button>

        </form>


        <!-- Divider -->
        <div class="flex items-center my-5 text-white/50 text-xs uppercase tracking-wider">

            <div class="flex-1 h-px bg-white/20"></div>

            <span class="px-3">
                Back to safety
            </span>

            <div class="flex-1 h-px bg-white/20"></div>

        </div>


        <!-- Login -->
        <div class="text-center text-white/60 text-sm">

            Suddenly remembered?

            <a
                href="{{ route('login') }}"
                class="text-white font-semibold hover:underline">
                Sign in
            </a>

        </div>


        <!-- Footer -->
        <div class="flex justify-center gap-6 mt-6 pt-4 border-t border-white/10 text-xs text-white/50">

            <a
                href="{{ route('about') }}"
                class="hover:text-white">
                About
            </a>

            <a
                href="{{ route('catalog.index', ['category' => 'all']) }}"
                class="hover:text-white">
                Catalog
            </a>

        </div>

    </div>


    <!-- Script -->
    <script>
        function togglePass(id) {

            const input = document.getElementById(id);

            if (input.type === "password") {
                input.type = "text";
            } else {
                input.type = "password";
            }
        }
    </script>

</body>

</html>