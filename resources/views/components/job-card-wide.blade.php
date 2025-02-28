<div class="group flex gap-6 rounded-xl border border-transparent bg-white/5 px-6 py-6 hover:border-[#1544EF]">
    <img class="rounded-lg w-14 h-14 max-w-full" src="{{ asset('/storage/' . $job->company_logo) }}"
        alt="{{ $job->company }} Logo">

    <div class="flex flex-1 flex-col">
        <p class="text-sm text-gray-400">GovExec</p>
        <h3 class="mt-2 text-xl font-bold group-hover:text-[#1544EF]">{{ $job->title }}</h3>
        <p class="mt-8 justify-self-end text-sm text-gray-400">{{ $job->location }} - From
            {{ $job->salary }}</p>
    </div>

    <div class="flex items-end">
        <div class="space-x-1">
            @foreach ($job->tags as $tag)
                <x-tag :$tag />
            @endforeach
        </div>
    </div>
</div>
