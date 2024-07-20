<div class="my-3">
    <form wire:submit.prevent="save" class="my-6">
        <div class="flex flex-col gap-2">
            <x-modules.form.input-label for="name" :value="__('Message :')"/>
            <x-modules.form.input-textaera wire:model="content" class="w-full mb-4" type="text"/>
            @error('content') <span class="error">{{ $message }}</span> @enderror
        </div>
        <x-modules.button.primary-button type="submit">Envoyer</x-modules.button.primary-button>
    </form>
</div>
