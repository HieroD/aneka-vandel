@props([
    'type' => 'info',
    'dismissible' => false,
])

@php
    $variants = [
        'success' => 'bg-success-soft text-success',
        'error'   => 'bg-danger-soft text-danger',
        'warning' => 'bg-warning-soft text-warning',
        'info'    => 'bg-info-soft text-info',
    ];
    $variantClass = $variants[$type] ?? $variants['info'];
@endphp

<div
    role="alert"
    {{ $attributes->merge(['class' => "px-4 py-3 rounded-lg text-sm font-medium {$variantClass}" . ($dismissible ? ' flex items-start gap-2' : '')]) }}
>
    <div class="flex-1">{{ $slot }}</div>
    @if ($dismissible)
        <button
            type="button"
            class="text-current opacity-60 hover:opacity-100 transition"
            aria-label="Dismiss"
            onclick="this.parentElement.remove()"
        >&times;</button>
    @endif
</div>
