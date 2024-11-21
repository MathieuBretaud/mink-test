<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AnimalResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $TVA = 0.20; // Taux de TVA de 20%
        $priceWithVat = $this->price * (1 + $TVA); // Calcul du prix avec TVA

        return [
            'id' => $this->id,
            'name' => $this->name,
            'age' => $this->age,
            'description' => $this->description,
            'price' => round($priceWithVat, 2),
            'type' => new TypeResource($this->type),
            'breed' => new BreedResource($this->breed),
            'pictures' => PictureResource::collection($this->pictures)
        ];
    }
}
