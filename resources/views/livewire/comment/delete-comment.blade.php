<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <x-modules.modals.modal>
        <x-modules.modals.modal-body>
            <h1>Supprimer mon commentaire</h1>
        </x-modules.modals.modal-body>

        <x-modules.modals.modal-body>
            <p class="text-center">
                Êtes-vous sûr de vouloir supprimer ce commentaire ?
            </p>
        </x-modules.modals.modal-body>

        <x-modules.modals.modal-footer>
            <x-modules.button.danger-button
                type="button"
                wire:click.prevent="delete"
            >
                Supprimer
            </x-modules.button.danger-button>
        </x-modules.modals.modal-footer>
    </x-modules.modals.modal>
</div>
