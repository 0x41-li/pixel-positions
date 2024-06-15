<x-layout>
    <x-nav />

    <x-container>
        <h1 class="mt-8 text-center text-4xl font-bold">Login</h1>

        <form action="/login" method="post" class="mx-auto max-w-md space-y-8">
            @csrf

            <x-form.field id="email" label="Email" type="email" name="email"
                value="{{ old('email') }}" placeholder="e.g. test@example.com" />


            <x-form.field id="password" label="Password" type="password" name="password"
                placeholder="****************" />

            <x-form.error :message="$errors->first('login')" />

            <x-form.submit-button value="Sign In" />
        </form>
    </x-container>

</x-layout>
