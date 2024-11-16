<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperType
 */
class Type extends Model
{
    protected $fillable = [
        'name',
    ];
}
