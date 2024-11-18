<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Resources\AnimalResource;
use App\Models\Animal;
use App\Models\Type;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class AnimalApiController
{
    public function __invoke(Request $request)
    {
        $sortBy = $request->input('orderBy');
        $direction = $request->input('direction');

        $query = Animal::query()->with(['type', 'breed'])
            ->sortByAndDirection($sortBy, $direction);

//        if ($request->input('orderBy') === 'type') {
//            $query->orderBy(
//                Type::select('name')->whereColumn('id', 'animals.type_id'),
//                $request->input('direction')
//            );
//        } elseif ($request->input('orderBy')) {
//            $query->orderBy($request->input('orderBy'),
//                $request->input('direction')
//            );
//        }

        $animals = $query->paginate(25);
        return response()->json($animals);
//        return AnimalResource::collection($query->paginate(25));
    }

}
