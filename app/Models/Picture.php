<?php

namespace App\Models;

use App\Contracts\ImageResizerInterface;
use App\DataTransfertObjects\ResizeOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use League\Glide\Urls\UrlBuilderFactory;

/**
 * @mixin IdeHelperPicture
 */
class Picture extends Model
{
    protected $fillable = [
        'filename',
    ];

    protected static function booted(): void
    {
        static::deleting(function (Picture $picture) {
            Storage::disk('public')->delete($picture->filename);
        });
    }

    public function getImageUrl(?int $width = null, ?int $height = null): string
    {
        $resizer = app(ImageResizerInterface::class);
        $options = new ResizeOptions($this->filename, $width, $height);
        return $resizer->resize($options);
    }
}
