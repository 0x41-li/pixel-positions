<x-layout>
    <x-nav />

    <x-container>
        <h1 class="mt-8 text-center text-4xl font-bold">Register</h1>

        <form action="/register" method="post" class="mx-auto max-w-md space-y-8">
            @csrf

            <x-form.field id="name" label="Name" type="text" name="name"
                value="{{ old('name') }}" placeholder="eg. Jane Doe" />


            <x-form.field id="email" label="Email" type="email" name="email"
                value="{{ old('email') }}" placeholder="eg. test@example.com" />

            <x-form.field id="email_confirmation" label="Confirm Email" type="email"
                name="email_confirmation" placeholder="eg. test@example.com" />

            <x-form.field id="password" label="Password" type="password" name="password"
                placeholder="********" />

            <x-form.field id="password_confirmation" label="Confirm Password" type="password"
                name="password_confirmation" placeholder="********" />


            <x-form.submit-button value="Register" />
        </form>
    </x-container>

</x-layout>
