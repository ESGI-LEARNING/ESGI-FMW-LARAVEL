<?php

namespace App\Livewire\Admin\Categories\Modals;

use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use LivewireUI\Modal\ModalComponent;

class AdminModalCreateCategory extends ModalComponent
{
    #[Validate('required|min:3')]
    public string $name = '';

    public function create(): void
    {
        $this->validate();

        Category::create([
            'name' => $this->name,
            'slug' => Str::slug($this->name),
        ]);

        session()->flash('success', 'Categorie crée avec success');
        $this->dispatch('refresh-categories');
        $this->closeModal();
    }

    public function render(): View
    {
        return view('admin.categories.livewire.modals.admin-modal-create-category');
    }

    public static function modalMaxWidth(): string
    {
        return 'md';
    }
}
