<link rel="stylesheet" href="{{ asset('styles/catalog.css') }}" />
<style>
  .navbar-auth {
    display: flex;
    align-items: center;
    gap: 10px;
  }

  .btn-signin-nav {
    background: #1a2744;
    color: white;
    padding: 8px 18px;
    border-radius: 8px;
    font-size: 14px;
    font-weight: 600;
    text-decoration: none;
    border: none;
    cursor: pointer;
    font-family: inherit;
    transition: background 0.2s;
  }

  .btn-signin-nav:hover {
    background: #0f1a33;
  }

  .user-menu-wrap {
    position: relative;
  }

  .burger-btn {
    background: rgba(255, 255, 255, 0.12);
    border: 1px solid rgba(255, 255, 255, 0.22);
    color: white;
    border-radius: 8px;
    padding: 7px 12px;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 8px;
    font-family: inherit;
    font-size: 13px;
    font-weight: 500;
    transition: background 0.2s;
  }

  .burger-btn:hover {
    background: rgba(255, 255, 255, 0.22);
  }

  .burger-btn .avatar {
    width: 26px;
    height: 26px;
    border-radius: 50%;
    background: #0f2d6b;
    border: 2px solid rgba(255, 255, 255, 0.5);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 11px;
    font-weight: 700;
    color: white;
  }

  .user-dropdown {
    position: absolute;
    right: 0;
    top: calc(100% + 8px);
    background: white;
    border-radius: 10px;
    box-shadow: 0 4px 24px rgba(0, 0, 0, 0.14);
    border: 1px solid #e2e8f0;
    min-width: 190px;
    overflow: hidden;
    display: none;
    z-index: 9999;
    animation: dropIn 0.18s ease;
  }

  @keyframes dropIn {
    from {
      opacity: 0;
      transform: translateY(-6px);
    }

    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  .user-dropdown.open {
    display: block;
  }

  .dropdown-header {
    padding: 12px 16px;
    border-bottom: 1px solid #f0f4f8;
  }

  .dropdown-header .dname {
    font-size: 13px;
    font-weight: 700;
    color: #1a202c;
  }

  .dropdown-header .drole {
    font-size: 11px;
    color: #718096;
    margin-top: 1px;
  }

  .dropdown-link {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 10px 16px;
    font-size: 13px;
    color: #2d3748;
    text-decoration: none;
    transition: background 0.15s;
    cursor: pointer;
    border: none;
    background: none;
    width: 100%;
    font-family: inherit;
  }

  .dropdown-link:hover {
    background: #f7fafc;
  }

  .dropdown-link svg {
    width: 15px;
    height: 15px;
    color: #718096;
    flex-shrink: 0;
  }

  .dropdown-divider {
    border: none;
    border-top: 1px solid #f0f4f8;
    margin: 4px 0;
  }

  .dropdown-link.red {
    color: #e53e3e;
  }

  .dropdown-link.red svg {
    color: #e53e3e;
  }

  .toast-notif {
    position: fixed;
    top: 20px;
    left: 50%;
    transform: translateX(-50%) translateY(-60px);
    background: #111827;
    color: white;
    padding: 12px 24px;
    border-radius: 10px;
    font-size: 13px;
    font-family: inherit;
    border: 1px solid rgba(255, 255, 255, 0.1);
    transition: transform 0.35s ease;
    z-index: 9999;
    white-space: nowrap;
  }

  .toast-notif.show {
    transform: translateX(-50%) translateY(0);
  }

  .admin-bar {
    background: #1a2744;
    padding: 7px 32px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    font-size: 12px;
    color: rgba(255, 255, 255, 0.7);
  }

  .admin-bar a {
    color: #7ec8f4;
    text-decoration: none;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 5px;
    transition: color 0.2s;
  }

  .admin-bar a:hover {
    color: white;
  }
</style>

@section('content')

{{-- ADMIN BAR --}}
@can('admin')
<div class="admin-bar">
  <span>🛠 Mode Admin aktif</span>
  {{-- Route: TODO - tambahkan route admin.dashboard --}}
  <a href="#">
    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
      <rect x="3" y="3" width="7" height="7" />
      <rect x="14" y="3" width="7" height="7" />
      <rect x="14" y="14" width="7" height="7" />
      <rect x="3" y="14" width="7" height="7" />
    </svg>
    Buka Dashboard Admin →
  </a>
</div>
@endcan

<section class="catalog">
  <h2>Our Collection</h2>

  {{-- Tombol Tambah Produk (hanya admin) --}}
  @can('admin')
  <div style="display:flex; justify-content:flex-end; margin-bottom:12px;">
    <a href="{{ route('catalog.create') }}"
      style="background:#0f2d6b;color:white;padding:9px 18px;border-radius:8px;font-size:13px;font-weight:600;text-decoration:none;display:flex;align-items:center;gap:6px;">
      <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
        <line x1="12" y1="5" x2="12" y2="19" />
        <line x1="5" y1="12" x2="19" y2="12" />
      </svg>
      Tambah Produk
    </a>
  </div>
  @endcan

  {{-- FILTER BUTTONS --}}
  <div class="pagination">
    <button onclick="filterCards('all')" class="{{ $items === 'all' ? 'active-filter' : '' }}"
      data-filter="all">All</button>
    <button onclick="filterCards('vandel')" class="{{ $items === 'vandel' ? 'active-filter' : '' }}"
      data-filter="vandel">Vandel</button>
    <button onclick="filterCards('prasasti')" class="{{ $items === 'prasasti' ? 'active-filter' : '' }}"
      data-filter="prasasti">Prasasti</button>
    <button onclick="filterCards('kijangan')" class="{{ $items === 'kijangan' ? 'active-filter' : '' }}"
      data-filter="kijangan">Kijangan</button>
  </div>

  {{-- SEARCH --}}
  <div class="search">
    <form action="{{ route('catalog.index', $items) }}" id="search-bar" method="GET">
      <input type="text" name="search" id="search-text"
        placeholder="Search..."
        value="{{ request('search') }}"
        oninput="handleSearch(this.value)" />
    </form>
    <span id="product-count">Menampilkan Produk</span>
  </div>

  {{-- PRODUCT CARDS --}}
  <div class="container" id="product-container">
    {{-- @forelse($produks as $produk) --}}
    <div class="card"
      data-category="{{ $produk->kategori }}"
      data-nama="{{ $produk->nama }}"
      data-harga="{{ $produk->harga }}">

      <img src="{{ asset('storage/' . $produk->gambar) }}" alt="{{ $produk->nama }}" />
      <h3>{{ $produk->nama }}</h3>
      <p class="desc">{{ $produk->deskripsi }}</p>
      <p class="price">{{ 'Rp. ' . number_format($produk->harga, 0, ',', '.') }} / Pcs</p>

      <div class="card-actions">
        @auth
        @can('admin')
        {{-- Admin: Detail & Edit --}}
        <div style="display:flex;gap:6px;margin-top:8px;">
          <a href="{{ route('catalog.show', $produk->id) }}"
            style="flex:1;text-align:center;padding:7px;background:#ebf4ff;color:#0f2d6b;border-radius:6px;font-size:11px;font-weight:700;text-decoration:none;">
            Detail
          </a>
          <a href="{{ route('catalog.edit', $produk->id) }}"
            style="flex:1;text-align:center;padding:7px;background:#0f2d6b;color:white;border-radius:6px;font-size:11px;font-weight:700;text-decoration:none;">
            Edit
          </a>
        </div>
        {{-- @else --}}
        {{-- User: Pesan Sekarang --}}
        <button onclick="pesanSekarang('{{ $produk->nama }}', 'Rp. {{ number_format($produk->harga, 0, ',', '.') }}')"
          style="width:100%;padding:9px;background:#0f2d6b;color:white;border:none;border-radius:6px;font-size:13px;font-weight:600;cursor:pointer;font-family:inherit;margin-top:6px;">
          Pesan Sekarang
        </button>
        @endcan
        {{-- @else --}}
        {{-- Guest: Pesan Sekarang (redirect login) --}}
        <button onclick="pesanSekarang('{{ $produk->nama }}', 'Rp. {{ number_format($produk->harga, 0, ',', '.') }}')"
          style="width:100%;padding:9px;background:#0f2d6b;color:white;border:none;border-radius:6px;font-size:13px;font-weight:600;cursor:pointer;font-family:inherit;margin-top:6px;">
          Pesan Sekarang
        </button>
        @endauth
      </div>
    </div>
    {{-- @empty --}}
    <div style="grid-column:1/-1;text-align:center;padding:48px 0;color:#718096;">
      <p style="font-size:15px;">Produk tidak ditemukan.</p>
    </div>
    {{-- @endforelse --}}
  </div>
</section>

@endsection

@push('scripts')
<script>
  const isLoggedIn = @auth true @else false @endauth;

  // ── Filter via URL redirect ──
  function filterCards(category) {
    window.location.href = '{{ url("/catalog") }}/' + category +
      (document.getElementById('search-text').value ?
        '?search=' + encodeURIComponent(document.getElementById('search-text').value) :
        '');
  }


  function handleSearch(query) {
    const cards = document.querySelectorAll('.card');
    const q = query.toLowerCase();
    let visible = 0;
    cards.forEach(card => {
      const name = card.querySelector('h3').textContent.toLowerCase();
      const match = name.includes(q);
      card.style.display = match ? '' : 'none';
      if (match) visible++;
    });
    document.getElementById('product-count').textContent = `Menampilkan ${visible} Produk`;
  }


  function pesanSekarang(nama, harga) {
    if (!isLoggedIn) {
      showToast('Silakan login terlebih dahulu untuk memesan');
      setTimeout(() => window.location.href = '{{ route("login") }}', 1800);
      return;
    }

    showToast(`Produk "${nama}" (${harga}) berhasil ditambahkan!`);
  }
</script>
@endpush