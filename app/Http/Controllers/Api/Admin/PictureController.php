<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PictureRequest;
use App\Http\Resources\AnimalResource;
use App\Http\Resources\PictureResource;
use App\Models\Animal;
use App\Models\Picture;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;

class PictureController extends Controller
{


    public function storePicturesByAnimal(PictureRequest $request, string $animalId): JsonResponse
    {
        /** @var Animal $animalFind */
        $animalFind = Animal::findOrFail($animalId);

        if ($request->hasFile('files')) {
            $animalFind->attachFiles($request->validated('files'));

            return response()->json($animalFind);
        }
        return response()->json(['error' => 'No files uploaded'], 400);
    }

    public function picturesByAnimal(string $animal): JsonResource
    {
        $animalWithPicture = Animal::with('pictures')->find($animal);
        return PictureResource::collection($animalWithPicture->pictures);
//        return response()->json($animalWithPicture->pictures);
    }

    public function delete(Picture $picture): Response
    {
        $picture->delete();
        return response()->noContent();
    }
}
