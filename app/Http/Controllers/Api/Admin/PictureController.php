<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use App\Models\Picture;
use Illuminate\Http\Response;

class PictureController extends Controller
{

    public function picturesByAnimal(string $animal): \Illuminate\Http\JsonResponse
    {
        $animalWithPicture = Animal::with('pictures')->find($animal);
        return response()->json($animalWithPicture->pictures);
    }

    public function delete(Picture $picture): Response
    {
        $picture->delete();
        return response()->noContent();
    }
}
