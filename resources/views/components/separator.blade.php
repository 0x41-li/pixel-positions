@php
    $class = $attributes->merge(['class' => 'border-zinc-700'])->get('class');
@endphp

<hr class="{{ $class }}" />
