<div>
    <x-modules.modals.modal>
        <x-modules.modals.modal-body>
            <h1>Modifier mon utilisateur</h1>
        </x-modules.modals.modal-body>

        <x-modules.modals.modal-body>
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
                <x-modules.form.input-label for="roles" :value="__('input.label.roles')"/>
                <x-modules.form.select-input id="tom-select" wire:model.defer="user_roles" class="w-full" multiple>
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}"  @if(in_array($role->id, $user_roles)) selected @endif>{{ $role->name }}</option>
                    @endforeach
                </x-modules.form.select-input>
                <x-modules.form.input-error :messages="$errors->get('user_roles')" class="mt-2"/>
            </div>
        </x-modules.modals.modal-body>

        <x-modules.modals.modal-footer>
            <x-modules.button.primary-button
                type="button"
                wire:click.prevent="update"
            >
                Modifier
            </x-modules.button.primary-button>
        </x-modules.modals.modal-footer>
    </x-modules.modals.modal>
</div>
