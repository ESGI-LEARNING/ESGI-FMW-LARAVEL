<?php

namespace App\Livewire\Admin\Categories\Modals;

use App\Models\Category;
use Illuminate\Contracts\View\View;
use LivewireUI\Modal\ModalComponent;

class AdminModalDeleteCategory extends ModalComponent
{
    public Category $category;

    public function mount(Category $category): void
    {
        $this->category = $category;
    }

    public function delete(): void
    {
        $this->category->delete();

        session()->flash('success', 'Categorie supprimée avec success');
        $this->dispatch('refresh-categories');
        $this->closeModal();
    }

    public function render(): View
    {
        return view('admin.categories.livewire.modals.admin-modal-delete-category');
    }
}
