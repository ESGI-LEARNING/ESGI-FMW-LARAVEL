<?php

namespace App\Http\Controllers;

use App\Services\Glide\LaravelResponseFactory;
use App\Services\Glide\ServerFactory;
use Illuminate\Support\Facades\Storage;
use League\Glide\Signatures\SignatureException;
use League\Glide\Signatures\SignatureFactory;
use Symfony\Component\HttpFoundation\Request;

class ImageController extends Controller
{
    public function show(Request $request, string $path): mixed
    {
        try {
            SignatureFactory::create(config('glide.key'))->validateRequest($request->path(), $request->all());

            $server = ServerFactory::create([
                'source'            => Storage::disk('s3')->getDriver(),
                'cache'             => Storage::disk('local')->getDriver(),
                'driver'            => 'imagick',
                'cache_path_prefix' => '.cache',
                'response'          => new LaravelResponseFactory($request),
                'base_url'          => 'images',
            ]);

            return $server->getImageResponse($path, $request->all());
        } catch (SignatureException $e) {
            abort(403);
        }
    }
}
