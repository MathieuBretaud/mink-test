<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\BreedResource;
use App\Models\Breed;
use Illuminate\Http\Resources\Json\JsonResource;

class BreedController extends Controller
{
    public function __invoke(): JsonResource
    {
        return BreedResource::collection(Breed::orderBy('name')->get());
    }
}
