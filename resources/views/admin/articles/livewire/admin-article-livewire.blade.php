<div>
    <div class="mb-3">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-semibold text-gray-900">Articles</h1>
            <x-modules.cta.primary-cta
                type="button"
                href="{{ route('admin.articles.create') }}"
            >
                Créer un article
            </x-modules.cta.primary-cta>
        </div>
    </div>

    <div class="mb-6 flex justify-end">
        <input
            type="text"
            wire:model.live="search"
            class="w-1/4 px-4 py-2 border border-indigo-300 rounded"
            placeholder="Rechercher...."
        >
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-100">
            <tr>
                <th scope="col" class="px-6 py-3">Id</th>
                <th scope="col" class="px-6 py-3">Name</th>
                <th scope="col" class="px-6 py-3">description</th>
                <th scope="col" class="px-6 py-3">Status</th>
                <th scope="col" class="px-6 py-3">Création</th>
                <th scope="col" class="px-6 py-3">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($articles as $article)
                <tr class="odd:bg-white even:bg-gray-100 border-b">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ $article->id }}
                    </th>
                    <td class="px-6 py-4">{{ \Illuminate\Support\Str::limit($article->title, 10) }} </td>
                    <td class="px-6 py-4">{{ \Illuminate\Support\Str::limit($article->description, 30) }} </td>
                    <td class="px-6 py-4">
                        <span
                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            Actif
                        </span>
                    </td>
                    <td class="px-6 py-4">{{ $article->created_at->format('d/m/Y')}}</td>
                    <td class="px-6 py-2">
                        <x-modules.cta.icon-cta
                            href="{{ route('admin.articles.edit', ['slug' => $article->slug]) }}"
                        >
                            <x-icons.icon-edit class="text-indigo-500"/>
                        </x-modules.cta.icon-cta>
                        <x-modules.button.icon-button
                            wire:click="$dispatch('openModal', { component: 'admin.articles.modals.admin-modal-delete-article', arguments: { slug: '{{ $article->slug }}' }})"
                        >
                            <x-icons.icon-delete class="text-red-500"/>
                        </x-modules.button.icon-button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div>
        {{ $articles->links() }}
    </div>
</div>

