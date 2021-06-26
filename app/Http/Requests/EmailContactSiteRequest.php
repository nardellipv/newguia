<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmailContactSiteRequest extends FormRequest
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
            'email' => 'required | email',
            'messageText' => 'required | min:10',
            'g-recaptcha-response' => 'recaptcha',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es requerido',
            'email.required' => 'El email es requerido',
            'email.email' => 'El email no es válido',
            'messageText.required' => 'El comentario es requerido',
            'messageText.min' => 'El comentario debe tener más de 10 caracteres',
            'g-recaptcha-response.recaptcha' => 'El captcha es necesario.'
        ];
    }
}
