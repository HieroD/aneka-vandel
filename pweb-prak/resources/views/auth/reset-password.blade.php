<x-auth-layout title="Reset Password">

    <div class="text-center mb-3">
        <img src="{{ asset('assets/logo-vandel.png') }}"
            class="w-[72px] h-[72px] mx-auto rounded-full object-contain bg-white border border-white/20"
            alt="Logo">
    </div>

    <h1 class="text-white text-2xl font-bold text-center mb-2">New Password</h1>
    <p class="text-white/60 text-[13px] text-center mb-7">Please enter your new password below.</p>

    <form action="{{ route('password.update') }}" method="POST">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">
        <input type="hidden" name="email" value="{{ old('email', request()->query('email')) }}">

        <div class="mb-4">
            <x-input name="password" type="password" label="New Password" placeholder="Create new password" required minlength="8" autocomplete="new-password" />
        </div>

        <div class="mb-6">
            <x-input name="password_confirmation" type="password" label="Confirm Password" placeholder="Repeat new password" required minlength="8" autocomplete="new-password" />
        </div>

        <button type="submit"
            class="w-full py-3 bg-gray-900 hover:bg-black text-white font-bold text-sm tracking-widest uppercase rounded-lg transition transform hover:-translate-y-1 shadow-lg cursor-pointer">
            Reset Password
        </button>
    </form>

    <div class="flex items-center my-5 text-white/50 text-xs uppercase tracking-wider">
        <div class="flex-1 h-px bg-white/20"></div>
        <span class="px-3">Back to safety</span>
        <div class="flex-1 h-px bg-white/20"></div>
    </div>

    <div class="text-center text-white/60 text-sm">
        Suddenly remembered?
        <a href="{{ route('login') }}" class="text-white font-semibold hover:underline">Sign in</a>
    </div>

    <div class="flex justify-center gap-6 mt-6 pt-4 border-t border-white/10 text-xs text-white/50">
        <a href="{{ route('about') }}" class="hover:text-white">About</a>
        <a href="{{ route('catalog.index', ['category' => 'all']) }}" class="hover:text-white">Catalog</a>
    </div>

</x-auth-layout>
