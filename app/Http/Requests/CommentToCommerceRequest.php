<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentToCommerceRequest extends FormRequest
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
            'text-message' => 'required | min:5',
            'g-recaptcha-response' => 'recaptcha',
        ];
    }
    public function messages()
    {
        return [
            'text-message.required' => 'El mensaje es requerido',
            'text-message.min' => 'El mensaje debe ser más largo',
            'g-recaptcha-response.recaptcha' => 'El captcha es necesario.'
        ];
    }
}
