<?php

namespace App\Http\Requests\Admin;

use App\Enums\StatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AnimalFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['string', 'max:20'],
            'type_id' => ['required', 'exists:types,id'],
            'breed_id' => ['required', 'exists:breeds,id'],
            'age' => ['integer', 'min:1', 'max:2000'],
            'description' => ['string', 'min:1', 'max:2000'],
            'price' => ['integer', 'min:1'],
            'status' => [Rule::enum(StatusEnum::class)],

        ];
    }
}
