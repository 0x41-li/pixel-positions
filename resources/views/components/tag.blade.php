@props(['size' => 'small'])


@php
    $classes = 'inline-block cursor-pointer rounded-full bg-white/10 px-3 py-1 hover:bg-white/30 ';
    if ($size === 'small') {
        $classes .= 'text-xs';
    } elseif ($size === 'large') {
        $classes .= 'text-lg';
    }
@endphp

<span class="{{ $classes }}">
    {{ $slot }}
</span>
