<?php

namespace App\Livewire\Admin\Users\Modals;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use LivewireUI\Modal\ModalComponent;

class AdminModalEditUser extends ModalComponent
{
    public User $user;

    #[Validate('required|min:3')]
    public string $name = '';

    #[Validate('required|email')]
    public string $email = '';

    public Collection $roles;

    public array $user_roles = [];

    public function mount(User $user): void
    {
        $this->user         = $user;
        $this->name         = $user->name;
        $this->email        = $user->email;
        $this->user_roles   = $user->roles->pluck('id')->toArray();

        $this->roles = Role::all();
    }

    public function update(): void
    {
        $this->validate();

        $this->user->update([
            'name'  => $this->name,
            'email' => $this->email,
        ]);

        $this->user->roles()->sync($this->user_roles);

        session()->flash('success', 'Utilisateur modifier avec success');
        $this->dispatch('refresh-users');
        $this->closeModal();
    }

    public function render(): View
    {
        return view('admin.users.livewire.modals.modal-admin-user-update-livewire');
    }

    public static function modalMaxWidth(): string
    {
        return '2xl';
    }
}
