<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Enums\StatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AnimalFormRequest;
use App\Models\Animal;
use App\Models\Breed;
use App\Models\Picture;
use App\Models\Type;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class AnimalController extends Controller
{

    /**
     * @throws AuthorizationException
     */
    public function index(): View
    {
        Gate::authorize('viewAny', Animal::class);
        return view('admin.animals.index', [
            'animals' => Animal::with('type', 'breed')->orderBy('created_at', 'desc')->paginate(25)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @throws AuthorizationException
     */
    public function create(): View
    {
        Gate::authorize('create', Animal::class);
        return view('admin.animals.form', [
            'animal' => new Animal(),
            'statuses' => StatusEnum::cases(),
            'types' => Type::all(),
            'breeds' => Breed::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @throws AuthorizationException
     */
    public function store(AnimalFormRequest $request): RedirectResponse
    {
        Gate::authorize('create', Animal::class);
        $animal = Animal::create($request->validated());
        if ($request->hasFile('picture')) {
            $animal->attachFiles($request->validated('pictures'));
        }
        return to_route('admin.animal.index')->with('success', "L'animal a bien été créé");
    }

    /**
     * Show the form for editing the specified resource.
     * @throws AuthorizationException
     */
    public function edit(Animal $animal): View
    {
        Gate::authorize('update', $animal);
        return view('admin.animals.form', [
            'animal' => $animal,
            'statuses' => StatusEnum::cases(),
            'types' => Type::all(),
            'breeds' => Breed::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @throws AuthorizationException
     */
    public function update(AnimalFormRequest $request, Animal $animal): RedirectResponse
    {
        Gate::authorize('update', $animal);
        $animal->update($request->validated());
        return to_route('admin.animal.index')->with('success', "L'animal a bien été modifié");
    }

    /**
     * Remove the specified resource from storage.
     * @throws AuthorizationException
     */
    public function destroy(Animal $animal): RedirectResponse
    {
        Gate::authorize('delete', $animal);
        Picture::destroy($animal->pictures()->pluck('id'));
        $animal->delete();
        return to_route('admin.animal.index')->with('success', "L'animal a bien été supprimé");
    }
}
