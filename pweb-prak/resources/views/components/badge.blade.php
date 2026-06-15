@props([
    'variant' => 'default',
])

@php
    $variants = [
        'menunggu' => 'bg-surface-2 text-text-muted',
        'dikemas'  => 'bg-warning-soft text-warning',
        'dikirim'  => 'bg-info-soft text-info',
        'selesai'  => 'bg-success-soft text-success',
        'default'  => 'bg-surface-2 text-text-muted',
    ];
    $variantClass = $variants[$variant] ?? $variants['default'];
@endphp

<span
    {{ $attributes->merge(['class' => "inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold whitespace-nowrap {$variantClass}"]) }}
>
    {{ $slot }}
</span>
