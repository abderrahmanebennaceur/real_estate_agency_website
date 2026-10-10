@props([
    'href' => null,
    'type' => 'button',
    'variant' => 'primary',
])

@php
    $variants = [
        'primary' => 'border border-primary bg-primary text-white hover:border-primary/90 hover:bg-primary/90',
        'outline' => 'border border-primary/20 bg-transparent text-primary hover:border-primary hover:bg-secondary/60',
        'text' => 'border border-transparent bg-transparent text-primary hover:bg-secondary/60',
    ];
@endphp

@if ($href)
    <a
        href="{{ $href }}"
        {{ $attributes->class([
            'inline-flex min-h-11 items-center justify-center rounded-full px-5 py-2.5 text-sm font-semibold transition-colors focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary',
            $variants[$variant] ?? $variants['primary'],
        ]) }}
    >
        {{ $slot }}
    </a>
@else
    <button
        type="{{ $type }}"
        {{ $attributes->class([
            'inline-flex min-h-11 items-center justify-center rounded-full px-5 py-2.5 text-sm font-semibold transition-colors focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-50',
            $variants[$variant] ?? $variants['primary'],
        ]) }}
    >
        {{ $slot }}
    </button>
@endif
