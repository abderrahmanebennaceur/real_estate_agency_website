@props(['href', 'active' => false])

<a
    href="{{ $href }}"
    @if ($active)
        aria-current="page"
    @endif
    {{ $attributes->class([
        'inline-flex items-center text-sm font-medium transition-colors hover:text-primary focus-visible:rounded-sm focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-primary',
        $active ? 'text-primary' : 'text-muted',
    ]) }}
>
    {{ $slot }}
</a>
