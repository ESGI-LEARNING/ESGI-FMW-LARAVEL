<?php

namespace App\Livewire\Admin\Categories;

use App\Models\Category;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class AdminCategoryLivewire extends Component
{
    use WithPagination;

    #[Url(history: true)]
    public string $search = '';

    #[On('refresh-categories')]
    public function refresh(): void
    {
        $this->render();
    }

    public function render(): View
    {
        $categories = Category::query()
            ->where(function ($query) {
                $query->where('name', 'like', '%'.$this->search.'%');
            })
            ->paginate(10);

        return view('admin.categories.livewire.admin-category-livewire', compact('categories'));
    }
}
