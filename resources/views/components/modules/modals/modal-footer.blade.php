<div class="flex items-center justify-end gap-2">
    <x-modules.button.secondary-button
        type="button"
        wire:click="$dispatch('closeModal')"
    >
        Annuler
    </x-modules.button.secondary-button>

    {{ $slot }}
</div>
