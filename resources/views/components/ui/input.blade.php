@props([
    'label',
    'name',
    'type' => 'text',
    'hint' => null,
    'error' => null,
    'id' => null,
    'required' => false,
])

@php
    $id ??= str_replace(['.', '[', ']'], '-', $name);
    $error ??= $errors->first($name);
    $inputDirection = in_array($type, ['email', 'tel', 'url', 'number'], true) ? 'ltr' : 'auto';
    $hintId = $hint ? "{$id}-hint" : null;
    $errorId = $error ? "{$id}-error" : null;
@endphp

<div class="space-y-2">
    <label class="block text-sm font-medium text-text" for="{{ $id }}">
        {{ $label }}
        @if ($required)
            <span class="text-accent" aria-hidden="true">*</span>
        @endif
    </label>

    <input
        id="{{ $id }}"
        name="{{ $name }}"
        type="{{ $type }}"
        dir="{{ $inputDirection }}"
        @required($required)
        @if ($hintId || $errorId)
            aria-describedby="{{ collect([$hintId, $errorId])->filter()->join(' ') }}"
        @endif
        @if ($error)
            aria-invalid="true"
        @endif
        {{ $attributes->class([
            'block min-h-12 w-full rounded-lg border bg-white px-4 py-3 text-base text-text placeholder:text-muted focus:outline-none focus:ring-2',
            $error ? 'border-red-600 focus:border-red-700 focus:ring-red-700/15' : 'border-border focus:border-primary focus:ring-primary/15',
        ]) }}
    >

    @if ($hint)
        <p id="{{ $hintId }}" class="text-sm text-muted">{{ $hint }}</p>
    @endif

    @if ($error)
        <p id="{{ $errorId }}" class="text-sm text-red-700">{{ $error }}</p>
    @endif
</div>
