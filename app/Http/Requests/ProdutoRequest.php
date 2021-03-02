<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoRequest extends FormRequest
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
            'nome' => 'required|max:100',
            'descricao' => 'nullable',
            'preco' => 'required|numeric|min:100'
        ];
    }

    public function messages()
    {
        return [
            '*.required' => 'O campo :attribute é obrigatório',
            'nome.max' => 'O :attribute deve conter no máximo :max caracteres.',
            'preco.min' => 'O :attribute deve ser maior do que :min.',
            'preco.numeric' => 'O :attribute deve ser um valor numérico.',
        ];
    }

    public function attributes()
    {
        return [
            'nome' => 'Nome',
            'descricao' => 'Descrição',
            'preco' => 'Preço',

        ];
    }
}
