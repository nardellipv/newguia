<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProfileCommerceStep2Request extends FormRequest
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
            'province_id' => 'required',
            'region_id' => 'required',
            'address' => 'nullable | min:5'
        ];
    }

    public function messages()
    {
        return [
            'province.required' => 'La provincia es requerida',
            'region.required' => 'La ciudad es requerida',
            'address.min' => 'Debe poner una dirección real',
        ];
    }
}
