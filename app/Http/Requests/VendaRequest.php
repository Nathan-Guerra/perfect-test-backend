<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VendaRequest extends FormRequest
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
            'id_cliente' => 'required|exists:clientes,id',
            'id_produto' => 'required|exists:produtos,id',
            'data_venda' => 'required|date',
            'desconto' => 'nullable|numeric|min:0|max:100',
            'quantidade' => 'required|integer|min:1|max:10',
            'status' => 'required|in:v,c,d',
        ];
    }

    public function messages()
    {
        return [
            '*.required' => 'O campo :attribute é obrigatório',
            '*.exists' => 'O :attribute especificado não existe.',
            '*.min' => ':attribute não pode ser menor do que :min.',
            '*.max' => ':attribute não pode ser maior do que :max.',
            'data_venda.date' => 'A :attribute deve ser uma data válida.',
            'desconto.numeric' => 'O :attribute deve ser um valor numérico.',
            'quantidade.integer' => 'O :attribute deve ser um número inteiro.',
            'status.in' => 'O :attribute deve ter valor "Aprovado", "Cancelado" ou "Devolvido".',
        ];
    }

    public function attributes()
    {
        return [
            'id_cliente' => 'Cliente',
            'id_produto' => 'Produto',
            'data_venda' => 'Data de Venda',
            'desconto' => 'Desconto',
            'quantidade' => 'Quantidade',
            'status' => 'Status',
        ];
    }
}
