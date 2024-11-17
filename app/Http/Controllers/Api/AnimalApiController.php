<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Resources\AnimalResource;
use App\Models\Animal;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class AnimalApiController
{
    public function __invoke(): AnonymousResourceCollection
    {
        $animals = Animal::with('type', 'breed')->orderBy('created_at', 'desc')->paginate(25);
        return AnimalResource::collection($animals);
    }

}
