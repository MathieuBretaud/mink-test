<?php
declare(strict_types=1);
namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\TypeResource;
use App\Models\Type;
use Illuminate\Http\Resources\Json\JsonResource;

class TypeController extends Controller
{
    public function __invoke(): JsonResource
    {
        return TypeResource::collection(Type::orderBy('name')->get());
    }
}
