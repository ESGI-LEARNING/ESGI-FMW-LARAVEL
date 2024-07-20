<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <x-modules.modals.modal>
        <x-modules.modals.modal-body>
            <h1 class="text-xl font-semibold">Répondre à un commentaire</h1>
        </x-modules.modals.modal-body>
        <form wire:submit.prevent="reply">
            <div class="mt-3">
                <x-modules.form.input-label for="content" :value="__('contenu')"/>
                <x-modules.form.input-textaera wire:model.defer="content" class="w-full" type="text"/>
                <x-modules.form.input-error :messages="$errors->get('content')" class="mt-2"/>
            </div>
            <div class="mt-3">
                <x-modules.button.primary-button
                    type="submit"
                >
                    Répondre
                </x-modules.button.primary-button>
            </div>
        </form>
    </x-modules.modals.modal>

</div>
