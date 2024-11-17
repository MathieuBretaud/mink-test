<?php

namespace App\Http\Controllers\Admin;

use App\Enums\StatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AnimalFormRequest;
use App\Models\Animal;
use App\Models\Breed;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AnimalController extends Controller
{

    public function index(): View
    {
        return view('admin.animals.index', [
            'animals' => Animal::with('type', 'breed') ->orderBy('created_at', 'desc')->paginate(25)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.animals.form', [
            'animal' => new Animal(),
            'statuses' => StatusEnum::cases(),
            'types' => Type::all(),
            'breeds' => Breed::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AnimalFormRequest $request): \Illuminate\Http\RedirectResponse
    {
//        dd($request->validated());
        $animal = Animal::create($request->validated());
        return to_route('admin.animal.index')->with('success', "L'animal a bien été créé");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
