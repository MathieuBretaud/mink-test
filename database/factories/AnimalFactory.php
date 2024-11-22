<?php

namespace Database\Factories;

use App\Enums\StatusEnum;
use App\Models\Breed;
use App\Models\Type;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Validation\Rules\Enum;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AnimalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type_id' => Type::inRandomOrder()->first()->id,
            'breed_id' => Breed::inRandomOrder()->first()->id,
            'name' => $this->faker->firstName(),
            'age' => $this->faker->randomDigit(),
            'description' => $this->faker->text(),
            'price' => $this->faker->randomDigit(),
            'status' => $this->faker->randomElement(StatusEnum::class)->value,

        ];
    }
}
