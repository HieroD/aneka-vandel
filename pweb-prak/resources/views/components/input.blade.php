@props([
    'name',
    'label' => null,
    'type' => 'text',
    'value' => null,
    'placeholder' => '',
    'required' => false,
    'autocomplete' => null,
    'minlength' => null,
])

@php
    $isPassword = $type === 'password';
    $resolvedValue = $value ?? old($name);

    $baseClasses = 'w-full px-4 py-3 rounded-lg bg-white/90 text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-white/30';
    if ($isPassword) {
        $baseClasses .= ' pr-10';
    }
@endphp

<div class="w-full">

    @if ($label)
        <label for="{{ $name }}" class="block text-white/80 text-[11px] font-semibold uppercase tracking-wider mb-2">
            {{ $label }}
        </label>
    @endif

    {{-- If it's a password, we wrap just the input + trigger button in a relative container --}}
    @if ($isPassword)
        <div data-password-toggle class="relative">
    @endif

        <input
            type="{{ $type }}"
            id="{{ $name }}"
            name="{{ $name }}"
            value="{{ $resolvedValue }}"
            placeholder="{{ $placeholder }}"
            @if($required) required @endif
            @if($autocomplete) autocomplete="{{ $autocomplete }}" @endif
            @if($minlength) minlength="{{ $minlength }}" @endif
            class="{{ $baseClasses }}"
            {{ $attributes }}
        />

        @if ($isPassword)
            <button
                type="button"
                data-password-trigger
                class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500"
                aria-label="Toggle password visibility"
            >
                <svg viewBox="0 0 24 24" class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                    <circle cx="12" cy="12" r="3" />
                </svg>
            </button>
        </div> {{-- Closes data-password-toggle --}}
    @endif

    @error($name)
        <div class="text-red-300 text-[11px] mt-1">{{ $message }}</div>
    @enderror

</div>
