<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }

    public function breed(): BelongsTo
    {
        return $this->belongsTo(Breed::class);
    }

    protected function price(): Attribute
    {
        return Attribute::make(
            get: fn (?int $value) => $value / 100,
            set: fn (int $value) => (int) round($value * 100)
        );
    }

}
