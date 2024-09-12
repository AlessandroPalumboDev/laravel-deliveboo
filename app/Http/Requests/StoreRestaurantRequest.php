<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRestaurantRequest extends FormRequest
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
           'business_name' => 'required|string|max:70',
           'image_path' => 'file|image|max:2048', 
           'address' => 'string|max:255',
           'types'=> 'array',
        ];
    }

    public function messages(): array
    {
        return [
            'business_name.required' => 'Il nome del ristorante è obbligatorio!',
            'business_name.max' => 'Il nome del ristorante non può contenere più di 70 caratteri',
        ];
    }
}
