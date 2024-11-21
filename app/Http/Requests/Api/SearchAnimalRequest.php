<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class SearchAnimalRequest extends FormRequest
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
            'orderBy' => ['string', 'nullable'],
            'direction' => ['string', 'nullable'],
            'type' => ['integer', 'gte:0', 'nullable'],
            'breed' => ['integer', 'gte:0', 'nullable'],
        ];
    }
}
