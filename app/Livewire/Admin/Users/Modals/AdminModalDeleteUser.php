<?php

namespace App\Livewire\Admin\Users\Modals;

use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\View\View;
use LivewireUI\Modal\ModalComponent;

class AdminModalDeleteUser extends ModalComponent
{
    public User $user;

    public function mount(User $user): void
    {
        $this->user = $user;
    }

    public function delete(): void
    {
        $this->user->name       = 'guest';
        $this->user->deleted_at = Carbon::now();
        $this->user->save();

        $this->user->roles()->detach();

        $this->dispatch('refresh-users');

        $this->closeModal();
    }

    public function render(): View
    {
        return view('admin.users.livewire.modals.modal-admin-user-delete-livewire');
    }

    public static function modalMaxWidth(): string
    {
        return 'xl';
    }
}
