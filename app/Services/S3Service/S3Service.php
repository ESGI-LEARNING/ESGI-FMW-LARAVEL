<?php

namespace App\Services\S3Service;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class S3Service
{
    public static function uploadFile(string $folder, UploadedFile|array $file): array
    {
        $path = [];

        foreach ($file as $image) {
            $pathname = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            $path[]   = Storage::disk('s3')->putFileAs($folder, $image, $pathname.'.'.$image->getClientOriginalExtension());
        }

        return $path;
    }

    public static function deleteFile(string $path): void
    {
        Storage::disk('s3')->delete($path);
    }
}
