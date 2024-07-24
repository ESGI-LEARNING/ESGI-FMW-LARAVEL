<?php

namespace App\Models;

use App\Services\Glide\GlideService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'article_id',
        'path',
    ];

    public function getImage(int $width = 100, int $height = 100): string
    {
        return GlideService::getLinkImage($this->path, $width, $height);
    }

    public function article(): BelongsTo
    {
        return $this->belongsTo(Article::class);
    }
}
