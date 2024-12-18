<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShowDeliveryRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'weight' => ['required', 'numeric', 'min:1', 'max:99.99'],
            'destination' => ['required', 'numeric'],
        ];
    }
}
