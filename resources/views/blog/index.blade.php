<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-3 gap-4">
                @forelse($articles as $article)
                    <div class="max-w-sm rounded shadow-lg cursor-pointer border hover:border-indigo-500">
                        <a href="{{ route('blog.show', ['article' => $article ]) }}">
                            <img class="w-full object-cover" src="{{ $article->images->first()->path }}" alt="Sunset in the mountains" width="300" height="150">
                        </a>
                        <div class="px-6 py-4">
                            <div class="font-bold text-xl mb-2">{{ $article->title }}</div>
                            <p class="text-gray-700 text-base">{{ $article->description }}</p>
                        </div>
                        <div class="px-6 pt-4 pb-2">
                            @foreach($article->categories as $category)
                                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
                                {{ $category->name }}
                            </span>
                            @endforeach
                        </div>
                    </div>
                @empty
                    <p>il n'y pas d'articles</p>
                @endforelse
            </div>

            <div class="mt-4">
                {{ $articles->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
