<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePlateRequest extends FormRequest
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
            'name'=>'string|required',
            'price'=>'string',
            'cover_image' => 'file|image|max:2048', 
            'description'=>'string|nullable',
            'ingredients'=>'string', 
            'is_visible'=>'boolean',
            'is_vegetarian'=>'boolean',
            'is_vegan'=>'boolean',
            'is_gluten_free'=>'boolean',
            'is_lactose_free'=>'boolean',
            'is_spicy'=>'boolean',
            'slug' => 'nullable|unique:plates:slug',
        ];
    }
}

