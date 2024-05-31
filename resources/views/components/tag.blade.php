@props(['tag', 'size' => 'small'])


@php
    $classes = 'inline-block rounded-full bg-white/5 px-4 py-1.5 hover:bg-white/30 ';
    if ($size === 'small') {
        $classes .= 'text-xs';
    } elseif ($size === 'large') {
        $classes .= 'text-sm';
    }
@endphp

<span class="{{ $classes }}">
    {{ $tag->name }}
</span>
