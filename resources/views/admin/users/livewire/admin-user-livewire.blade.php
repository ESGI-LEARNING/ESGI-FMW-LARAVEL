<div>
    <div class="mb-3">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-semibold text-gray-900">Users</h1>
            <x-modules.button.primary-button
                wire:click="$dispatch('openModal', { component: 'admin.users.modals.admin-modal-create-user' })"
            >
                Créer un utilisateur
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
                <th scope="col" class="px-6 py-3">Email</th>
                <th scope="col" class="px-6 py-3">Roles</th>
                <th scope="col" class="px-6 py-3">Création</th>
                <th scope="col" class="px-6 py-3">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr class="odd:bg-white even:bg-gray-100 border-b">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ $user->id }}
                    </th>
                    <td class="px-6 py-4">{{ $user->name }}</td>
                    <td class="px-6 py-4">{{ $user->email }} </td>
                    <td class="px-6 py-4">
                        @foreach($user->roles as $role)
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                {{ $role->name }}
                            </span>
                        @endforeach
                    </td>
                    <td class="px-6 py-4">{{ $user->created_at->format('d/m/Y')}}</td>
                    <td class="px-6 py-2">
                        <x-modules.button.icon-button
                            wire:click="$dispatch('openModal', { component: 'admin.users.modals.admin-modal-edit-user', arguments: { user: {{ $user }} }})"
                        >
                            <x-icons.icon-edit class="text-indigo-500"/>
                        </x-modules.button.icon-button>
                        <x-modules.button.icon-button
                            wire:click="$dispatch('openModal', { component: 'admin.users.modals.admin-modal-delete-user', arguments: { user: {{ $user }} }})"
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
        {{ $users->links() }}
    </div>
</div>
