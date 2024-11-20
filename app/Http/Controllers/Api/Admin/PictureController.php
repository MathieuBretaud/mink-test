<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PictureRequest;
use App\Models\Animal;
use App\Models\Picture;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class PictureController extends Controller
{


    public function storePicturesByAnimal(Request $request, string $animalId): \Illuminate\Http\JsonResponse
    {
//        $validatedData = $request->validate([
//            'pictures.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Ajustez selon vos besoins
//        ]);

        /** @var Animal $animalFind */
        $animalFind = Animal::findOrFail($animalId);

        if ($request->hasFile('file')) {
            $filename = $request->file('file')->store('animals/' . $animalId, 'public');

            $animalFind->pictures()->create([
                'filename' => $filename]);

        return response()->json($filename);
        }
        return response()->json();
    }

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
