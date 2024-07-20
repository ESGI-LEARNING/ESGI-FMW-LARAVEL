<?php

namespace App\Services\S3Service;

use Illuminate\Http\UploadedFile;

class S3Service
{
    public static function uploadFile(string $folder, UploadedFile $file): array
    {
        $path = [];

        foreach ($file as $image) {
            $pathname = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            $path[] = $image->storeAs($folder, $pathname, 's3');
        }

        return $path;
    }
}
