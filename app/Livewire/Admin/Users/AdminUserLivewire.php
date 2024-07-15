<?php

namespace App\Livewire\Admin\Users;

use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class AdminUserLivewire extends Component
{
    use WithPagination;

    #[Url(history: true)]
    public string $search = '';

    #[On('refresh-users')]
    public function refresh(): void
    {
        $this->render();
    }

    public function render(): Factory|Application|View
    {
        $users = User::query()
            ->with('roles')
            ->where(function ($query) {
                if ($this->search) {
                    $query->where('name', 'like', '%'.$this->search.'%')
                        ->orWhere('email', 'like', '%'.$this->search.'%');
                }
            })
            ->paginate(10);

        return view('admin.users.livewire.admin-user-livewire', compact('users'));
    }
}
