@extends('admin.admin_layout')
<style>
  .page-title {
    font-size: 22px;
    font-weight: 700;
    color: #1a2744;
    margin-bottom: 24px;
  }

  .filter-bar {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 28px;
    flex-wrap: wrap;
  }

  .filter-bar .search-wrap {
    position: relative;
    flex: 1;
    min-width: 180px;
  }

  .filter-bar .search-wrap svg {
    position: absolute;
    left: 12px;
    top: 50%;
    transform: translateY(-50%);
    color: #a0aec0;
    width: 15px;
    height: 15px;
  }

  .filter-bar input[type="text"] {
    width: 100%;
    padding: 9px 14px 9px 36px;
    border: 1px solid #e2e8f0;
    border-radius: 8px;
    font-size: 13px;
    color: #4a5568;
    background: white;
    outline: none;
    transition: border-color 0.2s;
    font-family: inherit;
  }

  .filter-bar input[type="text"]:focus {
    border-color: #4a90d9;
  }

  .filter-bar select {
    padding: 9px 32px 9px 12px;
    border: 1px solid #e2e8f0;
    border-radius: 8px;
    font-size: 13px;
    color: #4a5568;
    background: white;
    outline: none;
    cursor: pointer;
    font-family: inherit;
    appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24' fill='none' stroke='%23a0aec0' stroke-width='2'%3E%3Cpolyline points='6 9 12 15 18 9'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 10px center;
    transition: border-color 0.2s;
  }

  .filter-bar select:focus {
    border-color: #4a90d9;
  }

  .filter-icon-wrap {
    display: flex;
    align-items: center;
    gap: 6px;
    padding: 9px 14px;
    border: 1px solid #e2e8f0;
    border-radius: 8px;
    background: white;
    cursor: pointer;
    font-size: 13px;
    color: #4a5568;
    font-family: inherit;
  }

  /* ── STATS + CHART ROW ── */
  .stats-row {
    display: grid;
    grid-template-columns: 1fr 220px;
    gap: 24px;
    margin-bottom: 32px;
    align-items: start;
  }

  /* ── CHART CARD ── */
  .chart-card {
    background: white;
    border-radius: 14px;
    border: 1px solid #e2e8f0;
    padding: 24px;
  }

  .chart-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 20px;
  }

  .chart-header .chart-title {
    font-size: 15px;
    font-weight: 700;
    color: #1a202c;
  }

  .chart-header .chart-sub {
    font-size: 11px;
    color: #a0aec0;
    margin-top: 2px;
  }

  .bar-chart {
    display: flex;
    align-items: flex-end;
    gap: 10px;
    height: 140px;
    padding-bottom: 24px;
    position: relative;
  }

  .bar-chart::after {
    content: '';
    position: absolute;
    bottom: 24px;
    left: 0;
    right: 0;
    height: 1px;
    background: #f0f4f8;
  }

  .bar-group {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 6px;
    flex: 1;
  }

  .bar {
    width: 100%;
    border-radius: 6px 6px 0 0;
    transition: opacity 0.2s;
    cursor: pointer;
  }

  .bar:hover {
    opacity: 0.8;
  }

  .bar.active {
    background: #2d5fb3 !important;
  }

  .bar-label {
    font-size: 10px;
    color: #a0aec0;
    text-transform: uppercase;
    font-weight: 500;
  }

  /* ── KPI CARDS ── */
  .kpi-stack {
    display: flex;
    flex-direction: column;
    gap: 14px;
  }

  .kpi-card {
    background: white;
    border-radius: 14px;
    border: 1px solid #e2e8f0;
    padding: 16px 20px;
    display: flex;
    align-items: center;
    gap: 14px;
    position: relative;
  }

  .kpi-icon {
    width: 42px;
    height: 42px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
  }

  .kpi-icon.blue {
    background: #ebf4ff;
    color: #3182ce;
  }

  .kpi-icon.green {
    background: #f0fff4;
    color: #38a169;
  }

  .kpi-icon.purple {
    background: #faf5ff;
    color: #805ad5;
  }

  .kpi-icon svg {
    width: 20px;
    height: 20px;
  }

  .kpi-body {
    flex: 1;
  }

  .kpi-label {
    font-size: 11px;
    font-weight: 600;
    color: #a0aec0;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 4px;
  }

  .kpi-value {
    font-size: 18px;
    font-weight: 800;
    color: #1a202c;
    line-height: 1;
  }

  .kpi-badge {
    position: absolute;
    top: 12px;
    right: 14px;
    font-size: 11px;
    font-weight: 700;
    padding: 2px 8px;
    border-radius: 20px;
  }

  .kpi-badge.up {
    background: #f0fff4;
    color: #38a169;
  }

  .kpi-badge.down {
    background: #fff5f5;
    color: #e53e3e;
  }

  /* ── RECENT ORDERS TABLE ── */
  .section-title {
    font-size: 16px;
    font-weight: 700;
    color: #1a202c;
    margin-bottom: 16px;
  }

  .table-card {
    background: white;
    border-radius: 14px;
    border: 1px solid #e2e8f0;
    overflow: hidden;
  }

  table {
    width: 100%;
    border-collapse: collapse;
  }

  thead th {
    background: #f7fafc;
    padding: 12px 18px;
    text-align: left;
    font-size: 12px;
    font-weight: 600;
    color: #718096;
    text-transform: uppercase;
    letter-spacing: 0.4px;
    border-bottom: 1px solid #e2e8f0;
  }

  tbody td {
    padding: 13px 18px;
    font-size: 13px;
    color: #4a5568;
    border-bottom: 1px solid #f7fafc;
    vertical-align: middle;
  }

  tbody tr:last-child td {
    border-bottom: none;
  }

  tbody tr:hover td {
    background: #fafbfc;
  }

  .order-id {
    font-weight: 600;
    color: #2b6cb0;
    font-size: 12px;
    font-family: 'Courier New', monospace;
  }

  .badge {
    display: inline-flex;
    align-items: center;
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
    white-space: nowrap;
  }

  .badge.selesai {
    background: #c6f6d5;
    color: #276749;
  }

  .badge.dikirim {
    background: #bee3f8;
    color: #2c5282;
  }

  .badge.diproses {
    background: #feebc8;
    color: #c05621;
  }

  .badge.menunggu {
    background: #fed7d7;
    color: #c53030;
  }

  .badge.dibatalkan {
    background: #e2e8f0;
    color: #718096;
  }

  .customer-id {
    font-size: 12px;
    color: #a0aec0;
    font-weight: 500;
  }
</style>
{{-- @endpush --}}

@section('content')

<h1 class="page-title">Statistik Penjualan</h1>

{{-- FILTER BAR --}}
<div class="filter-bar">
  <div class="search-wrap">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
      <circle cx="11" cy="11" r="8" />
      <line x1="21" y1="21" x2="16.65" y2="16.65" />
    </svg>
    <input type="text" placeholder="Cari pesanan..." id="searchInput" />
  </div>

  <div class="filter-icon-wrap">
    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
      <rect x="3" y="4" width="18" height="18" rx="2" />
      <line x1="16" y1="2" x2="16" y2="6" />
      <line x1="8" y1="2" x2="8" y2="6" />
      <line x1="3" y1="10" x2="21" y2="10" />
    </svg>
    Pilih Tanggal
    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
      <polyline points="6 9 12 15 18 9" />
    </svg>
  </div>

  <select id="filterStatus">
    <option value="">Status: Semua</option>
    <option value="selesai">Selesai</option>
    <option value="dikirim">Dikirim</option>
    <option value="diproses">Diproses</option>
    <option value="menunggu">Menunggu Pembayaran</option>
    <option value="dibatalkan">Dibatalkan</option>
  </select>
</div>

{{-- STATS ROW: CHART + KPI --}}
<div class="stats-row">

  {{-- BAR CHART --}}
  <div class="chart-card">
    <div class="chart-header">
      <div>
        <div class="chart-title">Sales Trend</div>
        <div class="chart-sub">Daily revenue performance</div>
      </div>
    </div>

    <div class="bar-chart" id="barChart">
      @php
      $days = ['MONDAY','TUESDAY','WEDNESDAY','THURSDAY','FRIDAY','SATURDAY','SUNDAY'];
      $heights= [40, 55, 50, 70, 90, 100, 45];
      $active = strtoupper(\Carbon\Carbon::now()->format('l'));
      @endphp
      @foreach($days as $i => $day)
      <div class="bar-group">
        <div style="--bar-height: {{ $heights[$i] }}px; --bar-bg: {{ $day === $active ? '#2d5fb3' : '#c9d8f0' }};"
          class="w-full h-[var(--bar-height)] bg-[var(--bar-bg)]">
        </div>
        <span class="bar-label">{{ $day }}</span>
      </div>
      @endforeach
    </div>
  </div>

  {{-- KPI CARDS --}}
  <div class="kpi-stack">

    <div class="kpi-card">
      <div class="kpi-icon blue">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <line x1="12" y1="1" x2="12" y2="23" />
          <path d="M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6" />
        </svg>
      </div>
      <div class="kpi-body">
        <div class="kpi-label">Total Sales</div>
        <div class="kpi-value">Rp {{ number_format($totalSales ?? 428900, 0, ',', '.') }}</div>
      </div>
      <span class="kpi-badge up">+12.8%</span>
    </div>

    <div class="kpi-card">
      <div class="kpi-icon green">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z" />
          <line x1="3" y1="6" x2="21" y2="6" />
        </svg>
      </div>
      <div class="kpi-body">
        <div class="kpi-label">Total Orders</div>
        <div class="kpi-value">{{ $totalOrders ?? 67 }}</div>
      </div>
      <span class="kpi-badge up">+6</span>
    </div>

    <div class="kpi-card">
      <div class="kpi-icon purple">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2" />
          <circle cx="9" cy="7" r="4" />
          <path d="M23 21v-2a4 4 0 00-3-3.87" />
          <path d="M16 3.13a4 4 0 010 7.75" />
        </svg>
      </div>
      <div class="kpi-body">
        <div class="kpi-label">Total Customers</div>
        <div class="kpi-value">{{ $totalCustomers ?? 44 }}</div>
      </div>
      <span class="kpi-badge up">+3</span>
    </div>

  </div>
</div>

{{-- RECENT ORDERS TABLE --}}
<div class="section-title">Penjualan Terkini</div>

<div class="table-card">
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
    <tbody id="ordersTableBody">
      @forelse($recentOrders ?? [] as $order)
      <tr
        data-status="{{ strtolower(str_replace(' ', '', $order->status)) }}"
        data-search="{{ strtolower($order->order_id . ' ' . $order->product_name . ' ' . $order->customer_id) }}">
        <td><span class="order-id">{{ $order->order_id }}</span></td>
        <td>{{ \Carbon\Carbon::parse($order->tanggal)->translatedFormat('d M Y') }}</td>
        <td>{{ $order->product_name }}</td>
        <td>Rp {{ number_format($order->total_harga, 0, ',', '.') }}</td>
        <td>
          @php
          $statusMap = [
          'selesai' => 'selesai',
          'dikirim' => 'dikirim',
          'diproses' => 'diproses',
          'menunggupembayaran' => 'menunggu',
          'dibatalkan' => 'dibatalkan',
          ];
          $key = strtolower(str_replace(' ', '', $order->status));
          $cls = $statusMap[$key] ?? '';
          @endphp
          <span class="badge {{ $cls }}">{{ $order->status }}</span>
        </td>
        <td><span class="customer-id">{{ $order->customer_id }}</span></td>
      </tr>
      @empty
      {{-- Dummy rows for preview when no data --}}
      <tr data-status="selesai" data-search="av-20260520-001 vandel a u0001">
        <td><span class="order-id">AV-20260520-001</span></td>
        <td>20 Mei 2026</td>
        <td>Vandel A - 50 Pcs</td>
        <td>Rp 750.000</td>
        <td><span class="badge selesai">Selesai</span></td>
        <td><span class="customer-id">U0001</span></td>
      </tr>
      <tr data-status="dikirim" data-search="av-20260522-002 vandel b u0002">
        <td><span class="order-id">AV-20260522-002</span></td>
        <td>22 Mei 2026</td>
        <td>Vandel B - 10 Pcs</td>
        <td>Rp 150.000</td>
        <td><span class="badge dikirim">Dikirim</span></td>
        <td><span class="customer-id">U0002</span></td>
      </tr>
      <tr data-status="diproses" data-search="av-20260525-003 vandel c u0002">
        <td><span class="order-id">AV-20260525-003</span></td>
        <td>25 Mei 2026</td>
        <td>Vandel C - 3 Pcs</td>
        <td>Rp 45.000</td>
        <td><span class="badge diproses">Diproses</span></td>
        <td><span class="customer-id">U0002</span></td>
      </tr>
      <tr data-status="menunggu" data-search="av-20260528-004 kijangan u0004">
        <td><span class="order-id">AV-20260528-004</span></td>
        <td>28 Mei 2026</td>
        <td>Kijangan</td>
        <td>Rp 1.200.000</td>
        <td><span class="badge menunggu">Menunggu Pembayaran</span></td>
        <td><span class="customer-id">U0004</span></td>
      </tr>
      @endforelse
    </tbody>
  </table>
</div>

@endsection

@push('scripts')
<script>
  // ── Live search + status filter ──
  const searchInput = document.getElementById('searchInput');
  const filterStatus = document.getElementById('filterStatus');
  const tbody = document.getElementById('ordersTableBody');

  function applyFilters() {
    const q = searchInput.value.toLowerCase().trim();
    const status = filterStatus.value.toLowerCase();

    tbody.querySelectorAll('tr').forEach(row => {
      const matchSearch = !q || row.dataset.search.includes(q);
      const matchStatus = !status || row.dataset.status === status;
      row.style.display = (matchSearch && matchStatus) ? '' : 'none';
    });
  }

  searchInput.addEventListener('input', applyFilters);
  filterStatus.addEventListener('change', applyFilters);

  // ── Bar chart click to highlight ──
  document.querySelectorAll('.bar').forEach(bar => {
    bar.addEventListener('click', () => {
      document.querySelectorAll('.bar').forEach(b => {
        b.classList.remove('active');
        b.style.background = '#c9d8f0';
      });
      bar.classList.add('active');
      bar.style.background = '#2d5fb3';
    });
  });
</script>
@endpush