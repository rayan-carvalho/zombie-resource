<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientValidationFormRequest extends FormRequest
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
            'name'           =>'required',
            'email'          =>"nullable|email",
            'phone'          =>'nullable|min:9|max:13',
            'mobile'         =>"required|min:10|max:15",
            'cep'            =>'required|min:9|max:10',
            'street'         =>'required',
            'number'         =>'required',
            'district'       =>'required',
            'city'           =>'required',
            'uf'             =>'required|min:2|max:2',
         ];

    }

    public function messages()
    {

        return [
                'name.required'     => 'O campo "Nome" é obrigatório.',
                'email.email'       => 'O campo "E-mail" é do tipo e-mail.',
                'email.unique'      => 'O e-mail informado no campo "E-mail" está em uso, ele deve ser único.',
                'phone.min'         => 'O campo "Telefone Fixo" requer no mínimo 9 caracteres.',
                'phone.max'         => 'O campo "Telefone Fixo" requer no máximo 13 caracteres.',
                'mobile.required'   => 'O campo "WhatsApp" é obrigatório.',
                'mobile.min'        => 'O campo "WhatsApp" requer no mínimo 10 caracteres.',
                'mobile.max'        => 'O campo "WhatsApp" requer no máximo 14 caracteres.',
                'mobile.unique'     => 'O número informado no campo "WhatsApp" está em uso, ele deve ser único.',
                'cep.required'      => 'O campo "CEP" é obrigatório.',
                'cep.min'           => 'O campo "CEP" requer no mínimo 9 caracteres.',
                'cep.max'           => 'O campo "CEP" requer no máximo 10 caracteres.',
                'street.required'   => 'O campo "Logradouro" é obrigatório.',
                'number.required'   => 'O campo "Número" é obrigatório.',
                'district.required' => 'O campo "Bairro" é obrigatório.',
                'city.required'     => 'O campo "Cidade" é obrigatório.',
                'uf.required'       => 'O campo "UF" é obrigatório.',
                'uf.min'            => 'O campo "UF" requer no mínimo 2 caracteres.',
                'uf.max'            => 'O campo "UF" requer no máximo 2 caracteres.',

        ];
    }

}
