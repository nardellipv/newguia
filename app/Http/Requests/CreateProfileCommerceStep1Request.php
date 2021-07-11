<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProfileCommerceStep1Request extends FormRequest
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
            'name' => 'required',
            'phone' => 'nullable | numeric ',
            'phoneWsp' => 'nullable | numeric ',
            'about' => 'required | min:10',            
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es requerido',
            'phone.numeric' => 'El teléfono debe ser un numérico',
            'phoneWsp.numeric' => 'El Whatsapp debe ser un numérico',
            'about.required' => 'Sobre nosotros es requerido',
            'about.min' => 'Sobre nosotros no debe ser tan corto',
        ];
    }
}
