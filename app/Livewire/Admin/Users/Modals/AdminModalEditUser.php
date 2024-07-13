<?php

namespace App\Livewire\Admin\Users\Modals;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;
use LivewireUI\Modal\ModalComponent;

class AdminModalEditUser extends ModalComponent
{
    public User $user;

    public Collection $roles;

    public array $user_roles = [];

    public function mount(User $user): void
    {
        $this->user         = $user;
        $this->user_roles   = $user->roles->pluck('id')->toArray();

        $this->roles = Role::all();
    }

    public function update(): void
    {
        $this->validate([
            'user.name' => 'required|string',
            'user.email' => 'required|email',
            'user_roles' => 'required',
        ]);

        $this->user->save();
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
