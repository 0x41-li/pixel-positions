@props(['job'])
<div
    class="group flex flex-col items-center gap-y-8 rounded-xl border border-transparent bg-white/5 px-6 py-6 hover:border-[#1544EF]">
    <div class="self-start">
        <h3 class="text-lg font-bold">{{ $job->company }}</h3>
    </div>

    <div class="text-center">
        <h4 class="text-lg font-bold group-hover:text-[#1544EF]">{{ $job->title }}</h4>
        <p class="mt-4 text-sm">{{ $job->location }} - From {{ $job->salary }}</p>
    </div>

    <div class="flex items-end justify-between self-stretch">
        <div class="flex flex-wrap gap-2">
            @foreach ($job->tags as $tag)
                <x-tag :$tag />
            @endforeach
        </div>

        <div class="">
            <img class="rounded-md" src="http://picsum.photos/seed/{{ rand(1, 1000) }}/42"
                alt="">
        </div>
    </div>
</div>
