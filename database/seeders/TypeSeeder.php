<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tag = collect(['chien', 'cheval', 'brebis', 'cochon']);
        $tag->map(fn ($tag) => Type::create([
            'name' => $tag,
        ]));
    }
}
