@props(['variant' => 'neutral'])

@php
    $variants = [
        'neutral' => 'bg-secondary text-primary',
        'accent' => 'bg-accent/15 text-primary',
        'outline' => 'border border-border bg-transparent text-muted',
    ];
@endphp

<span
    {{ $attributes->class([
        'inline-flex items-center rounded-full px-3 py-1 text-xs font-semibold tracking-wide',
        $variants[$variant] ?? $variants['neutral'],
    ]) }}
>
    {{ $slot }}
</span>
