@extends('admin.admin_layout')

@section('content')

<h1 class="text-[22px] font-bold text-[#1a202c] mb-6">Kelola Pesanan</h1>

<form method="GET" action="#" id="filterForm">
  <div class="flex gap-3 items-center mb-5 flex-wrap">

    <input type="text" name="search"
      placeholder="Cari pesanan..."
      value="{{ request('search') }}"
      oninput="delaySearch(this)"
      class="flex-1 min-w-[200px] px-3.5 py-[9px] border border-[#e2e8f0] rounded-lg text-[13px] text-[#2d3748] placeholder:text-[#a0aec0] focus:outline-none focus:border-[#0f2d6b]" />

    <div class="flex items-center gap-2 px-3.5 py-[9px] border border-[#e2e8f0] rounded-lg bg-white text-[13px] text-[#2d3748] cursor-pointer">
      <svg class="w-[15px] h-[15px] text-[#718096]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <rect x="3" y="4" width="18" height="18" rx="2" />
        <line x1="16" y1="2" x2="16" y2="6" />
        <line x1="8" y1="2" x2="8" y2="6" />
        <line x1="3" y1="10" x2="21" y2="10" />
      </svg>
      <select name="tanggal"
        onchange="document.getElementById('filterForm').submit()"
        class="bg-transparent outline-none text-[13px] cursor-pointer">
        <option value="">Pilih Tanggal</option>
      </select>
    </div>

    <div class="flex items-center gap-2 px-3.5 py-[9px] border border-[#e2e8f0] rounded-lg bg-white text-[13px] text-[#2d3748] cursor-pointer">
      <select name="status"
        onchange="document.getElementById('filterForm').submit()"
        class="bg-transparent outline-none text-[13px] cursor-pointer">
        <option value="">Status: Semua</option>
        <option value="menunggu" {{ request('status') === 'menunggu' ? 'selected' : '' }}>Menunggu Pembayaran</option>
        <option value="dikemas" {{ request('status') === 'dikemas' ? 'selected' : '' }}>Dikemas</option>
        <option value="dikirim" {{ request('status') === 'dikirim' ? 'selected' : '' }}>Dikirim</option>
        <option value="selesai" {{ request('status') === 'selesai' ? 'selected' : '' }}>Selesai</option>
      </select>
    </div>

  </div>
</form>

<div class="bg-white rounded-xl border border-[#e2e8f0] overflow-hidden">
  <table class="w-full border-collapse">

    <thead class="bg-[#f7fafc]">
      <tr>
        <th class="px-4 py-3 text-left text-[12px] font-bold text-[#718096] uppercase">Order ID</th>
        <th class="px-4 py-3 text-left text-[12px] font-bold text-[#718096] uppercase">Tanggal</th>
        <th class="px-4 py-3 text-left text-[12px] font-bold text-[#718096] uppercase">Produk</th>
        <th class="px-4 py-3 text-left text-[12px] font-bold text-[#718096] uppercase">Total Harga</th>
        <th class="px-4 py-3 text-left text-[12px] font-bold text-[#718096] uppercase">Status Pesanan</th>
        <th class="px-4 py-3 text-left text-[12px] font-bold text-[#718096] uppercase">ID Pelanggan</th>
      </tr>
    </thead>

    <tbody>
      @forelse($pesanans ?? [] as $pesanan)
      <tr class="border-b border-[#f0f4f8] hover:bg-[#fafbfc]">
        <td class="px-4 py-3 text-[13px] font-bold text-[#1a202c]">
          {{ $pesanan->order_id }}
        </td>

        <td class="px-4 py-3 text-[13px] text-[#2d3748]">
          {{ \Carbon\Carbon::parse($pesanan->created_at)->translatedFormat('d M Y') }}
        </td>

        <td class="px-4 py-3 text-[13px] text-[#2d3748]">
          {{ $pesanan->produk_nama }} - {{ $pesanan->qty }} Pcs
        </td>

        <td class="px-4 py-3 text-[13px] text-[#2d3748]">
          Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}
        </td>

        <td class="px-4 py-3">
          <div class="relative inline-block">

            <button
              onclick="toggleStatus(event, {{ $pesanan->id }})"
              class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-[12px] font-bold whitespace-nowrap
              {{ $pesanan->status == 'dikirim' ? 'bg-[#bee3f8] text-[#2b6cb0]' : '' }}
              {{ $pesanan->status == 'selesai' ? 'bg-[#c6f6d5] text-[#276749]' : '' }}
              {{ $pesanan->status == 'dikemas' ? 'bg-[#fbd38d] text-[#c05621]' : '' }}
              {{ $pesanan->status == 'menunggu' ? 'bg-[#e2e8f0] text-[#4a5568]' : '' }}">
              {{ ucfirst($pesanan->status) }}

              <svg class="w-[10px] h-[10px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                <polyline points="6,9 12,15 18,9" />
              </svg>
            </button>

            <div id="statusDd-{{ $pesanan->id }}"
              class="hidden absolute left-0 top-[calc(100%+4px)] bg-white rounded-lg border border-[#e2e8f0] shadow-lg z-50 min-w-[160px]">

              @foreach(['dikirim'=>'Dikirim','selesai'=>'Selesai','dikemas'=>'Dikemas','menunggu'=>'Menunggu Pembayaran'] as $val => $label)
              <div onclick="updateStatus({{ $pesanan->id }}, '{{ $val }}')"
                class="flex items-center gap-2 px-3.5 py-2 cursor-pointer hover:bg-[#f7fafc]">

                <span class="px-3 py-1 rounded-full text-[11px] font-bold
                  {{ $val == 'dikirim' ? 'bg-[#bee3f8] text-[#2b6cb0]' : '' }}
                  {{ $val == 'selesai' ? 'bg-[#c6f6d5] text-[#276749]' : '' }}
                  {{ $val == 'dikemas' ? 'bg-[#fbd38d] text-[#c05621]' : '' }}
                  {{ $val == 'menunggu' ? 'bg-[#e2e8f0] text-[#4a5568]' : '' }}">
                  {{ $label }}
                </span>

              </div>
              @endforeach

            </div>

          </div>
        </td>

        <td class="px-4 py-3 text-[13px] text-[#2d3748]">
          {{ $pesanan->user_id ?? 'U' . str_pad($pesanan->user_id, 4, '0', STR_PAD_LEFT) }}
        </td>
      </tr>

      @empty
      <tr>
        <td colspan="6" class="text-center py-12 text-[#a0aec0] text-[14px]">
          Belum ada pesanan.
        </td>
      </tr>
      @endforelse
    </tbody>

  </table>
</div>

<form method="POST" id="statusForm" action="#" class="hidden">
  @csrf
  @method('PATCH')
  <input type="hidden" name="status" id="statusInput" />
</form>

@endsection

@push('scripts')
<script>
  function toggleStatus(e, id) {
    e.stopPropagation();

    document.querySelectorAll('[id^="statusDd-"]').forEach(el => {
      if (el.id !== `statusDd-${id}`) el.classList.add('hidden');
    });

    document.getElementById(`statusDd-${id}`).classList.toggle('hidden');
  }

  document.addEventListener('click', () => {
    document.querySelectorAll('[id^="statusDd-"]').forEach(el => el.classList.add('hidden'));
  });

  function updateStatus(id, status) {
    const form = document.getElementById('statusForm');
    form.action = `/admin/pesanan/${id}/status`;
    document.getElementById('statusInput').value = status;
    form.submit();
  }

  let searchTimer;

  function delaySearch() {
    clearTimeout(searchTimer);
    searchTimer = setTimeout(() => {
      document.getElementById('filterForm').submit();
    }, 500);
  }
</script>
@endpush