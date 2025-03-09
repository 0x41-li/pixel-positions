<x-layout>
    <x-nav />


    <x-container>
        <h1 class="mt-8 text-left text-4xl font-bold">Post A Job</h1>

        <form action="/jobs/create" method="post" class="mt-8" enctype="multipart/form-data">
            @csrf

            <div class="flex flex-col gap-4">
                <div class="flex gap-8 [&>*]:flex-1">
                    <x-form.field id="title" label="Title" type="text" name="title" value="{{ old('title') }}"
                        placeholder="E.g. Full Stack Laravel Developer" />
                    <x-form.field id="salary" label="Salary" type="number" name="salary"
                        value="{{ old('salary') }}" placeholder="E.g. 100000" />
                </div>

                <div class="flex gap-8 [&>*]:flex-1">
                    <x-form.field id="location" label="Location" type="text" name="location"
                        value="{{ old('location') }}" placeholder="E.g. New York" />
                    <x-form.field id="schedule" label="Schedule" type="text" name="schedule"
                        value="{{ old('schedule') }}" placeholder="E.g. Full Time" />
                </div>

                <div class="flex gap-8 [&>*]:flex-1">
                    <x-form.field id="url" label="URL" type="text" name="url"
                        value="{{ old('url') }}" placeholder="E.g. https://example.com/job-post"
                        class="w-full flex-1" />
                </div>

                <div class="">
                    <label for="" class="">Description</label>
                    <textarea name="description" id="description"
                        class="mt-2 bg-zinc-900 border border-zinc-700 rounded-md w-full h-60 resize-y px-4 py-2.5 placeholder:text-zinc-600"
                        placeholder="We are looking for a senior full stack laravel developer ..."></textarea>
                </div>
            </div>

            <div class="flex justify-end mt-8">
                <x-primary-button class="">Post</x-primary-button>
            </div>
        </form>
    </x-container>
</x-layout>
