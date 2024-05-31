<x-layout>

    <x-nav />

    <main class="mx-auto max-w-screen-lg space-y-8">
        <section class="py-16">
            <div class="flex flex-col items-center gap-8">
                <h1 class="text-4xl font-bold">Let's Find You A Great Job</h1>
                <input type="text" placeholder="I'm looking for..."
                    class="w-full max-w-2xl rounded-xl border border-white/10 bg-white/10 px-4 py-2.5 placeholder:text-sm placeholder:text-white/20">
            </div>
        </section>

        <section class="space-y-4">
            <x-h2>Featured Jobs</x-h2>

            <div class="gap-8 lg:grid lg:grid-cols-3">
                @foreach ($featuredJobs as $job)
                    <x-job-card :$job />
                @endforeach
            </div>
        </section>

        <section class="space-y-4">
            <x-h2>Tags</x-h2>

            <div class="space-x-1">
                @foreach ($tags as $tag)
                    <x-tag :$tag size="large" />
                @endforeach
            </div>
        </section>

        <section class="space-y-4">
            <x-h2>Recent Jobs</x-h2>

            <div class="space-y-4">
                @foreach ($jobs as $job)
                    <x-job-card-wide :$job />
                @endforeach
            </div>
        </section>

    </main>

</x-layout>
