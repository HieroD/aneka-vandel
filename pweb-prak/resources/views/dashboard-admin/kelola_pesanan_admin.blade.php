@extends('admin_layout')
<style>
  .page-title {
    font-size: 22px;
    font-weight: 700;
    color: #1a202c;
    margin-bottom: 24px;
  }

  .filter-bar {
    display: flex;
    gap: 12px;
    align-items: center;
    margin-bottom: 20px;
    flex-wrap: wrap;
  }

  .filter-bar input[type="text"] {
    flex: 1;
    min-width: 200px;
    padding: 9px 14px;
    border: 1px solid #e2e8f0;
    border-radius: 8px;
    font-size: 13px;
    font-family: inherit;
    color: #2d3748;
    background: white;
    transition: border-color 0.2s;
  }

  .filter-bar input[type="text"]:focus {
    outline: none;
    border-color: #0f2d6b;
  }

  .filter-bar input[type="text"]::placeholder {
    color: #a0aec0;
  }

  .filter-date,
  .filter-status {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 9px 14px;
    border: 1px solid #e2e8f0;
    border-radius: 8px;
    font-size: 13px;
    font-family: inherit;
    color: #2d3748;
    background: white;
    cursor: pointer;
  }

  .filter-date select,
  .filter-status select {
    border: none;
    outline: none;
    background: transparent;
    font-size: 13px;
    font-family: inherit;
    color: #2d3748;
    cursor: pointer;
  }

  .filter-date svg {
    color: #718096;
    width: 15px;
    height: 15px;
  }

  /* ── Table ── */
  .table-wrap {
    background: white;
    border-radius: 12px;
    border: 1px solid #e2e8f0;
    overflow: hidden;
  }

  table {
    width: 100%;
    border-collapse: collapse;
  }

  thead tr {
    background: #f7fafc;
  }

  thead th {
    padding: 12px 16px;
    text-align: left;
    font-size: 12px;
    font-weight: 700;
    color: #718096;
    text-transform: uppercase;
    letter-spacing: 0.04em;
    border-bottom: 1px solid #e2e8f0;
  }

  tbody tr {
    border-bottom: 1px solid #f0f4f8;
    transition: background 0.15s;
  }

  tbody tr:last-child {
    border-bottom: none;
  }

  tbody tr:hover {
    background: #fafbfc;
  }

  tbody td {
    padding: 14px 16px;
    font-size: 13px;
    color: #2d3748;
  }

  .order-id {
    font-weight: 700;
    color: #1a202c;
  }

  /* ── Status Badge & Dropdown ── */
  .status-wrap {
    position: relative;
    display: inline-block;
  }

  .status-badge {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    padding: 5px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 700;
    cursor: pointer;
    border: none;
    font-family: inherit;
    transition: opacity 0.2s;
    white-space: nowrap;
  }

  .status-badge:hover {
    opacity: 0.85;
  }

  .status-badge.dikirim {
    background: #bee3f8;
    color: #2b6cb0;
  }

  .status-badge.selesai {
    background: #c6f6d5;
    color: #276749;
  }

  .status-badge.dikemas {
    background: #fbd38d;
    color: #c05621;
  }

  .status-badge.menunggu {
    background: #e2e8f0;
    color: #4a5568;
  }

  /* Status dropdown popup */
  .status-dropdown {
    position: absolute;
    left: 0;
    top: calc(100% + 4px);
    background: white;
    border-radius: 10px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.12);
    border: 1px solid #e2e8f0;
    z-index: 50;
    overflow: hidden;
    display: none;
    min-width: 160px;
    animation: dropIn 0.15s ease;
  }

  @keyframes dropIn {
    from {
      opacity: 0;
      transform: translateY(-4px);
    }

    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  .status-dropdown.open {
    display: block;
  }

  .status-option {
    display: flex;
    align-items: center;
    padding: 9px 14px;
    cursor: pointer;
    transition: background 0.12s;
    gap: 8px;
  }

  .status-option:hover {
    background: #f7fafc;
  }

  /* ── Kosong ── */
  .empty-state {
    text-align: center;
    padding: 48px;
    color: #a0aec0;
    font-size: 14px;
  }
</style>
@endpush

@section('content')

<h1 class="page-title">Kelola Pesanan</h1>

{{--
    Route: TODO - tambahkan route admin.pesanan (GET) dan admin.pesanan.status (PATCH)
    Contoh:
    Route::get('/admin/pesanan', [PesananController::class, 'index'])->name('admin.pesanan');
    Route::patch('/admin/pesanan/{id}/status', [PesananController::class, 'updateStatus'])->name('admin.pesanan.status');
--}}

{{-- FILTER BAR --}}
<form method="GET" action="#" id="filterForm">
  <div class="filter-bar">
    <input type="text" name="search" placeholder="Cari pesanan..."
      value="{{ request('search') }}" oninput="delaySearch(this)" />

    <div class="filter-date">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <rect x="3" y="4" width="18" height="18" rx="2" />
        <line x1="16" y1="2" x2="16" y2="6" />
        <line x1="8" y1="2" x2="8" y2="6" />
        <line x1="3" y1="10" x2="21" y2="10" />
      </svg>
      <select name="tanggal" onchange="document.getElementById('filterForm').submit()">
        <option value="">Pilih Tanggal</option>
      </select>
    </div>

    <div class="filter-status">
      <select name="status" onchange="document.getElementById('filterForm').submit()">
        <option value="">Status: Semua</option>
        <option value="menunggu" {{ request('status') === 'menunggu'  ? 'selected' : '' }}>Menunggu Pembayaran</option>
        <option value="dikemas" {{ request('status') === 'dikemas'   ? 'selected' : '' }}>Dikemas</option>
        <option value="dikirim" {{ request('status') === 'dikirim'   ? 'selected' : '' }}>Dikirim</option>
        <option value="selesai" {{ request('status') === 'selesai'   ? 'selected' : '' }}>Selesai</option>
      </select>
    </div>
  </div>
</form>

{{-- TABLE --}}
<div class="table-wrap">
  <table>
    <thead>
      <tr>
        <th>Order ID</th>
        <th>Tanggal</th>
        <th>Produk</th>
        <th>Total Harga</th>
        <th>Status Pesanan</th>
        <th>ID Pelanggan</th>
      </tr>
    </thead>
    <tbody>
      {{--
                $pesanans = koleksi dari PesananController@index
                Kolom yang dibutuhkan: id, order_id, tanggal/created_at, produk (nama+qty),
                total_harga, status, user_id / id_pelanggan
            --}}
      @forelse($pesanans ?? [] as $pesanan)
      <tr>
        <td class="order-id">{{ $pesanan->order_id }}</td>
        <td>{{ \Carbon\Carbon::parse($pesanan->created_at)->translatedFormat('d M Y') }}</td>
        <td>{{ $pesanan->produk_nama }} - {{ $pesanan->qty }} Pcs</td>
        <td>Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}</td>
        <td>
          <div class="status-wrap">
            <button class="status-badge {{ $pesanan->status }}"
              onclick="toggleStatus(event, {{ $pesanan->id }})">
              {{ ucfirst($pesanan->status) }}
              <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                <polyline points="6,9 12,15 18,9" />
              </svg>
            </button>
            <div class="status-dropdown" id="statusDd-{{ $pesanan->id }}">
              @foreach(['dikirim' => 'Dikirim', 'selesai' => 'Selesai', 'dikemas' => 'Dikemas', 'menunggu' => 'Menunggu Pembayaran'] as $val => $label)
              <div class="status-option" onclick="updateStatus({{ $pesanan->id }}, '{{ $val }}')">
                <span class="status-badge {{ $val }}" style="cursor:default;font-size:11px;">{{ $label }}</span>
              </div>
              @endforeach
            </div>
          </div>
        </td>
        <td>{{ $pesanan->user_id ?? 'U' . str_pad($pesanan->user_id, 4, '0', STR_PAD_LEFT) }}</td>
      </tr>
      @empty
      <tr>
        <td colspan="6" class="empty-state">Belum ada pesanan.</td>
      </tr>
      @endforelse
    </tbody>
  </table>
</div>

{{-- Hidden form untuk update status --}}
<form method="POST" id="statusForm" action="#" style="display:none;">
  @csrf
  @method('PATCH')
  <input type="hidden" name="status" id="statusInput" />
</form>

@endsection

@push('scripts')
<script>
  // Toggle status dropdown
  function toggleStatus(e, id) {
    e.stopPropagation();
    document.querySelectorAll('.status-dropdown').forEach(d => {
      if (d.id !== `statusDd-${id}`) d.classList.remove('open');
    });
    document.getElementById(`statusDd-${id}`).classList.toggle('open');
  }

  document.addEventListener('click', () => {
    document.querySelectorAll('.status-dropdown').forEach(d => d.classList.remove('open'));
  });

  // Update status via form submit
  function updateStatus(id, status) {
    const form = document.getElementById('statusForm');

    form.action = `/admin/pesanan/${id}/status`;
    document.getElementById('statusInput').value = status;
    form.submit();
  }

  // Delay search input
  let searchTimer;

  function delaySearch(input) {
    clearTimeout(searchTimer);
    searchTimer = setTimeout(() => {
      document.getElementById('filterForm').submit();
    }, 500);
  }
</script>
@endpush