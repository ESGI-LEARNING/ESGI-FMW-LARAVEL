<div>
    <x-modules.modals.modal>
        <x-modules.modals.modal-body>
            <h1>Créer un utilisateur</h1>
        </x-modules.modals.modal-body>

        <x-modules.modals.modal-body>
            <div class="grid grid-cols-2 gap-3">
                <div>
                    <x-modules.form.input-label for="name" value="Nom"/>
                    <x-modules.form.text-input wire:model.defer="name" class="w-full" type="text"/>
                    <x-modules.form.input-error :messages="$errors->get('name')" class="mt-2"/>
                </div>
                <div>
                    <x-modules.form.input-label for="email" value="Email"/>
                    <x-modules.form.text-input wire:model.defer="email" class="w-full" type="email"/>
                    <x-modules.form.input-error :messages="$errors->get('email')" class="mt-2"/>
                </div>
            </div>
            <div class="mt-3">
                <x-modules.form.input-label for="password" value="Mot de passe"/>
                <x-modules.form.text-input wire:model.defer="password" class="w-full" type="password"/>
                <x-modules.form.input-error :messages="$errors->get('password')" class="mt-2"/>
            </div>
            <div class="mt-3">
                <x-modules.form.input-label for="roles" value="Roles"/>
                <x-modules.form.select-input id="tom-select" wire:model.defer="user_roles" class="w-full" multiple>
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </x-modules.form.select-input>
                <x-modules.form.input-error :messages="$errors->get('user_roles')" class="mt-2"/>
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
