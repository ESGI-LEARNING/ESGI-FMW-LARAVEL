<?php

namespace App\Livewire\Admin\Users\Modals;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use LivewireUI\Modal\ModalComponent;

class AdminModalCreateUser extends ModalComponent
{
    #[Validate('required|min:3')]
    public string $name = '';

    #[Validate('required|email')]
    public string $email = '';

    #[Validate('required|min:6')]
    public string $password = '';

    #[Validate('required')]
    public array $user_roles = [];

    public Collection $roles;

    public function mount(): void
    {
        $this->roles = Role::all();
    }

    public function create(): void
    {
        $this->validate();

        $user           = new User();
        $user->name     = $this->name;
        $user->email    = $this->email;
        $user->password = Hash::make($this->password);
        $user->save();

        $user->roles()->attach($this->user_roles);

        session()->flash('success', 'Utilisateur créer avec success');
        $this->dispatch('refresh-users');
        $this->closeModal();
    }

    public function render(): View
    {
        return view('admin.users.livewire.modals.modal-admin-user-create-livewire');
    }

    public static function modalMaxWidth(): string
    {
        return '2xl';
    }
}
