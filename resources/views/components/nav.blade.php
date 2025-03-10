@php
    if (auth()->check()) {
        $profile_picture = auth()->user()->profile_picture;
    }
@endphp

<div x-data="{
    profileDropDownOpen: false,

    toggleProfileDropDown: function() {
        this.profileDropDownOpen = !this.profileDropDownOpen
    }
}" class="p-4 md:p-8 lg:px-16 lg:py-8 2xl:px-0 max-w-screen-2xl mx-auto">
    <nav class="flex items-center justify-between pb-4">
        <div class="">
            <a href="/">
                <img src="{{ Vite::asset('resources/images/logo.svg') }}" alt="The logo">
            </a>
        </div>

        <div class="space-x-4">
            <a href="/" class="hover:text-primary">Jobs</a>
            <a href="#" class="hover:text-primary">Careers</a>
            <a href="#" class="hover:text-primary">Salaries</a>
            <a href="#" class="hover:text-primary">Companies</a>
        </div>
        @guest
            <div class="flex gap-4">
                <a href="/register" class="hover:text-primary">Register</a>
                <a href="/login" class="hover:text-primary">Login</a>
            </div>
        @endguest

        @auth
            <div class="flex items-center gap-4">
                <a href="/jobs/create" class="hover:text-primary">Post a Job</a>
                <div class="relative">
                    <button @click="toggleProfileDropDown()"
                        class="cursor-pointer rounded-full overflow-hidden h-10 w-10 border-white border-2 flex items-center justify-center text-sm">
                        @if ($profile_picture)
                            <div class="w-full h-full bg-cover bg-no-repeat bg-center"
                                style="background-image: url('{{ asset('/storage/' . $profile_picture) }}')">
                            </div>
                        @else
                            {{ auth()->user()->getFirstLettersOfTheFirstTwoWordsOfTheUserName() }}
                        @endif
                    </button>

                    <!-- Dropdown menu -->
                    <div @click.outside="profileDropDownOpen = false" x-show="profileDropDownOpen" x-cloak
                        class="absolute top-full right-0 z-10 mt-4 rounded-lg shadow-sm w-44 bg-zinc-900">
                        <ul class="py-2 text-sm  aria-labelledby="dropdownDefaultButton">
                            <li>
                                <a href="{{ route('profile') }}"
                                    class="block px-4 py-2 hover:bg-zinc-800 hover:text-white">Profile</a>
                            </li>
                            <form action="{{ route('logout') }}" method="post" class="">
                                @csrf

                                <button type="submit"
                                    class="block w-full text-left px-4 py-2 hover:bg-zinc-800 hover:text-white">
                                    Sign out
                                </button>
                            </form>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        @endauth
    </nav>

    <x-separator />
</div>
