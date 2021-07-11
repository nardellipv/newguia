<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecipesClientCreateRequest extends FormRequest
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
            'name' => 'required|max:100',
            'photo' => 'mimes:jpeg,jpg,png,gif|max:1000',
            'ingredients' => 'required|min:10',
            'steps' => 'required|min:10',
            'category_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es requerido',
            'name.max' => 'El nombre no debe ser tan largo',
            'ingredients.required' => 'Los ingredientes son requeridos',
            'ingredients.min' => 'Los ingredientes no debe ser tan cortos',
            'steps.required' => 'Los pasos es requerido',
            'steps.min' => 'Los pasos no debe ser tan cortos',
            'photo.max' => 'La foto debe ser menor a 1MB',
            'category_id.required' => 'La categoria es requerido',
        ];
    }
}
