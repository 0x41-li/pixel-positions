<x-layout>

    <x-nav />

    <main class="mx-auto max-w-screen-lg space-y-8">
        <section class="space-y-4">
            <x-h2>Featured Jobs</x-h2>

            <div class="gap-8 lg:grid lg:grid-cols-3">
                <x-card />
                <x-card />
                <x-card />
            </div>
        </section>

        <section class="space-y-4">
            <x-h2>Tags</x-h2>

            <div class="space-x-1">
                <x-tag>Tag</x-tag>
                <x-tag>Tag</x-tag>
                <x-tag>Tag</x-tag>
                <x-tag>Tag</x-tag>
                <x-tag>Tag</x-tag>
                <x-tag>Tag</x-tag>
                <x-tag>Tag</x-tag>
                <x-tag>Tag</x-tag>
                <x-tag>Tag</x-tag>
                <x-tag>Tag</x-tag>
                <x-tag>Tag</x-tag>
            </div>
        </section>

        <section>
            <x-h2>Recent Jobs</x-h2>
        </section>

    </main>

</x-layout>
