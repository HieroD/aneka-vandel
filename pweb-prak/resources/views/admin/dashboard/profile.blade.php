@extends('admin.admin_layout')

@section('content')

<h1 class="text-[22px] font-bold text-[#1a202c] mb-1">Profil Admin</h1>
<p class="text-[13px] text-[#718096] mb-7">Perbarui informasi profil Anda</p>

<form method="POST" action="#" enctype="multipart/form-data">
  @csrf
  @method('PATCH')

  <div class="grid grid-cols-[1fr_260px] gap-10 items-start">

    {{-- FORM --}}
    <div>

      <div class="mb-5">
        <label class="block text-[13px] font-semibold text-[#2d3748] mb-1.5">Nama Lengkap</label>
        <input type="text" name="name"
          value="{{ auth()->user()->name ?? 'Azka'}}"
          class="w-full px-3.5 py-2.5 border border-[#e2e8f0] rounded-lg text-[14px] text-[#1a202c] focus:outline-none focus:border-[#0f2d6b] focus:ring-2 focus:ring-[#0f2d6b]/10 {{ $errors->has('name') ? 'border-red-500' : '' }}">
        @error('name')
        <p class="text-[11px] text-red-500 mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div class="mb-5">
        <label class="block text-[13px] font-semibold text-[#2d3748] mb-1.5">Email</label>
        <input type="email" name="email"
          value="{{ auth()->user()->email ?? 'Placeholder'}}"
          readonly
          class="w-full px-3.5 py-2.5 border border-[#e2e8f0] rounded-lg text-[14px] text-[#718096] bg-[#f7fafc] cursor-not-allowed">
      </div>

      <div class="mb-5">
        <label class="block text-[13px] font-semibold text-[#2d3748] mb-1.5">Nomor Telepon</label>
        <input type="tel" name="phone"
          value="{{ old('phone', auth()->user()->phone ?? '') }}"
          placeholder="Contoh: 08123456789"
          class="w-full px-3.5 py-2.5 border border-[#e2e8f0] rounded-lg text-[14px] text-[#1a202c] focus:outline-none focus:border-[#0f2d6b] focus:ring-2 focus:ring-[#0f2d6b]/10 {{ $errors->has('phone') ? 'border-red-500' : '' }}">
        @error('phone')
        <p class="text-[11px] text-red-500 mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div class="flex gap-2.5 mt-2">
        <button type="submit"
          class="bg-[#1a2744] hover:bg-[#0f1a33] text-white px-6 py-2.5 rounded-lg text-[13px] font-bold">
          Simpan Perubahan
        </button>

        <a href="#"
          class="bg-white border border-[#e2e8f0] text-[#4a5568] px-5 py-2.5 rounded-lg text-[13px] font-semibold hover:bg-[#f7fafc] flex items-center">
          Batal
        </a>
      </div>

    </div>

    {{-- FOTO --}}
    <div class="text-center">

      <p class="text-[13px] font-semibold text-[#2d3748] mb-4">Foto Profil</p>

      <div id="fotoPreview"
        class="w-[120px] h-[120px] rounded-full bg-[#e2e8f0] mx-auto mb-4 flex items-center justify-center overflow-hidden border-[3px] border-[#e2e8f0]">

        @if(auth()->user()->foto ?? false)
        <img src="{{ asset('storage/' . auth()->user()->foto) }}"
          class="w-full h-full object-cover" />
        @else
        <div class="text-[#a0aec0]">
          <svg class="w-14 h-14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
            <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2" />
            <circle cx="12" cy="7" r="4" />
          </svg>
        </div>
        @endif

      </div>

      <input type="file" id="fotoInput" name="foto" accept="image/*"
        class="hidden"
        onchange="previewFoto(event)" />

      <button type="button"
        onclick="document.getElementById('fotoInput').click()"
        class="bg-white border border-[#e2e8f0] px-5 py-2 rounded-lg text-[13px] font-semibold text-[#2d3748] hover:bg-[#f7fafc]">
        Pilih Foto
      </button>

    </div>

  </div>

</form>

@endsection

@push('scripts')
<script>
  function previewFoto(event) {
    const file = event.target.files[0];
    if (!file) return;
    const reader = new FileReader();
    reader.onload = e => {
      const wrap = document.getElementById('fotoPreview');
      wrap.innerHTML = `<img src="${e.target.result}" class="w-full h-full object-cover" />`;
    };
    reader.readAsDataURL(file);
  }
</script>
@endpush