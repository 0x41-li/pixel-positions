<x-layout>
    <x-nav />

    <x-container>
        <h1 class="mt-8 text-left text-4xl font-bold">Profile</h1>

        <form action="">
            <div class="flex [&>*]:flex-1 gap-8">
                <x-form.field id="name" label="Name" name="name" type="text" value="{{ auth()->user()->name }}"
                    class="" />

                <x-form.field id="email" label="Email" name="email" type="text"
                    value="{{ auth()->user()->email }}" />
            </div>

            <div class="mt-8">
                <x-form.submit-button value="Save" />
            </div>
        </form>
    </x-container>

</x-layout>
