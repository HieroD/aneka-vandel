@extends('admin.admin_layout')

@section('content')

<h1 class="text-[22px] font-bold text-[#1a2744] mb-6">Statistik Penjualan</h1>

{{-- FILTER BAR --}}
<div class="flex items-center gap-3 mb-7 flex-wrap">

  <div class="relative flex-1 min-w-[180px]">
    <svg class="absolute left-3 top-1/2 -translate-y-1/2 text-[#a0aec0] w-[15px] h-[15px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
      <circle cx="11" cy="11" r="8" />
      <line x1="21" y1="21" x2="16.65" y2="16.65" />
    </svg>
    <input type="text" id="searchInput" placeholder="Cari pesanan..."
      class="w-full pl-9 pr-4 py-[9px] border border-[#e2e8f0] rounded-lg text-[13px] text-[#4a5568] focus:outline-none focus:border-[#4a90d9]" />
  </div>

  <div class="flex items-center gap-1.5 px-4 py-[9px] border border-[#e2e8f0] rounded-lg bg-white text-[13px] text-[#4a5568] cursor-pointer">
    <svg class="w-[14px] h-[14px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
      <rect x="3" y="4" width="18" height="18" rx="2" />
      <line x1="16" y1="2" x2="16" y2="6" />
      <line x1="8" y1="2" x2="8" y2="6" />
      <line x1="3" y1="10" x2="21" y2="10" />
    </svg>
    Pilih Tanggal
    <svg class="w-[12px] h-[12px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
      <polyline points="6 9 12 15 18 9" />
    </svg>
  </div>

  <select id="filterStatus"
    class="px-3 py-[9px] border border-[#e2e8f0] rounded-lg text-[13px] text-[#4a5568] focus:outline-none focus:border-[#4a90d9]">
    <option value="">Status: Semua</option>
    <option value="selesai">Selesai</option>
    <option value="dikirim">Dikirim</option>
    <option value="diproses">Diproses</option>
    <option value="menunggu">Menunggu Pembayaran</option>
    <option value="dibatalkan">Dibatalkan</option>
  </select>
</div>

{{-- STATS --}}
<div class="grid grid-cols-[1fr_220px] gap-6 mb-8 items-start">

  {{-- CHART --}}
  <div class="bg-white rounded-[14px] border border-[#e2e8f0] p-6">
    <div class="flex justify-between mb-5">
      <div>
        <div class="text-[15px] font-bold text-[#1a202c]">Sales Trend</div>
        <div class="text-[11px] text-[#a0aec0] mt-0.5">Daily revenue performance</div>
      </div>
    </div>

    <div class="flex items-end gap-2.5 h-[140px] pb-6 relative">
      <div class="absolute bottom-6 left-0 right-0 h-px bg-[#f0f4f8]"></div>

      @php
      $days = ['MONDAY','TUESDAY','WEDNESDAY','THURSDAY','FRIDAY','SATURDAY','SUNDAY'];
      $heights= [40,55,50,70,90,100,45];
      $active = strtoupper(\Carbon\Carbon::now()->format('l'));
      @endphp

      @foreach($days as $i => $day)
      <div class="flex flex-col items-center gap-1 flex-1">
        <div
          class="w-full rounded-t-md cursor-pointer hover:opacity-80"
          style="height: {{ $heights[$i] }}px; background: {{ $day === $active ? '#2d5fb3' : '#c9d8f0' }}">
        </div>
        <span class="text-[10px] text-[#a0aec0] uppercase font-medium">{{ $day }}</span>
      </div>
      @endforeach
    </div>
  </div>

  {{-- KPI --}}
  <div class="flex flex-col gap-3.5">

    <div class="bg-white rounded-[14px] border border-[#e2e8f0] p-4 flex items-center gap-3 relative">
      <div class="w-[42px] h-[42px] rounded-lg flex items-center justify-center bg-[#ebf4ff] text-[#3182ce]">
        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <line x1="12" y1="1" x2="12" y2="23"/>
          <path d="M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6"/>
        </svg>
      </div>
      <div>
        <div class="text-[11px] font-semibold text-[#a0aec0] uppercase">Total Sales</div>
        <div class="text-[18px] font-extrabold text-[#1a202c]">Rp {{ number_format($totalSales ?? 428900,0,',','.') }}</div>
      </div>
      <span class="absolute top-3 right-4 text-[11px] font-bold bg-[#f0fff4] text-[#38a169] px-2 py-[2px] rounded-full">+12.8%</span>
    </div>

    <div class="bg-white rounded-[14px] border border-[#e2e8f0] p-4 flex items-center gap-3 relative">
      <div class="w-[42px] h-[42px] rounded-lg flex items-center justify-center bg-[#f0fff4] text-[#38a169]">
        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/>
          <line x1="3" y1="6" x2="21" y2="6"/>
        </svg>
      </div>
      <div>
        <div class="text-[11px] font-semibold text-[#a0aec0] uppercase">Total Orders</div>
        <div class="text-[18px] font-extrabold text-[#1a202c]">{{ $totalOrders ?? 67 }}</div>
      </div>
      <span class="absolute top-3 right-4 text-[11px] font-bold bg-[#f0fff4] text-[#38a169] px-2 py-[2px] rounded-full">+6</span>
    </div>

    <div class="bg-white rounded-[14px] border border-[#e2e8f0] p-4 flex items-center gap-3 relative">
      <div class="w-[42px] h-[42px] rounded-lg flex items-center justify-center bg-[#faf5ff] text-[#805ad5]">
        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <path d="M17 21v-2a4 4 0 00-4-4H5"/>
          <circle cx="9" cy="7" r="4"/>
        </svg>
      </div>
      <div>
        <div class="text-[11px] font-semibold text-[#a0aec0] uppercase">Total Customers</div>
        <div class="text-[18px] font-extrabold text-[#1a202c]">{{ $totalCustomers ?? 44 }}</div>
      </div>
      <span class="absolute top-3 right-4 text-[11px] font-bold bg-[#f0fff4] text-[#38a169] px-2 py-[2px] rounded-full">+3</span>
    </div>

  </div>
</div>

{{-- TABLE --}}
<div class="text-[16px] font-bold text-[#1a202c] mb-4">Penjualan Terkini</div>

<div class="bg-white rounded-[14px] border border-[#e2e8f0] overflow-hidden">
  <table class="w-full border-collapse">
    <thead>
      <tr class="bg-[#f7fafc] text-[12px] text-[#718096] uppercase">
        <th class="px-4 py-3 text-left">Order ID</th>
        <th class="px-4 py-3 text-left">Tanggal</th>
        <th class="px-4 py-3 text-left">Produk</th>
        <th class="px-4 py-3 text-left">Total Harga</th>
        <th class="px-4 py-3 text-left">Status</th>
        <th class="px-4 py-3 text-left">Customer</th>
      </tr>
    </thead>

    <tbody id="ordersTableBody">
      @forelse($recentOrders ?? [] as $order)
      <tr class="border-b hover:bg-[#fafbfc]">
        <td class="px-4 py-3 font-semibold text-[#2b6cb0] text-xs font-mono">{{ $order->order_id }}</td>
        <td class="px-4 py-3 text-[13px]">{{ \Carbon\Carbon::parse($order->tanggal)->format('d M Y') }}</td>
        <td class="px-4 py-3 text-[13px]">{{ $order->product_name }}</td>
        <td class="px-4 py-3 text-[13px]">Rp {{ number_format($order->total_harga,0,',','.') }}</td>
        <td class="px-4 py-3">
          <span class="px-3 py-1 rounded-full text-xs font-semibold
            {{ $order->status == 'Selesai' ? 'bg-green-200 text-green-800' : '' }}
            {{ $order->status == 'Dikirim' ? 'bg-blue-200 text-blue-800' : '' }}
            {{ $order->status == 'Diproses' ? 'bg-yellow-200 text-yellow-800' : '' }}
            {{ $order->status == 'Menunggu Pembayaran' ? 'bg-red-200 text-red-800' : '' }}
            {{ $order->status == 'Dibatalkan' ? 'bg-gray-200 text-gray-600' : '' }}">
            {{ $order->status }}
          </span>
        </td>
        <td class="px-4 py-3 text-xs text-[#a0aec0]">{{ $order->customer_id }}</td>
      </tr>
      @endforelse
    </tbody>
  </table>
</div>

@endsection