<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Article Detail') }}
            </h2>

            <a
                href="{{ route('articles.edit', $article) }}"
                class="inline-flex items-center px-4 py-2 bg-yellow-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-600 transition"
            >
                Edit Article
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 space-y-6 text-gray-900 dark:text-gray-100">

                    <!-- Title -->
                    <div>
                        <x-input-label :value="__('Title')" />

                        <div class="mt-2">
                            {{ $article->title }}
                        </div>
                    </div>

                    <!-- Thumbnail -->
                    @if ($article->thumbnail)
                        <div>
                            <x-input-label :value="__('Thumbnail')" />

                            <img
                                src="{{ asset('storage/' . $article->thumbnail) }}"
                                alt="{{ $article->title }}"
                                class="mt-2 rounded-lg border border-gray-300 dark:border-gray-700 max-h-72"
                            >
                        </div>
                    @endif

                    <!-- Excerpt -->
                    <div>
                        <x-input-label :value="__('Excerpt')" />

                        <div class="mt-2 whitespace-pre-line">
                            {{ $article->excerpt ?: '-' }}
                        </div>
                    </div>

                    <!-- Content -->
                    <div>
                        <x-input-label :value="__('Content')" />

                        <div class="mt-2">
                            {!! nl2br(e($article->content)) !!}
                        </div>
                    </div>

                    <!-- Metadata -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <x-input-label :value="__('Created At')" />

                            <div class="mt-2">
                                {{ $article->created_at->format('d M Y H:i') }}
                            </div>
                        </div>

                        <div>
                            <x-input-label :value="__('Updated At')" />

                            <div class="mt-2">
                                {{ $article->updated_at->format('d M Y H:i') }}
                            </div>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="flex justify-end gap-4">
                        <a
                            href="{{ route('articles.index') }}"
                            class="text-sm text-gray-600 dark:text-gray-400 hover:underline"
                        >
                            Back
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>