<x-layout title="About - Aneka Vandel">

  <main>
    <section class="px-8 lg:px-48 pt-20 pb-20 flex flex-col lg:flex-row items-center lg:items-start gap-16 lg:gap-20">
      <div class="flex-1 flex flex-col gap-6">
        <h1 class="font-outfit font-bold text-4xl sm:text-5xl leading-tight sm:leading-tight text-primary">Cerita Kami</h1>
        <div class="flex flex-col gap-4">
          <p class="font-outfit font-normal text-xl leading-relaxed text-text max-w-lg">
            Aneka Vandel didirikan dengan misi untuk menyediakan produk
            penghargaan berkualitas tinggi yang dapat mengabadikan momen penting
            dalam kehidupan organisasi dan individu.
          </p>
          <p class="font-outfit font-normal text-xl leading-relaxed text-text max-w-lg">
            Dengan tim profesional yang berpengalaman, kami telah melayani
            ratusan klien dari berbagai sektor, mulai dari pemerintahan,
            pendidikan, hingga perusahaan swasta.
          </p>
          <p class="font-outfit font-normal text-xl leading-relaxed text-text max-w-lg">
            Komitmen kami adalah memberikan produk terbaik dengan desain yang
            elegan, bahan berkualitas premium, dan pengerjaan yang detail untuk
            setiap pesanan.
          </p>
        </div>
      </div>
      <div class="w-full lg:max-w-lg lg:shrink-0 h-80 lg:h-128 rounded-2xl overflow-hidden shadow-card">
        <img src="{{ asset('assets/pengrajinmarmer.jpg') }}" alt="Foto tim Aneka Vandel" class="w-full h-full object-cover block" />
      </div>
    </section>

    <section class="bg-primary-soft px-8 lg:px-48 pt-16 pb-20">
      <div class="text-center mb-6">
        <h2 class="font-outfit font-bold text-4xl sm:text-5xl leading-tight sm:leading-tight text-primary">Proses Produksi Kami</h2>
        <p class="font-outfit font-normal text-xl leading-relaxed text-text-muted mt-2">
          Setiap produk melalui tahapan yang terstruktur untuk memastikan
          kualitas terbaik
        </p>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 mt-12 mb-14">
        <div class="flex flex-col items-center text-center gap-6">
          <div class="w-24 h-24 bg-white rounded-full outline outline-primary shadow-step flex items-center justify-center shrink-0">
            <span class="font-outfit font-bold text-4xl leading-normal text-primary">1</span>
          </div>
          <div class="font-outfit font-bold text-2xl leading-9 text-text">Konsultasi</div>
          <div class="font-outfit font-normal text-base leading-6 text-text-muted max-w-56">
            Diskusi kebutuhan dan desain yang Anda inginkan
          </div>
        </div>
        <div class="flex flex-col items-center text-center gap-6">
          <div class="w-24 h-24 bg-white rounded-full outline outline-primary shadow-step flex items-center justify-center shrink-0">
            <span class="font-outfit font-bold text-4xl leading-normal text-primary">2</span>
          </div>
          <div class="font-outfit font-bold text-2xl leading-9 text-text">Desain</div>
          <div class="font-outfit font-normal text-base leading-6 text-text-muted max-w-56">
            Tim desainer membuat mock-up sesuai spesifikasi
          </div>
        </div>
        <div class="flex flex-col items-center text-center gap-6">
          <div class="w-24 h-24 bg-white rounded-full outline outline-primary shadow-step flex items-center justify-center shrink-0">
            <span class="font-outfit font-bold text-4xl leading-normal text-primary">3</span>
          </div>
          <div class="font-outfit font-bold text-2xl leading-9 text-text">Produksi</div>
          <div class="font-outfit font-normal text-base leading-6 text-text-muted max-w-56">
            Produksi dengan mesin modern dan tenaga ahli
          </div>
        </div>
        <div class="flex flex-col items-center text-center gap-6">
          <div class="w-24 h-24 bg-white rounded-full outline outline-primary shadow-step flex items-center justify-center shrink-0">
            <span class="font-outfit font-bold text-4xl leading-normal text-primary">4</span>
          </div>
          <div class="font-outfit font-bold text-2xl leading-9 text-text">Quality Check</div>
          <div class="font-outfit font-normal text-base leading-6 text-text-muted max-w-56">
            Pengecekan kualitas sebelum dikirim ke pelanggan
          </div>
        </div>
      </div>

      <div class="w-full h-96 rounded-2xl overflow-hidden shadow-card">
        <img
          src="{{ asset('assets/vandelmarmer.png') }}"
          alt="Proses produksi Aneka Vandel"
          class="w-full h-full object-cover block"
        />
      </div>
    </section>
  </main>

</x-layout>
