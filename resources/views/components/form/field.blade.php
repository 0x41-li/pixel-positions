<div class="flex flex-col gap-4">

    <label for="{{ $id }}">{{ $label }}</label>

    <div class="flex flex-col gap-2">

        <x-form.input {{ $attributes }} />

        @error($attributes['name'])
            <x-form.error :message="$message" />
        @enderror

    </div>

</div>
