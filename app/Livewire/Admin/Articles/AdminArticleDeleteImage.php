<?php

namespace App\Livewire\Admin\Articles;

use App\Models\Image;
use App\Services\S3Service\S3Service;
use Illuminate\View\View;
use Livewire\Component;

class AdminArticleDeleteImage extends Component
{
    public int $imageId;
    public string $slug;

    public function mount(int $id, string $slug): void
    {
        $this->imageId = $id;
        $this->slug = $slug;
    }

    public function deleteImage(): void
    {
        $image = Image::query()->findOrFail($this->imageId);

        if ($image) {
            S3Service::deleteFile($image->path);
            $image->delete();
        }

        $this->redirect(route('admin.articles.edit', ['slug' => $this->slug]));
    }

    public function render(): View
    {
        return view('admin.articles.livewire.admin-article-delete-image');
    }
}
