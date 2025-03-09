@php
    $profile_picture = auth()->user()->profile_picture ? asset('storage/' . auth()->user()->profile_picture) : null;
@endphp

<x-layout>
    <x-nav />

    <x-container>
        <div class="">
            {{-- Title --}}
            <h1 class="mt-8 text-left text-4xl font-bold">Profile</h1>

            {{-- Form --}}
            <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data" class="mt-8">
                @csrf
                @method('put')

                {{-- Name and email --}}
                <div class="flex [&>*]:flex-1 gap-4">
                    <x-form.field id="name" label="Name" name="name" type="text"
                        value="{{ auth()->user()->name }}" class="" />

                    <x-form.field id="email" label="Email" name="email" type="text"
                        value="{{ auth()->user()->email }}" class="disabled:bg-zinc-800 disabled:text-zinc-500"
                        disabled />

                </div>

                {{-- Role --}}
                <div class="flex [&>*]:flex-1 gap-4 mt-8">
                    <div class="flex flex-col gap-2">
                        <label for="role" class="">Select your role</label>

                        <div class="relative">
                            <select id="role" name="role"
                                class="appearance-none block w-full gap-2 border border-zinc-700 bg-zinc-900 placeholder-gray-400 text-white rounded-md px-4 py-2.5">
                                <option {{ auth()->user()->role === 'job_seeker' ? 'selected' : null }}
                                    value="job_seeker">
                                    Job Seeker
                                </option>
                                <option {{ auth()->user()->role === 'employer' ? 'selected' : null }} value="employer">
                                    Employer
                                </option>
                            </select>

                            <div class="absolute top-1/2 right-4 -translate-y-1/2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="h-6 w-6">
                                    <path
                                        d="M137.4 374.6c12.5 12.5 32.8 12.5 45.3 0l128-128c9.2-9.2 11.9-22.9 6.9-34.9s-16.6-19.8-29.6-19.8L32 192c-12.9 0-24.6 7.8-29.6 19.8s-2.2 25.7 6.9 34.9l128 128z"
                                        fill="white" />
                                </svg>
                            </div>
                        </div>

                        <div class="">
                            @error('role')
                                <x-form.error :message="$message" />
                            @enderror
                        </div>
                    </div>

                    <div class=""></div>
                </div>

                {{-- Profile image image  --}}
                <div class="mt-8" x-data="{
                    uploadedImagePreviewBlobUrl: null,
                    file: null,
                
                    handleFileChange: function(e) {
                        this.file = e.target.files[0]
                        this.uploadedImagePreviewBlobUrl = URL.createObjectURL(this.file)
                    },
                
                    resetForm: function(e) {
                        this.uploadedImagePreviewBlobUrl = null
                        this.file = null
                        $refs.profile_picture_input_el.value = ''
                    }
                }">
                    <label for="profile_picture" class="block">Profile Picture</label>
                    <input x-ref="profile_picture_input_el" type="file" name="profile_picture"
                        id="profile_picture_input" accept="image/*" class="hidden" x-on:change="handleFileChange" />

                    <div class="flex gap-8 items-center mt-4">
                        {{-- Preview of profile pciture or a new uploaded image --}}
                        <div
                            class="w-20 h-20 border-2 border-white rounded-full overflow-hidden flex items-center justify-center">

                            {{-- Preview of a new uploaded image --}}
                            <template x-if="uploadedImagePreviewBlobUrl">
                                <div class="w-full h-full bg-cover bg-no-repeat bg-center"
                                    :style="{ backgroundImage: `url('${uploadedImagePreviewBlobUrl}')` }">
                                </div>
                            </template>

                            {{-- Preview of the already saved image on the back end --}}
                            {{-- Or a custom avatar using the user's name --}}
                            <template x-if="!uploadedImagePreviewBlobUrl">
                                <div class="w-full h-full flex items-center justify-center">
                                    @if ($profile_picture)
                                        <div class="w-full h-full bg-cover bg-no-repeat bg-center"
                                            style="background-image: url('{{ $profile_picture }}')">
                                        </div>
                                    @else
                                        <span class="text-3xl">
                                            {{ auth()->user()->getFirstLettersOfTheFirstTwoWordsOfTheUserName() }}
                                        </span>
                                    @endif
                                </div>
                            </template>
                        </div>

                        {{-- Delete button 2 cases --}}
                        {{-- Deleting the preview or the image on the back end --}}
                        <div class="flex gap-4">
                            <label for="profile_picture_input"
                                class="cursor-pointer rounded-md bg-zinc-700 hover:bg-zinc-800 px-6 py-2 font-bold text-white">
                                Upload Image
                            </label>
                        </div>

                        <div class="">
                            @error('profile_picture')
                                <x-form.error :message="$message" />
                            @enderror
                        </div>
                    </div>

                </div>

                {{-- Save button --}}
                <div class="flex justify-end">
                    <x-form.submit-button value="Save" class="basis-0 flex-shrink-0 flex-grow-0 mt-8" />
                </div>
            </form>
        </div>
    </x-container>

</x-layout>
