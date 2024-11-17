<?php
declare(strict_types=1);

use function Pest\Laravel\post;

it('can create a animal', function () {
    $animal = new \App\Models\Animal([
        'name' => 'test 1',
        'age' => 2,
        'description' => 'test 1 description',
        'price' => 100,
        'status' => 'for_sale',
        'type_id' => 1,
        'breed_id' => 1,

    ]);
    expect($animal->name)->toBe('test 1')
        ->and($animal->price)->toBe(100);
});
