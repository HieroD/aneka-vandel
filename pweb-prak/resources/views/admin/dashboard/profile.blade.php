@extends('admin.admin_layout')
<style>
  .page-title {
    font-size: 22px;
    font-weight: 700;
    color: #1a202c;
    margin-bottom: 4px;
  }

  .page-sub {
    font-size: 13px;
    color: #718096;
    margin-bottom: 28px;
  }

  .profil-grid {
    display: grid;
    grid-template-columns: 1fr 260px;
    gap: 40px;
    align-items: start;
  }

  /* ── Form ── */
  .form-group {
    margin-bottom: 20px;
  }

  .form-group label {
    display: block;
    font-size: 13px;
    font-weight: 600;
    color: #2d3748;
    margin-bottom: 6px;
  }

  .form-group input {
    width: 100%;
    padding: 10px 14px;
    border: 1px solid #e2e8f0;
    border-radius: 8px;
    font-size: 14px;
    color: #1a202c;
    font-family: inherit;
    background: white;
    transition: border-color 0.2s, box-shadow 0.2s;
  }

  .form-group input:focus {
    outline: none;
    border-color: #0f2d6b;
    box-shadow: 0 0 0 3px rgba(15, 45, 107, 0.1);
  }

  .form-group input:read-only {
    background: #f7fafc;
    color: #718096;
    cursor: not-allowed;
  }

  .is-invalid {
    border-color: #e53e3e !important;
  }

  .error-msg {
    font-size: 11px;
    color: #e53e3e;
    margin-top: 4px;
  }


  .form-actions {
    display: flex;
    gap: 10px;
    margin-top: 8px;
  }

  .btn-save {
    background: #1a2744;
    color: white;
    padding: 10px 24px;
    border-radius: 8px;
    font-size: 13px;
    font-weight: 700;
    border: none;
    cursor: pointer;
    font-family: inherit;
    transition: background 0.2s;
  }

  .btn-save:hover {
    background: #0f1a33;
  }

  .btn-cancel {
    background: white;
    color: #4a5568;
    padding: 10px 20px;
    border-radius: 8px;
    font-size: 13px;
    font-weight: 600;
    border: 1px solid #e2e8f0;
    cursor: pointer;
    font-family: inherit;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    transition: background 0.2s;
  }

  .btn-cancel:hover {
    background: #f7fafc;
  }

  /* ── Foto Profil ── */
  .foto-section {
    text-align: center;
  }

  .foto-label {
    font-size: 13px;
    font-weight: 600;
    color: #2d3748;
    margin-bottom: 16px;
  }

  .foto-wrap {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    background: #e2e8f0;
    margin: 0 auto 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    border: 3px solid #e2e8f0;
  }

  .foto-wrap img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

  .foto-wrap .foto-placeholder svg {
    width: 56px;
    height: 56px;
    color: #a0aec0;
  }

  .btn-foto {
    background: white;
    border: 1px solid #e2e8f0;
    padding: 8px 20px;
    border-radius: 8px;
    font-size: 13px;
    font-weight: 600;
    color: #2d3748;
    cursor: pointer;
    font-family: inherit;
    transition: background 0.2s;
  }

  .btn-foto:hover {
    background: #f7fafc;
  }

  #fotoInput {
    display: none;
  }
</style>
{{-- @endpush --}}

@section('content')

<h1 class="page-title">Profil Admin</h1>
<p class="page-sub">Perbarui informasi profil Anda</p>

{{--
    Route: TODO - tambahkan route admin.profil.update (PATCH)
    Contoh: Route::patch('/admin/profil', [AdminProfilController::class, 'update'])->name('admin.profil.update');
--}}
<form method="POST" action="#" enctype="multipart/form-data">
  @csrf
  @method('PATCH')

  <div class="profil-grid">
    {{-- KIRI: Form --}}
    <div>
      <div class="form-group">
        <label for="name">Nama Lengkap</label>
        <input type="text" id="name" name="name" class="input-nama"
          value="{{ auth()->user()->name ?? 'Azka'}}" required />
        @error('name')
        <p class="error-msg">{{ $message }}</p>
        @enderror
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        {{-- Email read-only; untuk ubah email bisa ditambahkan flow verifikasi --}}
        <input type="email" id="email" name="email" class="input-email"
          value="{{ auth()->user()->email ?? 'Placeholder'}}" readonly />
      </div>

      <div class="form-group">
        <label for="phone">Nomor Telepon</label>
        {{--
                    Kolom: TODO - tambahkan kolom 'phone' / 'no_telp' di tabel users
                    dan di fillable User model
                --}}
        <input type="tel" id="phone" name="phone" class="input-phone"
          value="{{ old('phone', auth()->user()->phone ?? '') }}"
          placeholder="Contoh: 08123456789" />
        @error('phone')
        <p class="error-msg">{{ $message }}</p>
        @enderror
      </div>

      <div class="form-actions">
        <button type="submit" class="btn-save">Simpan Perubahan</button>
        {{-- Route: TODO - arahkan ke admin.dashboard --}}
        <a href="#" class="btn-cancel">Batal</a>
      </div>
    </div>

    {{-- KANAN: Foto Profil --}}
    <div class="foto-section">
      <p class="foto-label">Foto Profil</p>
      <div class="foto-wrap" id="fotoPreview">
        @if(auth()->user()->foto ?? false)
        <img src="{{ asset('storage/' . auth()->user()->foto) }}" alt="Foto Profil" />
        @else
        <div class="foto-placeholder">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
            <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2" />
            <circle cx="12" cy="7" r="4" />
          </svg>
        </div>
        @endif
      </div>
      <input type="file" id="fotoInput" name="foto" accept="image/*" onchange="previewFoto(event)" />
      <button type="button" class="btn-foto" onclick="document.getElementById('fotoInput').click()">
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
      wrap.innerHTML = `<img src="${e.target.result}" alt="Preview" style="width:100%;height:100%;object-fit:cover;" />`;
    };
    reader.readAsDataURL(file);
  }
</script>
@endpush