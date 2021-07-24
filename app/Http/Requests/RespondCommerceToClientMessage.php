<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RespondCommerceToClientMessage extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'description' => 'required|min:10',
        ];
    }

    public function messages()
    {
        return [
            'description.required' => 'El mensaje es requerida',
            'description.min' => 'El mensaje debe tener más de 10 caracteres',
        ];
    }
}
