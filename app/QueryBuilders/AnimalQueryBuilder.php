<?php
declare(strict_types=1);

namespace App\QueryBuilders;

use App\Models\Breed;
use App\Models\Type;
use Illuminate\Database\Eloquent\Builder;

class AnimalQueryBuilder extends Builder
{

    public function sortByAndDirection(?string $sortBy, ?string $direction): self
    {
        if ($sortBy === 'type') {
            $this->query->orderBy(
                Type::select('name')->whereColumn('id', 'animals.type_id'),
                $direction
            );
        } elseif ($sortBy === 'breed') {
            $this->query->orderBy(
                Breed::select('name')->whereColumn('id', 'animals.breed_id'),
                $direction
            );
        } elseif ($sortBy) {
            $this->query->orderBy($sortBy,
                $direction
            );
        }
        return $this;
    }

}
