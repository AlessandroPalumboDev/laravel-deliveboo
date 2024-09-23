<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreorderRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:50',
            'surname' => 'required|string|max:50',
            'email_address' => 'required|email|max:50',
            'delivery_address' => 'required|string|max:50',
            'delivery_time' => 'required||date_format:H:i',
            'total_price' => 'required|numeric|min:0',
            'note' => 'nullable|string',
            'plates' => 'required|array',
            'plates.*.plate_id' => 'required|exists:plates,id',
            'plates.*.quantity' => 'required|integer|min:1',
        ];
    }
}