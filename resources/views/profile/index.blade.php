@php
    $profile_picture = auth()->user()->profile_picture ? asset('storage/' . auth()->user()->profile_picture) : null;
@endphp

<x-layout>
    <x-nav />

    <x-container>
        <div class="max-w-4xl mx-auto">
            <h1 class="mt-8 text-left text-4xl font-bold">Profile</h1>

            <form action="/profile" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="flex [&>*]:flex-1 gap-4">
                    <x-form.field id="name" label="Name" name="name" type="text"
                        value="{{ auth()->user()->name }}" class="" />

                    <x-form.field id="email" label="Email" name="email" type="text"
                        value="{{ auth()->user()->email }}" class="disabled:bg-zinc-800 disabled:text-zinc-500"
                        disabled />
                </div>

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
                    }
                }">
                    <label for="profile_picture" class="block">Profile Picture</label>
                    <input x-ref="profile_picture_input_el" type="file" name="profile_picture"
                        id="profile_picture_input" accept="image/*" class="hidden" x-on:change="handleFileChange" />

                    <div class="flex gap-8 items-center mt-4">
                        <div
                            class="w-20 h-20 border-2 border-white rounded-full overflow-hidden flex items-center justify-center">

                            <div x-cloak x-show="uploadedImagePreviewBlobUrl"
                                class="w-full h-full bg-cover bg-no-repeat bg-center"
                                :style="{ backgroundImage: `url('${uploadedImagePreviewBlobUrl}')` }">
                            </div>

                            <div x-cloak x-show="!uploadedImagePreviewBlobUrl" class="w-full h-full">
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
                        </div>

                        <div class="flex gap-4">
                            <label for="profile_picture_input"
                                class="cursor-pointer rounded-md bg-primary px-6 py-2 font-bold text-white hover:bg-[#1c16c6]">
                                Upload Image
                            </label>

                            <div x-cloak class="" x-show="uploadedImagePreviewBlobUrl">
                                <x-secondary-button type="button" x-on:click="file = null" x-on:click="resetForm">
                                    Delete Image
                                </x-secondary-button>
                            </div>

                            <div x-cloak class="" x-show="!uploadedImagePreviewBlobUrl">
                                @if ($profile_picture)
                                    <x-secondary-button type="button">
                                        Delete Image
                                    </x-secondary-button>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>

                <div class="flex justify-end">
                    <x-form.submit-button value="Save" class="basis-0 flex-shrink-0 flex-grow-0" />
                </div>
            </form>
        </div>
    </x-container>

</x-layout>
