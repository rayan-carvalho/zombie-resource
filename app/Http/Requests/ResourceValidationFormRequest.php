<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResourceValidationFormRequest extends FormRequest
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
            'name'           =>'required',
            'minimum'        =>"required|min:1",
            'description'    =>'nullable|min:5',
            'category_id'   =>'required',          
         ];

    }

    public function messages()
    {

        return [
                'name.required'             => 'O campo "Nome" é obrigatório.',
                'minimum.required'          => 'O campo "Estoque mínimo" é obrigatório.',
                'description.min'           => 'O campo "Descrição" requer no mínimo 5 caracteres.',
                'category_id.required'      => 'O campo "Categoria" é obrigatório.',
         
        ];
    }

}
