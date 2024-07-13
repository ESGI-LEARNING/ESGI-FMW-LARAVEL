<div>
    <div class="mb-3">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-semibold text-gray-900">Catégories</h1>
            <x-modules.button.primary-button
                wire:click="$dispatch('openModal', { component: 'admin.categories.modals.admin-modal-create-category' })"
            >
                Créer une catégorie
            </x-modules.button.primary-button>
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
                <th scope="col" class="px-6 py-3">Création</th>
                <th scope="col" class="px-6 py-3">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr class="odd:bg-white even:bg-gray-100 border-b">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ $category->id }}
                    </th>
                    <td class="px-6 py-4">{{ $category->name }}</td>
                    <td class="px-6 py-4">{{ $category->created_at->format('d/m/Y')}}</td>
                    <td class="px-6 py-2">
                        <x-modules.button.icon-button
                            wire:click="$dispatch('openModal', { component: 'admin.categories.modals.admin-modal-edit-category', arguments: { category: {{ $category }} }})"
                        >
                            <x-icons.icon-edit class="text-indigo-500"/>
                        </x-modules.button.icon-button>
                        <x-modules.button.icon-button
                            wire:click="$dispatch('openModal', { component: 'admin.categories.modals.admin-modal-delete-category', arguments: { category: {{ $category }} }})"
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
        {{ $categories->links() }}
    </div>
</div>
