<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Article') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <form
                        action="{{ route('articles.store') }}"
                        method="POST"
                        enctype="multipart/form-data"
                        class="space-y-6"
                    >
                        @csrf

                        <!-- Title -->
                        <div>
                            <x-input-label for="title" :value="__('Title')" />

                            <x-text-input
                                id="title"
                                name="title"
                                type="text"
                                class="mt-1 block w-full"
                                :value="old('title')"
                                required
                                autofocus
                            />

                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        <!-- Thumbnail -->
                        <div>
                            <x-input-label for="thumbnail" :value="__('Thumbnail')" />

                            <input
                                id="thumbnail"
                                name="thumbnail"
                                type="file"
                                class="mt-1 block w-full text-sm
                                    text-gray-900 dark:text-gray-100
                                    file:mr-4 file:py-2 file:px-4
                                    file:rounded-md file:border-0
                                    file:text-sm file:font-semibold
                                    file:bg-indigo-50 file:text-indigo-700
                                    hover:file:bg-indigo-100"
                            />

                            <x-input-error :messages="$errors->get('thumbnail')" class="mt-2" />
                        </div>

                        <!-- Excerpt -->
                        <div>
                            <x-input-label for="excerpt" :value="__('Excerpt')" />

                            <textarea
                                id="excerpt"
                                name="excerpt"
                                rows="3"
                                class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            >{{ old('excerpt') }}</textarea>

                            <x-input-error :messages="$errors->get('excerpt')" class="mt-2" />
                        </div>

                        <!-- Content -->
                        <div>
                            <x-input-label for="content" :value="__('Content')" />

                            <textarea
                                id="content"
                                name="content"
                                rows="8"
                                class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                required
                            >{{ old('content') }}</textarea>

                            <x-input-error :messages="$errors->get('content')" class="mt-2" />
                        </div>

                        <!-- Actions -->
                        <div class="flex items-center justify-end gap-4">
                            <a
                                href="{{ route('articles.index') }}"
                                class="text-sm text-gray-600 dark:text-gray-400 hover:underline"
                            >
                                Cancel
                            </a>

                            <x-primary-button>
                                {{ __('Save Article') }}
                            </x-primary-button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>