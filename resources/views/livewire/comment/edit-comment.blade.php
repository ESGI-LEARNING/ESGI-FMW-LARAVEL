<div>
    {{-- Success is as dangerous as failure. --}}
    <form wire:submit.prevent="update">
        <div class="mt-3">
            <x-modules.form.input-label for="content" :value="__('input.label.content')"/>
            <x-modules.form.text-input wire:model.defer="content" class="w-full" type="text"/>
            <x-modules.form.input-error :messages="$errors->get('content')" class="mt-2"/>
        </div>
        <div class="mt-3">
            <x-modules.button.primary-button
                type="submit"
            >
                Modifier
            </x-modules.button.primary-button>
        </div>
    </form>
</div>
