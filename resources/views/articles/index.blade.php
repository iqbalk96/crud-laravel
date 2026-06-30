<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Articles') }}
            </h2>

            <a href="{{ route('articles.create') }}">
                <x-primary-button class="ms-3">
                    {{ __('Add Article') }}
                </x-primary-button>
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
            <div class="mb-4 p-4 rounded-lg bg-green-100 text-green-700">
                {{ session('success') }}
            </div>
            @endif

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Thumbnail
                                </th>

                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Title
                                </th>

                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Slug
                                </th>

                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Action
                                </th>
                            </tr>
                        </thead>

                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            @forelse($articles as $article)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($article->thumbnail)
                                    <img src="{{ asset('storage/' . $article->thumbnail) }}"
                                        alt="{{ $article->title }}"
                                        class="h-16 w-16 rounded object-cover">
                                    @else
                                    <span class="text-gray-400">No Image</span>
                                    @endif
                                </td>

                                <td class="px-6 py-4 text-gray-900 dark:text-gray-100">
                                    {{ $article->title }}
                                </td>

                                <td class="px-6 py-4 text-gray-500 dark:text-gray-300">
                                    {{ $article->slug }}
                                </td>

                                <td class="px-6 py-4 text-right">

                                    <x-dropdown align="right" width="48">
                                        <x-slot name="trigger">
                                            <button class="inline-flex items-center p-2 rounded-md text-gray-500 hover:text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="h-5 w-5"
                                                    fill="none"
                                                    viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M12 5h.01M12 12h.01M12 19h.01" />
                                                </svg>
                                            </button>
                                        </x-slot>

                                        <x-slot name="content">

                                            <x-dropdown-link :href="route('articles.show', $article)">
                                                Show
                                            </x-dropdown-link>

                                            <x-dropdown-link :href="route('articles.edit', $article)">
                                                Edit
                                            </x-dropdown-link>

                                            <form
                                                method="POST"
                                                action="{{ route('articles.destroy', $article) }}"
                                                onsubmit="return confirm('Delete this article?')">

                                                @csrf
                                                @method('DELETE')

                                                <x-dropdown-link
                                                    href="#"
                                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                                    Delete
                                                </x-dropdown-link>

                                            </form>

                                        </x-slot>
                                    </x-dropdown>

                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4"
                                    class="px-6 py-8 text-center text-gray-500 dark:text-gray-400">
                                    No articles found.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="p-4">
                    {{ $articles->links() }}
                </div>

            </div>
        </div>
    </div>

</x-app-layout>