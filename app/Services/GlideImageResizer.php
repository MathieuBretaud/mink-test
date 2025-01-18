<?php

namespace App\Services;

use App\Contracts\ImageResizerInterface;
use App\DataTransfertObjects\ResizeOptions;
use Illuminate\Support\Facades\Storage;
use League\Glide\Urls\UrlBuilderFactory;

class GlideImageResizer implements ImageResizerInterface
{

    public function resize(ResizeOptions $options): string
    {
        if ($options->getWidth() === null) {
            return Storage::disk('public')->url($options->getFilename());
        }
        $urlBuilder = UrlBuilderFactory::create('/images/', config('glide.key'));
        return $urlBuilder->getUrl($options->getFilename(), ['w' => $options->getWidth(), 'h' => $options->getHeight(), 'fit' => 'crop']);
    }
}
