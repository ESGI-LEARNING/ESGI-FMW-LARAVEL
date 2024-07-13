<div>
    <x-modules.modals.modal>
        <x-modules.modals.modal-body>
            <h1>Créer une categorie</h1>
        </x-modules.modals.modal-body>

        <x-modules.modals.modal-body>
            <div>
                <x-modules.form.input-label for="name" value="Nom"/>
                <x-modules.form.text-input wire:model.defer="name" class="w-full" type="text"/>
                <x-modules.form.input-error :messages="$errors->get('name')" class="mt-2"/>
            </div>
        </x-modules.modals.modal-body>

        <x-modules.modals.modal-footer>
            <x-modules.button.primary-button
                type="button"
                wire:click.prevent="create"
            >
                Créer
            </x-modules.button.primary-button>
        </x-modules.modals.modal-footer>
    </x-modules.modals.modal>
</div>
