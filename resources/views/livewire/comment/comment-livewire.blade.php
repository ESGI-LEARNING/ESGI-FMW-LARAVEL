<div class="mt-10">
    <h2 class="text-xl mb-2">{{ $comments->count() }} Commentaires :</h2>
    @auth
        @livewire('comment.modals.create-comment', ['article_id' => $article->id])
    @endauth
    <div class="max-w-full mx-auto">
        @foreach($comments as $comment)
            <div class="p-4 bg-white shadow sm:rounded-lg mb-4" wire:key="comment-{{ $comment->id }}">
                <div class="flex justify-between gap-8">
                    <div class="w-full flex justify-between flex-col">
                        <h3 class="font-semibold">{{ $comment->user->name }}</h3>
                        <div class="mt-1">
                            <span class="font-bold">{{ $comment->name }}</span>
                            <span class="text-gray-500">{{ $comment->email }}</span>
                        </div>
                        <div class="mt-2 flex-1">
                            <span>{{ $comment->content }}</span>
                        </div>
                        <div class="mt-2">
                            <span class="text-gray-500">{{ $comment->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                    <div class="flex justify-between gap-6 items-center">
                        <div class="flex flex-col gap-2 justify-items-center w-full">
                            @if($comment->user_id === auth()->id())
                                <x-modules.button.icon-button
                                    wire:click="$dispatch('openModal', { component: 'comment.modals.edit-comment', arguments: { comment: {{ $comment }} }})"
                                >
                                    <x-icons.icon-edit class="text-blue-500"/>
                                </x-modules.button.icon-button>
                                <x-modules.button.icon-button
                                    wire:click="$dispatch('openModal', { component: 'comment.modals.delete-comment', arguments: { comment: {{ $comment }} }})"
                                >
                                    <x-icons.icon-delete class="text-red-500"/>
                                </x-modules.button.icon-button>
                            @endif
                            @if($comment->user_id !== auth()->id())
                                <x-modules.button.icon-button
                                    wire:click="$dispatch('openModal', { component: 'comment.modals.answer-comment', arguments: { comment: {{ $comment }} }})"
                                >
                                    <x-icons.icon-reply class="text-blue-500"/>
                                </x-modules.button.icon-button>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="ml-8 mt-4">
                    @foreach($comment->replies->sortByDesc('created_at') as $reply)
                        <div class="p-4 bg-gray-100 shadow sm:rounded-lg mb-4 flex flex-row justify-between" wire:key="reply-{{ $reply->id }}">
                            <div class="flex justify-between gap-8 w-full">
                                <div class="w-full flex justify-between flex-col">
                                    <h3 class="font-semibold">{{ $reply->user->name }}</h3>
                                    <div class="mt-1">
                                        <span class="font-bold">{{ $reply->name }}</span>
                                        <span class="text-gray-500">{{ $reply->email }}</span>
                                    </div>
                                    <div class="mt-2 flex-1">
                                        <span>{{ $reply->content }}</span>
                                    </div>
                                    <div class="mt-2">
                                        <span class="text-gray-500">{{ $reply->created_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-between gap-6 items-center">
                                <div class="flex flex-col gap-2 justify-items-center w-full">
                                    @if($reply->user_id === auth()->id())
                                        <x-modules.button.icon-button
                                            wire:click="$dispatch('openModal', { component: 'comment.modals.edit-comment', arguments: { comment: {{ $reply }} }})"
                                        >
                                            <x-icons.icon-edit class="text-blue-500"/>
                                        </x-modules.button.icon-button>
                                        <x-modules.button.icon-button
                                            wire:click="$dispatch('openModal', { component: 'comment.modals.delete-comment', arguments: { comment: {{ $reply }} }})"
                                        >
                                            <x-icons.icon-delete class="text-red-500"/>
                                        </x-modules.button.icon-button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</div>
