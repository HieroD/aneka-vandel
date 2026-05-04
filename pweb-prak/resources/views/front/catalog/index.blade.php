<x-layout title="Catalog - Aneka Vandel">
    <!-- MAIN -->
    <main class="font-outfit text-gray-800 m-0 bg-white flex flex-col grow">
        <section style="background-image: url('{{ asset('assets/catalog-background.png') }}');"
         class="px-[10%] py-12.5 bg-cover h-auto w-full flex flex-col items-center justify-center grow">
            
            <h2 class="text-4xl text-center mb-8 font-bold">Our Collection</h2>
            
             {{-- Pagination --}}
            <div class="w-full md:w-1/2 lg:w-5/12 h-7 mb-7.5 flex items-center justify-around gap-2">
                <button class="text-[14px] cursor-pointer text-primary font-bold border border-primary rounded-full bg-white w-1/5 h-full transition duration-200 hover:text-white hover:bg-primary">All</button>
                <button class="text-[14px] cursor-pointer text-primary font-bold border border-primary rounded-full bg-white w-1/5 h-full transition duration-200 hover:text-white hover:bg-primary">Vandel</button>
                <button class="text-[14px] cursor-pointer text-primary font-bold border border-primary rounded-full bg-white w-1/5 h-full transition duration-200 hover:text-white hover:bg-primary">Prasasti</button>
                <button class="text-[14px] cursor-pointer text-primary font-bold border border-primary rounded-full bg-white w-1/5 h-full transition duration-200 hover:text-white hover:bg-primary">Kijangan</button>
            </div>

            {{-- Search --}}
            <div class="mb-12.5 w-full flex flex-wrap gap-4 items-center justify-between text-base">
                <form action="" id="search-bar" method="GET">
                    <input type="text" name="search-text" id="search-text" placeholder="Search..." 
                        class="px-2.5 h-8 w-auto text-base rounded-md border border-primary outline-none focus:ring-1 focus:ring-primary">
                </form>
                <span class="text-primary-hover font-medium">Menampilkan {{ count($products) }} Produk</span>
            </div>
            
            <div class="w-full flex flex-wrap gap-5 mb-10">
                @forelse ($products as $product)
                    <x-product-card :product="$product" />
                @empty
                    <div class="w-full text-center py-10">
                        <p class="text-gray-500 text-lg">Belum ada produk yang tersedia.</p>
                    </div>
                @endforelse
                
                {{-- Placeholder --}}
                {{-- <!-- Card 1 -->
                <div class="p-5 rounded-xl bg-white flex flex-col items-center shadow-lg transition duration-100 hover:-translate-y-1.5 hover:shadow-2xl hover:cursor-pointer w-[calc((100%-60px)/4)]">
                    <img src="{{ asset('assets/vandel-produk.png') }}" alt="vandel" class="h-64 w-full object-cover rounded-md mb-4">
                    <h3 class="mb-0 text-lg text-gray-800 font-semibold">Vandel</h3>
                    <p class="mb-0 w-full h-24 text-gray-500 text-sm text-left">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Beatae qui velit veritatis quae ipsa incidunt veniam delectus mollitia</p>
                    <p class="m-0 mr-auto text-gray-800 text-lg font-medium">Rp. 20.000 / Pcs</p>
                    <button class="mt-5 h-10 w-full text-lg rounded-lg cursor-pointer text-white font-normal bg-primary transition-colors hover:bg-primary-hover">Pesan Sekarang</button>
                </div>

                <!-- Card 2 -->
                <div class="p-5 rounded-xl bg-white flex flex-col items-center shadow-lg transition duration-100 hover:-translate-y-1.5 hover:shadow-2xl hover:cursor-pointer w-[calc((100%-60px)/4)]">
                    <img src="{{ asset('assets/kijangan-produk.png') }}" alt="kijangan" class="h-64 w-full object-cover rounded-md mb-4">
                    <h3 class="mb-0 text-lg text-gray-800 font-semibold">Kijangan</h3>
                    <p class="mb-0 w-full h-24 text-gray-500 text-sm text-left">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, voluptas. Enim, labore rerum. </p>
                    <p class="m-0 mr-auto text-gray-800 text-lg font-medium">Rp. 150.000 / Pcs</p>
                    <button class="mt-5 h-10 w-full text-lg rounded-lg cursor-pointer text-white font-normal bg-primary transition-colors hover:bg-primary-hover">Pesan Sekarang</button>
                </div>

                <!-- Card 3 -->
                <div class="p-5 rounded-xl bg-white flex flex-col items-center shadow-lg transition duration-100 hover:-translate-y-1.5 hover:shadow-2xl hover:cursor-pointer w-[calc((100%-60px)/4)]">
                    <img src="{{ asset('assets/batu-produk.png') }}" alt="batu" class="h-64 w-full object-cover rounded-md mb-4">
                    <h3 class="mb-0 text-lg text-gray-800 font-semibold">Balok</h3>
                    <p class="mb-0 w-full h-24 text-gray-500 text-sm text-left">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus molestias </p>
                    <p class="m-0 mr-auto text-gray-800 text-lg font-medium">Rp. 15.000 / Pcs</p>
                    <button class="mt-5 h-10 w-full text-lg rounded-lg cursor-pointer text-white font-normal bg-primary transition-colors hover:bg-primary-hover">Pesan Sekarang</button>
                </div>

                <!-- Card 4 -->
                <div class="p-5 rounded-xl bg-white flex flex-col items-center shadow-lg transition duration-100 hover:-translate-y-1.5 hover:shadow-2xl hover:cursor-pointer w-[calc((100%-60px)/4)]">
                    <img src="{{ asset('assets/kijangan-produk.png') }}" alt="kijangan" class="h-64 w-full object-cover rounded-md mb-4">
                    <h3 class="mb-0 text-lg text-gray-800 font-semibold">Kijangan</h3>
                    <p class="mb-0 w-full h-24 text-gray-500 text-sm text-left">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, voluptas. Enim</p>
                    <p class="m-0 mr-auto text-gray-800 text-lg font-medium">Rp. 150.000 / Pcs</p>
                    <button class="mt-5 h-10 w-full text-lg rounded-lg cursor-pointer text-white font-normal bg-primary transition-colors hover:bg-primary-hover">Pesan Sekarang</button>
                </div>

                <!-- Card 5 -->
                <div class="p-5 rounded-xl bg-white flex flex-col items-center shadow-lg transition duration-100 hover:-translate-y-1.5 hover:shadow-2xl hover:cursor-pointer w-[calc((100%-60px)/4)]">
                    <img src="{{ asset('assets/vandel-produk.png') }}" alt="vandel" class="h-64 w-full object-cover rounded-md mb-4">
                    <h3 class="mb-0 text-lg text-gray-800 font-semibold">Vandel</h3>
                    <p class="mb-0 w-full h-24 text-gray-500 text-sm text-left">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Beatae qui velit veritatis quae ipsa incidunt veniam delectus mollitia</p>
                    <p class="m-0 mr-auto text-gray-800 text-lg font-medium">Rp. 20.000 / Pcs</p>
                    <button class="mt-5 h-10 w-full text-lg rounded-lg cursor-pointer text-white font-normal bg-primary transition-colors hover:bg-primary-hover">Pesan Sekarang</button>
                </div> --}}
            </div>
        </section>
    </main>
</x-layout>