<x-layout title="Home - Aneka Vandel">

    <main>
        <section class="bg-[linear-gradient(rgba(125,125,125,0.568),rgba(0,0,0,0.5)),url('/public/assets/vandelmarmer.png')] bg-[#555] bg-blend-multiply bg-no-repeat bg-cover bg-center min-h-157.5 flex flex-col justify-center items-center text-center px-[10%]">
            <div id="hero-text" class="-mt-7.5">
                <h1 id="hero-title" class="m-1.25 text-white text-[65px] font-bold leading-[1.2] mb-3.75">Vandel & Plakat <br>Berkualitas Tinggi</h1>
                <p id="hero-desc" class="m-1.25 text-white text-[18px] font-light mb-7.5">Solusi terbaik untuk penghargaan, kenang-kenangan, dan kebutuhan anda</p>
            </div>
            <a href="#pesan">
                <button class="cursor-pointer py-3 px-7.5 rounded-[30px] border-none bg-primary text-[16px] text-white transition duration-300 hover:bg-primary-hover">Pesan Sekarang</button>
            </a>
        </section>

        <section class="pt-[2%] pb-[5%] bg-[url('/public/assets/catalog-background.png')] min-h-250 flex flex-col items-center justify-center px-[10%]">
            <h2 class="text-[60px] font-bold text-center mb-5">Our Collection</h2>
            {{-- <div class="w-[45%] h-[4%] mb-7.5 flex items-center justify-around gap-2">
                <button class="cursor-pointer text-primary font-bold border border-primary rounded-[20px] bg-white w-1/5 py-1.5 h-full hover:text-white hover:bg-primary transition duration-300">All</button>
                <button class="cursor-pointer text-primary font-bold border border-primary rounded-[20px] bg-white w-1/5 py-1.5 h-full hover:text-white hover:bg-primary transition duration-300">Vandel</button>
                <button class="cursor-pointer text-primary font-bold border border-primary rounded-[20px] bg-white w-1/5 py-1.5 h-full hover:text-white hover:bg-primary transition duration-300">Prasasti</button>
                <button class="cursor-pointer text-primary font-bold border border-primary rounded-[20px] bg-white w-1/5 py-1.5 h-full hover:text-white hover:bg-primary transition duration-300">Kijangan</button>
            </div> --}}
            <div class="w-full flex justify-center gap-7.5 flex-wrap mb-10">
                <div class="p-5 w-[30%] min-w-62.5 rounded-[10px] bg-white flex flex-col items-center shadow-[0_10px_20px_rgba(0,0,0,0.05)] transition duration-100 hover:-translate-y-1.25 hover:shadow-[0_15px_30px_rgba(0,0,0,0.1)] cursor-pointer">
                    <img src="{{ asset('assets/vandel-produk.png') }}" alt="vandel" class="h-62.5 w-full object-cover rounded-[5px] mb-3.75 bg-[#eee]">
                    <h3 class="m-0 mb-1.5 text-[18px] font-bold text-[#333]">Vandel</h3>
                    <p class="m-0 mb-3.75 text-[#777] text-[14px] text-left">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Beatae qui velit veritatis quae ipsa incidunt veniam delectus mollitia, dolores rerum pariatur quia minus soluta tempora quibusdam magni laboriosam! Incidunt, eligendi.</p>
                    <p class="ml-0 mr-auto text-[#333] font-semibold text-[18px] transition duration-300 hover:underline">Rp 20.000 / Pcs</p>
                </div>
                <div class="p-5 w-[30%] min-w-62.5 rounded-[10px] bg-white flex flex-col items-center shadow-[0_10px_20px_rgba(0,0,0,0.05)] transition duration-100 hover:-translate-y-1.25 hover:shadow-[0_15px_30px_rgba(0,0,0,0.1)] cursor-pointer">
                    <img src="{{ asset('assets/kijangan-produk.png') }}" alt="kijangan" class="h-62.5 w-full object-cover rounded-[5px] mb-3.75 bg-[#eee]">
                    <h3 class="m-0 mb-1.5 text-[18px] font-bold text-[#333]">Kijangan</h3>
                    <p class="m-0 mb-3.75 text-[#777] text-[14px] text-left">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, voluptas. Enim, labore rerum. Ducimus ut blanditiis voluptatibus mollitia cupiditate dolorem veritatis, porro sit ullam, voluptas eos molestiae sequi sapiente perferendis?</p>
                    <p class="ml-0 mr-auto text-[#333] font-semibold text-[18px] transition duration-300 hover:underline">Rp 150.000 / Pcs</p>
                </div>
                <div class="p-5 w-[30%] min-w-62.5 rounded-[10px] bg-white flex flex-col items-center shadow-[0_10px_20px_rgba(0,0,0,0.05)] transition duration-100 hover:-translate-y-1.25 hover:shadow-[0_15px_30px_rgba(0,0,0,0.1)] cursor-pointer">
                    <img src="{{ asset('assets/batu-produk.png') }}" alt="batu" class="h-62.5 w-full object-cover rounded-[5px] mb-3.75 bg-[#eee]">
                    <h3 class="m-0 mb-1.5 text-[18px] font-bold text-[#333]">Balok</h3>
                    <p class="m-0 mb-3.75 text-[#777] text-[14px] text-left">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus molestias sed minus quam corrupti, perspiciatis aut nihil porro architecto facere. Quas dolorem provident impedit id magnam ea quos dolorum velit?</p>
                    <p class="ml-0 mr-auto text-[#333] font-semibold text-[18px] transition duration-300 hover:underline">Rp 15.000 / Pcs</p>
                </div>
            </div>
            <a href="/katalog" class="text-[16px] font-bold text-[#333] transition duration-300 hover:text-primary">Cek selengkapnya...</a>
        </section>

        <section class="bg-white pt-[5%] pb-[7%] text-center px-[10%]">
            <h2 class="text-[40px] font-bold text-primary mb-12.5">Kenapa Memilih Kami?</h2>
            <div class="flex justify-center gap-17.5 flex-wrap">
                <div class="flex-1 min-w-62.5 max-w-75 flex flex-col items-center">
                    <img src="{{ asset('assets/checklist.png') }}" alt="Centang" class="w-17.5 h-17.5 rounded-full bg-[#f0f5ff] object-cover">
                    <h3 class="text-[22px] font-bold mb-3.75 text-[#333] mt-4">Kualitas Terjamin</h3>
                    <p class="text-[#666] leading-[1.6] text-[15px]">Menggunakan bahan premium dan proses produksi yang teliti untuk hasil terbaik</p>
                </div>
                <div class="flex-1 min-w-62.5 max-w-75 flex flex-col items-center">
                    <img src="{{ asset('assets/time.png') }}" alt="Jam" class="w-17.5 h-17.5 rounded-full bg-[#f0f5ff] object-cover">
                    <h3 class="text-[22px] font-bold mb-3.75 text-[#333] mt-4">Pengerjaan Cepat</h3>
                    <p class="text-[#666] leading-[1.6] text-[15px]">Kami berkomitmen menyelesaikan pesanan Anda tepat waktu tanpa mengurangi kualitas</p>
                </div>
                <div class="flex-1 min-w-62.5 max-w-75 flex flex-col items-center">
                    <img src="{{ asset('assets/thumbs-up.png') }}" alt="Jempol" class="w-17.5 h-17.5 rounded-full bg-[#f0f5ff] object-cover">
                    <h3 class="text-[22px] font-bold mb-3.75 text-[#333] mt-4">Harga Terjangkau</h3>
                    <p class="text-[#666] leading-[1.6] text-[15px]">Dapatkan produk berkualitas tinggi dengan harga yang kompetitif dan bersahabat</p>
                </div>
            </div>  
        </section>

        <section class="bg-[#f0f5ff] pt-[5%] pb-[7%] text-center px-[10%]">
            <h2 class="text-[40px] font-bold text-primary mb-2.5">Hubungi Kami</h2>
            <p class="text-[#555] text-[18px] mb-12.5">Kami siap membantu anda membuat vandel dan plakat terbaik</p>
            <nav class="flex justify-center gap-7.5 flex-wrap p-0">
                <a href="#" class="no-underline flex-1 min-w-70 max-w-82.5 group">
                    <div class="bg-white rounded-[15px] py-10 px-7.5 h-full min-h-100 flex flex-col items-center justify-between shadow-[0_10px_25px_rgba(0,0,0,0.05)] transition duration-300 group-hover:-translate-y-2.5 group-hover:shadow-[0_15px_35px_rgba(0,0,0,0.1)] border-[3px] border-[#00c853]">
                        <img src="{{ asset('assets/whatsapp-why.png') }}" alt="whatsapp" class="w-27.5 h-27.5 -mb-5 rounded-full object-contain">
                        <h3 class="mt-0 text-[24px] font-bold mb-2.5 text-black">Whatsapp</h3>
                        <p class="text-[#666] text-[14px] leading-normal mb-7.5">Chat langsung dengan kami untuk respon yang cepat.</p>
                        <div class="w-full"><span class="block w-full py-3 rounded-[30px] text-white font-bold text-[16px] transition duration-300 bg-[#00c853] group-hover:bg-[#00a042]">Telepon Kami</span></div>
                    </div>
                </a>
                <a href="#" class="no-underline flex-1 min-w-70 max-w-82.5 group">
                    <div class="bg-white rounded-[15px] py-10 px-7.5 h-full min-h-100 flex flex-col items-center justify-between shadow-[0_10px_25px_rgba(0,0,0,0.05)] transition duration-300 group-hover:-translate-y-2.5 group-hover:shadow-[0_15px_35px_rgba(0,0,0,0.1)] border-[3px] border-[#f9a825]">
                        <img src="{{ asset('assets/telepon-why.png') }}" alt="telepon" class="w-27.5 h-27.5 -mb-5 rounded-full object-contain">
                        <h3 class="mt-0 text-[24px] font-bold mb-2.5 text-black">Telepon</h3>
                        <p class="text-[#666] text-[14px] leading-normal mb-7.5">Hubungi kami di jam kerja.</p>
                        <div class="w-full"><span class="block w-full py-3 rounded-[30px] text-white font-bold text-[16px] transition duration-300 bg-[#f9a825] group-hover:bg-[#d68f1c]">Chat sekarang</span></div>
                    </div>
                </a>
                <a href="#" class="no-underline flex-1 min-w-70 max-w-82.5 group">
                    <div class="bg-white rounded-[15px] py-10 px-7.5 h-full min-h-100 flex flex-col items-center justify-between shadow-[0_10px_25px_rgba(0,0,0,0.05)] transition duration-300 group-hover:-translate-y-2.5 group-hover:shadow-[0_15px_35px_rgba(0,0,0,0.1)] border-[3px] border-[#2962ff]">
                        <img src="{{ asset('assets/email-why.png') }}" alt="email" class="w-27.5 h-27.5 -mb-5 rounded-full object-contain">
                        <h3 class="mt-0 text-[24px] font-bold mb-2.5 text-black">Email</h3>
                        <p class="text-[#666] text-[14px] leading-normal mb-7.5">Kirim detail pesanan via email.</p>
                        <div class="w-full"><span class="block w-full py-3 rounded-[30px] text-white font-bold text-[16px] transition duration-300 bg-[#2962ff] group-hover:bg-[#1c4bd6]">Kirim Email</span></div>
                    </div>
                </a>
            </nav>
        </section>
    </main>

</x-layout>