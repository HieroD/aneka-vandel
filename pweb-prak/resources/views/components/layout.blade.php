@props([
    'title'
])

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex flex-col min-h-screen m-0 bg-white text-[#333333] font-sans">

    <header class="bg-white mb-0 shadow-[0_2px_10px_rgba(0,0,0,0.05)] sticky top-0 z-10 px-[10%] font-outfit text-[#333333] font-bold">
        <nav class="font-semibold text-[20px] text-[#424242] py-2.5 flex justify-between items-center">
            <div id="logo" class="flex items-center">
                <a href="/" class="flex justify-center items-center">
                    <img src="{{ asset('assets/logo-vandel.png') }}" alt="logo" class="w-12.5 h-auto float-left">
                    <span class="text-[18px] ml-2.5 font-bold">Aneka Vandel</span>
                </a>
            </div>
            <div class="font-semibold" id="navbar">
                <a href="/about" class="text-[#424242] p-2.5 ml-5 no-underline text-[18px] hover:text-primary transition-colors">About</a>
                <a href="{{ route('catalog.index', ['kategori' => 'all']) }}" class="text-[#424242] p-2.5 ml-5 no-underline text-[18px] hover:text-primary transition-colors">Catalog</a>

                @if(auth()->user() && auth()->user()->role === 'admin')
                    <a href="{{ route('admin.profile') }}" class="text-[#424242] p-2.5 ml-5 no-underline text-[18px] hover:text-primary transition-colors">Admin</a>    
                @else
                    <a href="{{ route('user.profile') }}" class="text-[#424242] p-2.5 ml-5 no-underline text-[18px] hover:text-primary transition-colors">Dashboard</a>
                @endif    

                @guest
                    <a href=" {{ route('login') }}"><button class="py-2 px-6.25 ml-3.75 rounded-full border-none cursor-pointer text-white font-normal text-[16px] bg-primary hover:bg-primary-hover transition-colors">Sign in</button></a>    
                @endguest

                @auth()
                    <button form="logout" type="submit" class="py-2 px-6.25 ml-3.75 rounded-full border-none cursor-pointer text-white font-normal text-[16px] bg-red-700 hover:bg-red-800 transition-colors">Log out</button>
                    <form id="logout" action=" {{ route('logout') }} " method="POST">
                        @csrf
                        @method('DELETE')
                    </form>
                @endauth
            </div>
        </nav>
    </header>

    {{ $slot }}

    <footer class="bg-primary min-h-25 text-white flex justify-between items-center px-[10%]">
        <div class="flex gap-2.5">
            <img src="{{ asset('assets/linkedin.png') }}" alt="LinkedIn" class="w-7.5 h-7.5 object-fill cursor-pointer">
            <img src="{{ asset('assets/facebook.png') }}" alt="Facebook" class="w-7.5 h-7.5 object-fill cursor-pointer">
            <img src="{{ asset('assets/whatsapp.png') }}" alt="Whatsapp" class="w-7.5 h-7.5 object-fill cursor-pointer">
            <img src="{{ asset('assets/instagram.png') }}" alt="Instagram" class="w-7.5 h-7.5 object-fill cursor-pointer">
        </div>
        <p>© 2026 Aneka Vandel. All rights reserved</p>
    </footer>

</body>
</html>