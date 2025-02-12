<?php

namespace App\Models;

use App\Services\Glide\GlideService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'content',
        'published_at',
        'is_published',
    ];

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'is_published' => 'boolean',
    ];

    public function getFirstImage(int $width = 100, int $height = 100): string
    {
        return GlideService::getLinkImage($this->images->first()->path, $width, $height);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(Image::class);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }
}
