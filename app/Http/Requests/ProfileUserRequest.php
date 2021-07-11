<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProfileUserRequest extends FormRequest
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
            'lastname' => 'required',
            'email' => 'required | email |max:255 | unique:users,email,' . Auth::user()->id,
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es requerido',
            'lastname.required' => 'El apellido es requerido',
            'email.required' => 'El email es requerido',
            'email.email' => 'El email no tiene el formato correcto',
            'email.unique' => 'El email ya existe',
            'email.max' => 'El email es muy largo',
        ];
    }
}
