<?php

namespace App\Livewire\Admin\Articles\Modals;

use App\Models\Article;
use Illuminate\Contracts\View\View;
use LivewireUI\Modal\ModalComponent;

class AdminModalDeleteArticle extends ModalComponent
{
    public string $slug;

    public function mount(string $slug): void
    {
        $this->slug = $slug;
    }

    public function delete(): void
    {
        $article = Article::query()->where('slug', $this->slug)->first();

        if ($article) {
            $article->delete();
        }

        $this->dispatch('refresh-articles');
        $this->closeModal();
    }

    public function render(): View
    {
        return view('admin.articles.livewire.modals.admin-modal-delete-article');
    }
}
