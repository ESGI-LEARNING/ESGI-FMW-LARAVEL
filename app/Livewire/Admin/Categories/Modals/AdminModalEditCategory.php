<?php

namespace App\Livewire\Admin\Categories\Modals;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use LivewireUI\Modal\ModalComponent;

class AdminModalEditCategory extends ModalComponent
{
    public Category $category;

    #[Validate('required|min:3')]
    public string $name = '';

    public function mount(Category $category): void
    {
        $this->category = $category;
        $this->name     = $category->name;
    }

    public function update(): void
    {
        $this->validate();

        $this->category->update([
            'name' => $this->name,
            'slug' => Str::slug($this->name),
        ]);

        session()->flash('success', 'Categorie modifiée avec success');
        $this->dispatch('refresh-categories');
        $this->closeModal();
    }

    public function render(): View
    {
        return view('admin.categories.livewire.modals.admin-modal-edit-category');
    }

    public static function modalMaxWidth(): string
    {
        return 'md';
    }
}
