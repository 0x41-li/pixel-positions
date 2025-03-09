@php
    $profile_picture = auth()->user()->profile_picture ? asset('storage/' . auth()->user()->profile_picture) : null;
@endphp

<x-layout>
    <x-nav />

    <x-container>
        <div class="max-w-4xl mx-auto">
            <h1 class="mt-8 text-left text-4xl font-bold">Profile</h1>

            <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data" class="mt-8">
                @csrf
                @method('put')

                {{-- Name and email inputs --}}
                <div class="flex [&>*]:flex-1 gap-4">
                    <x-form.field id="name" label="Name" name="name" type="text"
                        value="{{ auth()->user()->name }}" class="" />

                    <x-form.field id="email" label="Email" name="email" type="text"
                        value="{{ auth()->user()->email }}" class="disabled:bg-zinc-800 disabled:text-zinc-500"
                        disabled />
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
                                class="cursor-pointer rounded-md bg-primary px-6 py-2 font-bold text-white hover:bg-[#1c16c6]">
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
                    <x-form.submit-button value="Save" class="basis-0 flex-shrink-0 flex-grow-0" />
                </div>
            </form>
        </div>
    </x-container>

</x-layout>
