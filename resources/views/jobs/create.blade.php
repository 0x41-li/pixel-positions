<x-layout>
    <x-nav />


    <x-container>
        <h1 class="mt-8 text-left text-4xl font-bold">Post A Job</h1>

        <form action="/jobs/create" method="post" class="w-full flex flex-col gap-6">
            @csrf

            <div class="flex gap-4 [&>*]:flex-1">
                <x-form.field id="title" label="Title" type="text" name="title" value="{{ old('title') }}"
                    placeholder="E.g. Full Stack Laravel Developer" />
                <x-form.field id="Company" label="Company" type="text" name="company" value="{{ old('company') }}"
                    placeholder="E.g. Google" />
            </div>

            <div class="flex gap-4 [&>*]:flex-1">
                <x-form.field id="salary" label="Salary" type="number" name="salary" value="{{ old('salary') }}"
                    placeholder="E.g. 100000" />
                <x-form.field id="location" label="Location" type="text" name="location"
                    value="{{ old('location') }}" placeholder="E.g. New York" />
            </div>

            <div class="flex gap-4 [&>*]:flex-1">
                <x-form.field id="schedule" label="Schedule" type="text" name="schedule"
                    value="{{ old('schedule') }}" placeholder="E.g. Full Time" />
                <x-form.field id="url" label="URL" type="text" name="url" value="{{ old('url') }}"
                    placeholder="E.g. https://example.com/job-post" />
            </div>

            <x-form.submit-button class="mt-4" value="Create" />
        </form>
    </x-container>
</x-layout>
