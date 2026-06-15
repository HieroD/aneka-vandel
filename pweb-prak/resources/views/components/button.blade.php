@props([
    'variant' => 'primary',
    'size' => 'md',
    'type' => 'button',
])

@php
    $base = 'inline-flex items-center justify-center font-semibold rounded-lg transition-colors duration-200 disabled:opacity-50 disabled:cursor-not-allowed focus:outline-none focus:ring-2 focus:ring-primary/40';

    $sizes = [
        'sm' => 'px-3 py-1.5 text-sm',
        'md' => 'px-4 py-2.5 text-sm',
        'lg' => 'px-6 py-3 text-base',
    ];

    $variants = [
        'primary'   => 'bg-primary text-white hover:bg-primary-hover',
        'secondary' => 'bg-white border border-border text-text-muted hover:bg-surface-2',
        'danger'    => 'bg-danger text-white hover:bg-danger-hover',
        'ghost'     => 'bg-transparent text-primary hover:bg-primary-soft',
        'success'   => 'bg-success text-white hover:bg-success-hover',
    ];

    $sizeClass = $sizes[$size] ?? $sizes['md'];
    $variantClass = $variants[$variant] ?? $variants['primary'];
    $classes = "{$base} {$sizeClass} {$variantClass}";
@endphp

<button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</button>
