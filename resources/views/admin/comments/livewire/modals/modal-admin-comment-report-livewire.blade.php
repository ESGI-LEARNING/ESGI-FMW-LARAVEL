<div>
    <x-modules.modals.modal>
        <x-modules.modals.modal-body>
            <h1>Reporter le message</h1>
        </x-modules.modals.modal-body>

        <x-modules.modals.modal-body>
            <p class="text-center">
                Êtes-vous sûr de vouloir reporter ce commentaire ?
            </p>
        </x-modules.modals.modal-body>

        <x-modules.modals.modal-footer>
            <x-modules.button.danger-button
                type="button"
                wire:click.prevent="report"
            >
                Reporter
            </x-modules.button.danger-button>
        </x-modules.modals.modal-footer>
    </x-modules.modals.modal>
</div>

