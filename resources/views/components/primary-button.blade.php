@php
    $buttonClasses = $attributes
        ->merge([
            'class' => 'cursor-pointer rounded-md bg-primary px-6 py-2 font-bold text-white hover:bg-[#1c16c6]',
        ])
        ->get('class');
@endphp

<button class="{{ $buttonClasses }}" {{ $attributes }}>{{ $slot }}</button>
