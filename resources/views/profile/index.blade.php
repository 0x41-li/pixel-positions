@php
    $profile_picture = auth()->user()->profile_picture ? asset('storage/' . auth()->user()->profile_picture) : null;
@endphp

<x-layout>
    <x-nav />

    <x-container>
        <h1 class="mt-8 text-left text-4xl font-bold">Profile</h1>

        <form action="/profile" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="flex [&>*]:flex-1 gap-8">
                <x-form.field id="name" label="Name" name="name" type="text" value="{{ auth()->user()->name }}"
                    class="" />

                <x-form.field id="email" label="Email" name="email" type="text"
                    value="{{ auth()->user()->email }}" class="disabled:bg-zinc-800 disabled:text-zinc-500" disabled />
            </div>

            <div class="mt-8">
                <label for="profile_picture" class="block">Profile Picture</label>
                <input ref="profile_picture" id="profile_picture" type="file" name="profile_picture"
                    id="profile_picture" accept="image/*" class="hidden" />

                <div
                    class="w-20 h-20 border-2 border-white mt-4 rounded-full overflow-hidden flex items-center justify-center">
                    @if ($profile_picture)
                        <div class="w-full h-full bg-cover bg-no-repeat bg-center"
                            style="background-image: url('{{ $profile_picture }}')">
                        </div>
                    @else
                        <span class="text-3xl">
                            {{ auth()->user()->getFirstLettersOfTheFirstTwoWordsOfTheUserName() }}
                        </span>
                    @endif
                </div>

            </div>


            <div class="mt-8">
                <x-form.submit-button value="Save" />
            </div>
        </form>
    </x-container>

</x-layout>
