<?php

namespace Database\Seeders;

use App\Models\Breed;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BreedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tag = collect(['labrador', 'frison', 'irish cob', 'mérinos', 'solognotes']);
        $tag->map(fn ($tag) => Breed::create([
            'name' => $tag,
        ]));
    }
}
