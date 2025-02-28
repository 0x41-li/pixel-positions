<div class="px-16 py-8">
    <nav class="flex justify-between border-b border-white/20 pb-8">
        <div class="">
            <a href="/">
                <img src="{{ Vite::asset('resources/images/logo.svg') }}" alt="The logo">
            </a>
        </div>

        <div class="space-x-4">
            <a href="/" class="hover:text-[#1544EF]">Jobs</a>
            <a href="#" class="hover:text-[#1544EF]">Careers</a>
            <a href="#" class="hover:text-[#1544EF]">Salaries</a>
            <a href="#" class="hover:text-[#1544EF]">Companies</a>
        </div>
        @guest
            <div class="flex gap-4">
                <a href="/register" class="hover:text-[#1544EF]">Register</a>
                <a href="/login" class="hover:text-[#1544EF]">Login</a>
            </div>
        @endguest

        @auth
            <div class="">
                <a href="/jobs/create" class="hover:text-[#1544EF]">Post a Job</a>
            </div>
        @endauth
    </nav>
</div>
