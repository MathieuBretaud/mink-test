<?php

namespace App\Models;

use App\QueryBuilders\AnimalQueryBuilder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\UploadedFile;

/**
 * @mixin IdeHelperAnimal
 */
class Animal extends Model
{
    protected $fillable = [
        'name',
        'age',
        'description',
        'price',
        'status',
        'type_id',
        'breed_id',
    ];


    public function newEloquentBuilder($query): AnimalQueryBuilder
    {
        return new AnimalQueryBuilder($query);
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }

    public function breed(): BelongsTo
    {
        return $this->belongsTo(Breed::class);
    }

    public function pictures(): HasMany
    {
        return $this->hasMany(Picture::class)->orderBy('created_at', 'desc');
    }

    /**
     * @param UploadedFile[] $files
     */
    public function attachFiles(array $files): void
    {
        $pictures = [];
        foreach($files as $file) {
            if ($file->getError()) {
                continue;
            }
            $filename = $file->store('animals/' . $this->id, 'public');
            $pictures[] = [
                'filename' => $filename
            ];
        }
        if (count($pictures) > 0) {
            $this->pictures()->createMany($pictures);
        }
    }

    //prix en centime

    protected function price(): Attribute
    {
        return Attribute::make(
            get: fn (?int $value) => $value / 100,
            set: fn (int $value) => (int) round($value * 100)
        );
    }

}
