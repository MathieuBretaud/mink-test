<?php

namespace App\Http\Controllers\Admin;

use App\Enums\StatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AnimalFormRequest;
use App\Models\Animal;
use App\Models\Breed;
use App\Models\Picture;
use App\Models\Type;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AnimalController extends Controller
{

    public function index(): View
    {
        return view('admin.animals.index', [
            'animals' => Animal::with('type', 'breed')->orderBy('created_at', 'desc')->paginate(25)
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
    public function store(AnimalFormRequest $request): RedirectResponse
    {
        $animal = Animal::create($request->validated());
        $animal->attachFiles($request->validated('pictures'));
        return to_route('admin.animal.index')->with('success', "L'animal a bien été créé");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Animal $animal): View
    {
        return view('admin.animals.form', [
            'animal' => $animal,
            'statuses' => StatusEnum::cases(),
            'types' => Type::all(),
            'breeds' => Breed::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AnimalFormRequest $request, Animal $animal): RedirectResponse
    {
        $animal->update($request->validated());
        return to_route('admin.animal.index')->with('success', "L'animal a bien été modifié");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Animal $animal): RedirectResponse
    {
        Picture::destroy($animal->pictures()->pluck('id'));
        $animal->delete();
        return to_route('admin.animal.index')->with('success', "L'animal a bien été supprimé");
    }
}
