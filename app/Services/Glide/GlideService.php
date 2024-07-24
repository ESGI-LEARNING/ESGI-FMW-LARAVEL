<?php

namespace App\Services\Glide;

use League\Glide\Urls\UrlBuilderFactory;

class GlideService
{
    public static function getLinkImage(string $image, ?int $width = null, ?int $height = null): string
    {
        $urlBuilder = UrlBuilderFactory::create('/images/', config('glide.key'));
        return $urlBuilder->getUrl($image, ['w' => $width, 'h' => $height, 'fit' => 'crop']);
    }
}
