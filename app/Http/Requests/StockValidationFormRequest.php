<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StockValidationFormRequest extends FormRequest
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
        $id = request()->get("id");
        return [
            'resource_id'    =>'required',
            'amount'         =>'required|gt:0',       
         ];

    }

    public function messages()
    {

        return [
                'resource_id.required'    => 'O campo "Recurso" é obrigatório.',
                'amount.required'         => 'O campo "Quantidade" é obrigatório.',
                'amount.gt'              => 'O campo "Quantidade" deve ser maior que 0.',
                
        ];
    }

}
