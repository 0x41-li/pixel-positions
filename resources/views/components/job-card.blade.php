@props(['job'])
<div
    class="group flex flex-col justify-between items-center gap-y-8 rounded-xl border border-transparent bg-white/5 px-6 py-6 hover:border-[#1544EF]">
    <div class="flex flex-col gap-y-4">
        <div class="self-start">
            <h3 class="text-lg font-bold">{{ $job->company }}</h3>
        </div>

        <div class="text-center">
            <h4 class="text-lg font-bold group-hover:text-[#1544EF]">{{ $job->title }}</h4>
            <p class="mt-4 text-sm">{{ $job->location }} - From {{ $job->salary }}</p>
        </div>
    </div>

    <div class="flex items-end justify-between self-stretch">
        <div class="flex flex-wrap gap-2">
            @foreach ($job->tags as $tag)
                <x-tag :$tag />
            @endforeach
        </div>

        <img class="rounded-lg w-14 h-14 max-w-full" src="{{ asset('/storage/' . $job->company_logo) }}"
            alt="{{ $job->company }} Logo">
    </div>
</div>
