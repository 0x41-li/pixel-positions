@php
    $buttonClasses = $attributes
        ->merge([
            'class' => 'cursor-pointer rounded-md bg-zinc-700 px-6 py-2 font-bold text-white hover:bg-zinc-800',
        ])
        ->get('class');
@endphp

<button class="{{ $buttonClasses }}" {{ $attributes }}>{{ $slot }}</button>
