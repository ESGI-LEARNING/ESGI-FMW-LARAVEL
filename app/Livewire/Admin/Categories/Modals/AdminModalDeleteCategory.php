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
        $category = Category::query()->findOrFail($this->category->id);
        $category->delete();
        $this->dispatch('refresh-categories');
        $this->closeModal();
        $this->reset();
    }

    public function render(): View
    {
        return view('admin.categories.livewire.modals.admin-modal-delete-category');
    }
}
