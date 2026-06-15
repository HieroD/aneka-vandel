@props([
    'name',
    'label' => null,
    'value' => null,
    'placeholder' => '',
    'rows' => 4,
    'required' => false,
])

@php
    $resolvedValue = $value ?? old($name);
@endphp

@if ($label)
    <label for="{{ $name }}" class="block text-sm font-semibold text-text-muted mb-1.5">
        {{ $label }}
    </label>
@endif

<textarea
    id="{{ $name }}"
    name="{{ $name }}"
    rows="{{ $rows }}"
    placeholder="{{ $placeholder }}"
    @if($required) required @endif
    {{ $attributes->merge(['class' => 'w-full px-4 py-2.5 rounded-xl border border-border text-sm text-text bg-white focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary transition resize-none']) }}
>{{ $resolvedValue }}</textarea>

@error($name)
    <p class="text-xs text-danger mt-0.5">{{ $message }}</p>
@enderror
