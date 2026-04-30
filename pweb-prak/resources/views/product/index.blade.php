<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalog</title>
    <link rel="stylesheet" href="{{ asset('css/catalog.css') }}" />
</head>
<body>

    <!-- HEADER -->
    <header>
        <nav>
            <div id="logo">
                <a href="index.html"><img src="{{ asset('assets/logo-vandel.png') }}" alt="logo"></a>
                <span>Aneka Vandel</span>
            </div>
            <div id="navbar">
                <a href="/about" class="text-[#424242] p-2.5 ml-5 no-underline text-[18px] hover:text-primary transition-colors">About</a>
                <a href="{{ route('catalog.index', ['kategori' => 'all']) }}" class="text-[#424242] p-2.5 ml-5 no-underline text-[18px] hover:text-primary transition-colors">Catalog</a>
                <a href="{{ route('user-profile') }}" class="text-[#424242] p-2.5 ml-5 no-underline text-[18px] hover:text-primary transition-colors">Dashboard</a>
                <a href="{{ route('admin-profile') }}" class="text-[#424242] p-2.5 ml-5 no-underline text-[18px] hover:text-primary transition-colors">Admin</a>
                <a href="/login"><button class="py-2 px-6.25 ml-3.75 rounded-full border-none cursor-pointer text-white font-normal text-[16px] bg-primary hover:bg-primary-hover transition-colors">Sign in</button></a>
            </div>
    </header>


    <!-- MAIN -->
    <main>
        <section class="catalog">
            <h2>Our Collection</h2>
            <div class="pagination">
                <button>All</button>
                <button>Vandel</button>
                <button>Prasasti</button>
                <button>Kijangan</button>
            </div>
            <div class="search">
                <form action="" id="search-bar" method="GET">
                    <input type="text" name="search-text" id="search-text" placeholder="Search...">
                </form>
                <span>Menampilkan 5 Produk</span>
            </div>
            <div class="container">
                <div class="card">
                    <img src="{{ asset('assets/vandel-produk.png') }}" alt="vandel">
                    <h3>Vandel</h3>
                    <p class="desc">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Beatae qui velit veritatis quae ipsa incidunt veniam delectus mollitia</p>
                    <p class="price">Rp. 20.000 / Pcs</p>
                    <button>Pesan Sekarang</button>
                </div>
                <div class="card">
                    <img src="{{ asset('assets/kijangan-produk.png') }}" alt="kijangan">
                    <h3>Kijangan</h3>
                    <p class="desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, voluptas. Enim, labore rerum. </p>
                    <p class="price">Rp. 150.000 / Pcs</p>
                    <button>Pesan Sekarang</button>
                </div>
                <div class="card">
                    <img src="{{ asset('assets/batu-produk.png') }}" alt="batu">
                    <h3>Balok</h3>
                    <p class="desc">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus molestias </p>
                    <p class="price">Rp. 15.000 / Pcs</p>
                    <button>Pesan Sekarang</button>
                </div>
                <div class="card">
                    <img src="{{ asset('assets/kijangan-produk.png') }}" alt="kijangan">
                    <h3>Kijangan</h3>
                    <p class="desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, voluptas. Enim</p>
                    <p class="price">Rp. 150.000 / Pcs</p>
                    <button>Pesan Sekarang</button>
                </div>
                <div class="card">
                    <img src="{{ asset('assets/vandel-produk.png') }}" alt="vandel">
                    <h3>Vandel</h3>
                    <p class="desc">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Beatae qui velit veritatis quae ipsa incidunt veniam delectus mollitia</p>
                    <p class="price">Rp. 20.000 / Pcs</p>
                    <button>Pesan Sekarang</button>
                </div>
            </div>
        </section>
    </main>


    <!-- FOOTER -->
     <footer>
        <div class="sosmed">
            <img src="./assets/linkedin.png" alt="LinkedIn"></img>
            <img src="./assets/facebook.png" alt="Facebook"></img>
            <img src="./assets/whatsapp.png" alt="Whatsapp"></img>
            <img src="./assets/instagram.png" alt="Instagram"></img>
        </div>
        <p>© 2026 Aneka Vandel. All rights reserved</p>
     </footer>
</body>