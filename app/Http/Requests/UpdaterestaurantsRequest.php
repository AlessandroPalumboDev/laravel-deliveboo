<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdaterestaurantsRequest extends FormRequest
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
            'business_name' => 'nullable|string|max:70',
            'image_path' => 'file|image|max:2048',
            'address' => 'nullable|string|max:255',
            
            // Assicurati che almeno una tipologia sia selezionata
            'types' => 'required|array|min:1',
        ];
    }

    public function messages(): array
    {
        return [
            'business_name.max' => 'Il nome del ristorante non può contenere più di 70 caratteri',
            
            // Messaggio di errore per la validazione delle tipologie
            'types.required' => 'Devi selezionare almeno una tipologia di ristorante.',
            'types.min' => 'Devi selezionare almeno una tipologia di ristorante.',
        ];
    }
}
