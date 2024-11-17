<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @mixin IdeHelperBreed
 */
class Breed extends Model
{
    protected $fillable = [
        'name',
    ];

    public function animals(): BelongsToMany
    {
        return $this->belongsToMany(Animal::class);
    }
}
