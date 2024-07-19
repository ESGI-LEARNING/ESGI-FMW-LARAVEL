<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <form wire:submit.prevent="delete">
        <div class="mt-3">
            <x-modules.button.primary-button
                type="submit"
            >
                Supprimer
            </x-modules.button.primary-button>
        </div>
    </form>
</div>
