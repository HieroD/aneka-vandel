<x-layout title="Home - Aneka Vandel">

    <main>
        <section
        style="background-image: linear-gradient(rgba(0, 0, 0, 0.65), rgba(0, 0, 0, 0.85)), url('{{ asset('assets/vandelmarmer.png') }}');"
        class="bg-blend-multiply bg-no-repeat bg-cover bg-center min-h-157.5 flex flex-col justify-center items-center text-center px-[10%]">
            <div id="hero-text" class="-mt-7.5">
                <h1 id="hero-title" class="m-1.25 text-white text-[65px] font-bold leading-[1.2] mb-3.75">Vandel & Plakat <br>Berkualitas Tinggi</h1>
                <p id="hero-desc" class="m-1.25 text-white text-[18px] font-light mb-7.5">Solusi terbaik untuk penghargaan, kenang-kenangan, dan kebutuhan anda</p>
            </div>
            <a href="#pesan">
                <button class="cursor-pointer py-3 px-7.5 rounded-[30px] border-none bg-primary text-[16px] text-white transition duration-300 hover:bg-primary-hover">Pesan Sekarang</button>
            </a>
        </section>

        <section
        style="background-image: url('{{ asset('assets/catalog-background.png') }}');"
        class="pt-[2%] pb-[5%] min-h-250 flex flex-col items-center justify-center px-[10%]">
            <h2 class="text-[60px] font-bold text-center mb-5">Our Collection</h2>

            <div class="w-full md:w-1/2 lg:w-5/12 h-7 mb-10 flex items-center justify-around gap-2">
                <button class="text-[14px] cursor-pointer text-white font-bold border border-primary rounded-full bg-primary w-1/5 h-full transition duration-200 hover:bg-primary-hover">All</button>
                <button class="text-[14px] cursor-pointer text-primary font-bold border border-primary rounded-full bg-white w-1/5 h-full transition duration-200 hover:text-white hover:bg-primary">Vandel</button>
                <button class="text-[14px] cursor-pointer text-primary font-bold border border-primary rounded-full bg-white w-1/5 h-full transition duration-200 hover:text-white hover:bg-primary">Prasasti</button>
                <button class="text-[14px] cursor-pointer text-primary font-bold border border-primary rounded-full bg-white w-1/5 h-full transition duration-200 hover:text-white hover:bg-primary">Kijangan</button>
            </div>

            <div class="w-full flex justify-center gap-7.5 flex-wrap mb-10">
                @if(isset($products) && $products->count() > 0)
                @foreach ($products as $product)
                    <div class="w-[30%] min-w-62.5">
                        <x-product-card :product="$product" />
                    </div>
                @endforeach
                @else
                <p class="text-text italic">Belum ada produk yang tersedia.</p>
                @endif
            </div>

            <a href="{{ route('catalog.index') }}" class="text-[16px] font-bold text-text transition duration-300 hover:text-primary">Cek selengkapnya...</a>
        </section>

        <section class="bg-white pt-[5%] pb-[7%] text-center px-[10%]">
            <h2 class="text-[40px] font-bold text-primary mb-12.5">Kenapa Memilih Kami?</h2>
            <div class="flex justify-center gap-17.5 flex-wrap">

                <div class="flex-1 min-w-62.5 max-w-75 flex flex-col items-center">
                    <div class="w-17.5 h-17.5 rounded-full bg-info-soft flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-info" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0z" />
                        </svg>
                    </div>
                    <h3 class="text-[22px] font-bold mb-3.75 text-info mt-0">Kualitas Terjamin</h3>
                    <p class="text-text-muted leading-[1.6] text-[15px]">Menggunakan bahan premium dan proses produksi yang teliti untuk hasil terbaik</p>
                </div>

                <div class="flex-1 min-w-62.5 max-w-75 flex flex-col items-center">
                    <div class="w-17.5 h-17.5 rounded-full bg-success-soft flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-success" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6l4 2m6-2a10 10 0 1 1-20 0 10 10 0 0 1 20 0z" />
                        </svg>
                    </div>
                    <h3 class="text-[22px] font-bold mb-3.75 text-success mt-0">Pengerjaan Cepat</h3>
                    <p class="text-text-muted leading-[1.6] text-[15px]">Kami berkomitmen menyelesaikan pesanan Anda tepat waktu tanpa mengurangi kualitas</p>
                </div>

                <div class="flex-1 min-w-62.5 max-w-75 flex flex-col items-center">
                    <div class="w-17.5 h-17.5 rounded-full bg-warning-soft flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-warning" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0z" />
                        </svg>
                    </div>
                    <h3 class="text-[22px] font-bold mb-3.75 text-warning">Harga Terjangkau</h3>
                    <p class="text-text-muted leading-[1.6] text-[15px]">Dapatkan produk berkualitas tinggi dengan harga yang kompetitif dan bersahabat</p>
                </div>

            </div>
        </section>

        <section class="bg-primary-soft pt-[5%] pb-[7%] text-center px-[10%]">
            <h2 class="text-[40px] font-bold text-primary mb-2.5">Hubungi Kami</h2>
            <p class="text-text-muted text-[18px] mb-12.5">Kami siap membantu anda membuat vandel dan plakat terbaik</p>
            <nav class="flex justify-center gap-7.5 flex-wrap p-0">

                <a href="#" class="no-underline flex-1 min-w-70 max-w-82.5 group">
                    <div class="bg-white rounded-[15px] py-10 px-7.5 h-full min-h-100 flex flex-col items-center justify-between shadow-card transition duration-300 group-hover:-translate-y-2.5 group-hover:shadow-card-hover border-[3px] border-info">
                        <div class="w-17.5 h-17.5 rounded-full bg-info-soft flex items-center justify-center -mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-9 h-9 text-info" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                            </svg>
                        </div>
                        <h3 class="mt-0 text-[24px] font-bold mb-2.5 text-info">Email</h3>
                        <p class="text-text-muted text-[14px] leading-normal mb-7.5">Kirim detail pesanan via email.</p>
                        <div class="w-full"><span class="block w-full py-3 rounded-[30px] text-white font-bold text-[16px] transition duration-300 bg-info group-hover:bg-info-hover">Kirim Email</span></div>
                    </div>
                </a>

                <a href="#" class="no-underline flex-1 min-w-70 max-w-82.5 group">
                    <div class="bg-white rounded-[15px] py-10 px-7.5 h-full min-h-100 flex flex-col items-center justify-between shadow-card transition duration-300 group-hover:-translate-y-2.5 group-hover:shadow-card-hover border-[3px] border-success">
                        <div class="w-17.5 h-17.5 rounded-full bg-success-soft flex items-center justify-center -mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-9 h-9 text-success" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20.52 3.48A11.94 11.94 0 0 0 12 0C5.37 0 0 5.37 0 12c0 2.11.55 4.16 1.6 5.97L0 24l6.22-1.57A11.94 11.94 0 0 0 12 24c6.63 0 12-5.37 12-12 0-3.2-1.25-6.22-3.48-8.52zM12 22a9.94 9.94 0 0 1-5.06-1.38l-.36-.21-3.69.93.99-3.59-.23-.37A9.94 9.94 0 0 1 2 12C2 6.48 6.48 2 12 2s10 4.48 10 10-4.48 10-10 10zm5.44-7.4c-.3-.15-1.76-.87-2.03-.97-.27-.1-.47-.15-.67.15s-.77.97-.94 1.17c-.17.2-.35.22-.65.07a8.16 8.16 0 0 1-2.4-1.48 9.04 9.04 0 0 1-1.66-2.07c-.17-.3-.02-.46.13-.6.13-.13.3-.35.45-.52.15-.17.2-.3.3-.5.1-.2.05-.37-.02-.52-.07-.15-.67-1.6-.91-2.2-.24-.57-.48-.5-.67-.5h-.57c-.2 0-.52.07-.79.37s-1.04 1.02-1.04 2.48 1.07 2.88 1.22 3.08c.15.2 2.1 3.2 5.08 4.49.71.31 1.27.5 1.7.63.72.23 1.37.2 1.88.12.57-.09 1.76-.72 2.01-1.41.25-.69.25-1.28.17-1.41-.07-.13-.27-.2-.57-.35z" />
                            </svg>
                        </div>
                        <h3 class="mt-0 text-[24px] font-bold mb-2.5 text-text">WhatsApp</h3>
                        <p class="text-text-muted text-[14px] leading-normal mb-7.5">Chat langsung dengan kami untuk respon yang cepat.</p>
                        <div class="w-full"><span class="block w-full py-3 rounded-[30px] text-white font-bold text-[16px] transition duration-300 bg-success group-hover:bg-success-hover">Chat Sekarang</span></div>
                    </div>
                </a>

                <a href="#" class="no-underline flex-1 min-w-70 max-w-82.5 group">
                    <div class="bg-white rounded-[15px] py-10 px-7.5 h-full min-h-100 flex flex-col items-center justify-between shadow-card transition duration-300 group-hover:-translate-y-2.5 group-hover:shadow-card-hover border-[3px] border-warning">
                        <div class="w-17.5 h-17.5 rounded-full bg-warning-soft flex items-center justify-center -mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-9 h-9 text-warning" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25z" />
                            </svg>
                        </div>
                        <h3 class="mt-0 text-[24px] font-bold mb-2.5 text-text">Telepon</h3>
                        <p class="text-text-muted text-[14px] leading-normal mb-7.5">Hubungi kami di jam kerja (08.00 - 16.00).</p>
                        <div class="w-full"><span class="block w-full py-3 rounded-[30px] text-white font-bold text-[16px] transition duration-300 bg-warning group-hover:bg-warning-hover">Telepon Kami</span></div>
                    </div>
                </a>

            </nav>
        </section>
    </main>

</x-layout>
