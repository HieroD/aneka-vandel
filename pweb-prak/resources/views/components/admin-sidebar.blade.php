@php
$items = [
['route' => 'admin.profile', 'label' => 'Profil Admin', 'icon' => 'M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2M12 11a4 4 0 100-8 4 4 0 000 8z'],
['route' => 'admin.orders', 'label' => 'Kelola Pesanan', 'icon' => 'M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4zM3 6h18M9 12h6'],
['route' => 'admin.statistic', 'label' => 'Statistik', 'icon' => 'M18 20V10M12 20V4M6 20v-6'],
['route' => 'catalog.create', 'label' => 'Tambah Produk', 'icon' => 'M12 5v14M5 12h14'],
['route' => 'catalog.pick', 'label' => 'Edit Produk', 'icon' => 'M11 4H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2v-5M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z'],
];
@endphp

<aside class="w-[200px] bg-white border-r border-border py-6 flex flex-col min-h-[calc(100vh-64px)]">

    <div class="px-5 pb-5 border-b border-border">
        <div class="text-[15px] font-bold text-text">
            Halo, {{ auth()->user()->name ?? 'Admin' }}! 👋
        </div>
        <div class="text-xs text-text-subtle mt-0.5">
            Bagaimana kabarmu?
        </div>
    </div>

    <nav class="py-3 flex-1">
        @foreach ($items as $item)
        @php
        $isActive = request()->routeIs($item['route'])
        || ($item['route'] === 'catalog.pick' && request()->routeIs('catalog.edit'));
        @endphp
        <a
            href="{{ route($item['route']) }}"
            @class([ 'flex items-center gap-2.5 px-5 py-2.5 text-[13px] font-medium text-text-muted hover:bg-surface-2 hover:text-text' , 'bg-primary-soft text-primary font-semibold mx-2 px-3 rounded-lg w-[calc(100%-16px)]'=> $isActive,
            ])
            >
            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="{{ $item['icon'] }}" />
            </svg>
            {{ $item['label'] }}
        </a>
        @endforeach
    </nav>

    <div class="py-3 border-t border-border">
        <form method="POST" action="{{ route('logout') }}" class="m-0">
            @csrf
            @method('DELETE')
            <button
                type="submit"
                class="flex items-center gap-2.5 px-5 py-2.5 text-[13px] font-medium text-danger hover:bg-surface-2 w-full cursor-pointer">
                <svg class="w-4 h-4 text-danger" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4M16 17l5-5-5-5M21 12H9" />
                </svg>
                Keluar
            </button>
        </form>
    </div>

</aside>