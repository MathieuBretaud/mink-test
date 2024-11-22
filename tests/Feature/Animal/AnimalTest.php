<?php

use App\Models\Animal;
use App\Models\User;
use function Pest\Laravel\{actingAs, get, post, assertDatabaseHas, assertDatabaseMissing};

it('can create an animal', function () {
    $animal = new Animal([
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

it('cannot create an animal when user is not authenticated', function () {
    actingAs(User::factory()->create())->post('admin/animal', [
        'name' => 'test 1',
        'age' => 2,
        'description' => 'test 1 description',
        'price' => 100,
        'status' => 'for_sale',
        'type_id' => 1,
        'breed_id' => 1,
    ])->assertForbidden();
});

it('cannot create an animal when user is authenticated', function () {
    $response = actingAs(User::factory()->create())
        ->post('admin/animal', [
            'name' => 'test 1',
            'age' => 2,
            'description' => 'test 1 description',
            'price' => 100,
            'status' => 'for_sale',
            'type_id' => 1,
            'breed_id' => 1,
        ])->assertForbidden();
});

it('can create an animal when user is authenticated ans is admin', function () {
    $response = actingAs(User::factory()->state(['is_admin' => true])->create())
        ->post('admin/animal', [
            'name' => 'test 1',
            'age' => 2,
            'description' => 'test 1 description',
            'price' => 100,
            'status' => 'for_sale',
            'type_id' => 1,
            'breed_id' => 1,
        ])->assertRedirect(route('admin.animal.index'));
    assertDatabaseHas('animals', ['name' => 'test 1']);
});
