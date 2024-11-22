<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\SearchAnimalRequest;
use App\Http\Resources\AnimalResource;
use App\Models\Animal;
use Illuminate\Http\Resources\Json\JsonResource;

class AnimalApiController
{
    public function __invoke(SearchAnimalRequest $request): JsonResource
    {
        $sortBy = $request->validated('orderBy');
        $direction = $request->validated('direction');
        $filterType = $request->validated('type');
        $filterBreed = $request->validated('breed');

        $query = Animal::query()->with(['type', 'breed', 'pictures'])
            ->sortByAndDirection($sortBy, $direction)
            ->when($filterType, function ($query) use ($filterType) {
                $query->where('animals.type_id', $filterType);
            })
            ->when($filterBreed, function ($query) use ($filterBreed) {
                $query->where('animals.breed_id', $filterBreed);
            });
        return AnimalResource::collection($query->get());
    }

}
