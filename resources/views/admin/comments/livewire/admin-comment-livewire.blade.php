<div>
    <div class="mb-3">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-semibold text-gray-900">Commentaires</h1>
        </div>
    </div>


    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mb-6">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-100">
            <tr>
                <th scope="col" class="px-6 py-3">Id</th>
                <th scope="col" class="px-6 py-3">Name</th>
                <th scope="col" class="px-6 py-3">Contenu</th>
                <th scope="col" class="px-6 py-3">Création</th>
                <th scope="col" class="px-6 py-3">Report</th>
                <th scope="col" class="px-6 py-3">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($comments as $comment)
                <tr class="odd:bg-white even:bg-gray-100 border-b">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ $comment->id }}
                    </th>
                    <td class="px-6 py-4">{{ $comment->user->name }}</td>
                    <td class="px-6 py-4">{{ Str::limit($comment->content) }} </td>
                    <td class="px-6 py-4">{{ $comment->created_at->format('d/m/Y')}}</td>
                    <td class="px-6 py-4">
                        @if($comment->is_reported)
                            <x-icons.icon-alert class="text-red-500"/>
                        @else
                            <x-icons.icon-alert class="text-green-500"/>
                        @endif
                    </td>
                    <td class="px-6 py-2">
                        <x-modules.button.icon-button
                            wire:click="$dispatch('openModal', { component: 'admin.comments.modals.admin-modal-report-comment', arguments: { comment: {{ $comment }} }})"
                        >
                            <x-icons.icon-alert class="text-indigo-500"/>
                        </x-modules.button.icon-button>
                        <x-modules.button.icon-button
                            wire:click="$dispatch('openModal', { component: 'admin.comments.modals.admin-modal-delete-comment', arguments: { comment: {{ $comment }} }})"
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
        {{ $comments->links() }}
    </div>
</div>
