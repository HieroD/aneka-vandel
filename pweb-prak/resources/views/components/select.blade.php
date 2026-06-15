@props([
    'name',
    'options' => [],
    'selected' => null,
    'placeholder' => null,
    'required' => false,
])

@php
    $resolvedSelected = $selected ?? old($name);
    $classes = 'block w-full appearance-none border border-border rounded-lg pl-3 pr-8 py-2.5 text-sm text-text bg-white focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary transition cursor-pointer';
@endphp

<div class="relative">
    <select
        name="{{ $name }}"
        id="{{ $name }}"
        @if($required) required @endif
        {{ $attributes->merge(['class' => $classes]) }}
    >
        @if ($placeholder)
            <option value="" disabled {{ $resolvedSelected === null || $resolvedSelected === '' ? 'selected' : '' }}>{{ $placeholder }}</option>
        @endif
        @foreach ($options as $value => $label)
            <option value="{{ $value }}" {{ (string) $resolvedSelected === (string) $value ? 'selected' : '' }}>{{ $label }}</option>
        @endforeach
    </select>

    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-text-subtle absolute right-2 top-1/2 -translate-y-1/2 pointer-events-none"
        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
    </svg>
</div>

@error($name)
    <div class="text-danger text-xs mt-1">{{ $message }}</div>
@enderror
