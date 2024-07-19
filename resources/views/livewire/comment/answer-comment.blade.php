<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <form wire:submit.prevent="answerComment">
        <div class="grid grid-cols-2 gap-3">
            <div>
                <x-modules.form.input-label for="name" :value="__('input.label.name')"/>
                <x-modules.form.text-input wire:model.defer="name" class="w-full" type="text"/>
                <x-modules.form.input-error :messages="$errors->get('name')" class="mt-2"/>
            </div>
            <div>
                <x-modules.form.input-label for="email" :value="__('input.label.email')"/>
                <x-modules.form.text-input wire:model.defer="email" class="w-full" type="email"/>
                <x-modules.form.input-error :messages="$errors->get('email')" class="mt-2"/>
            </div>
        </div>
        <div class="mt-3">
            <x-modules.form.input-label for="content" :value="__('input.label.content')"/>
            <x-modules.form.text-input wire:model.defer="content" class="w-full" type="text"/>
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
</div>
