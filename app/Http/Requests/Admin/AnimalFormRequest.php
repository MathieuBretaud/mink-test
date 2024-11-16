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
            'name' => ['required', 'string', 'max:20'],
            'type' => ['required', 'exists:types,name'],
            'breed' => ['required', 'exists:breeds,name'],
            'age' => ['required', 'integer', 'min:1'],
            'description' => ['required', 'string', 'max:2000'],
            'price' => ['required', 'integer', 'min:1'],
            'status' => ['required', Rule::enum(StatusEnum::class)],

        ];
    }
}
