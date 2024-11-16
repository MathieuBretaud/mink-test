<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperBreed
 */
class Breed extends Model
{
    protected $fillable = [
        'name',
    ];
}
