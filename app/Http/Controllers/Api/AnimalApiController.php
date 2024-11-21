<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Resources\AnimalResource;
use App\Models\Animal;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AnimalApiController
{
    public function __invoke(Request $request): JsonResource
    {
        $sortBy = $request->get('orderBy');
        $direction = $request->get('direction');
        $filterType = $request->get('type');
        $filterBreed = $request->get('breed');

        $query = Animal::query()->with(['type', 'breed', 'pictures'])
            ->sortByAndDirection($sortBy, $direction)
            ->when($filterType, function ($query) use ($filterType) {
                $query->where('animals.type_id', $filterType);
            })
            ->when($filterBreed, function ($query) use ($filterBreed) {
                $query->where('animals.breed_id', $filterBreed);
            });
        return AnimalResource::collection($query->paginate(25));
    }

}
