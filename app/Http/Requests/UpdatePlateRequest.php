<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePlateRequest extends FormRequest
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
           'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'ingredients' => 'required|string',
        'price' => 'required|numeric|min:0',
        'is_visible' => 'nullable|boolean',
        'is_vegetarian' => 'nullable|boolean',
        'is_vegan' => 'nullable|boolean',
        'is_gluten_free' => 'nullable|boolean',
        'is_lactose_free' => 'nullable|boolean',
        'is_spicy' => 'nullable|boolean',
        'cover_image' => 'nullable|image|max:2048',
        'slug' => 'nullable|unique:plates:slug',
        ];
    }
}
