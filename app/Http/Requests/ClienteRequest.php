<?php

namespace App\Http\Requests;

use Dotenv\Validator;
use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
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
            'email' => 'required|max:100|email',
            'cpf' => [
                'required',
                'size:14',
                'unique:clientes',
                function ($attribute, $value, $fail) {
                    // somente os numeros
                    $CPFDigits = str_replace(['.', '-'], '', $value);

                    // numero de digitos incorreto
                    if (strlen($CPFDigits) !== 11) {
                        $fail('Número de dígitos menor do que o esperado');
                        return false;
                    }

                    // contem apenas um digito distinto
                    if (count(array_count_values(str_split($CPFDigits))) == 1) {
                        $fail($attribute . ' contém apenas números repetidos');
                        return false;
                    }

                    // letras encontradas
                    if (preg_match('/\D/', $CPFDigits)) {
                        $fail('Valor não numérico encontrado no ' . $attribute);
                        return false;
                    }

                    $CPFDigits = str_split($CPFDigits);
                    $sum = 0;
                    for ($i = 0, $j = 10; $i < 9; $i++, $j--) {
                        $sum += $CPFDigits[$i] * $j;
                    }

                    $firstDigit = (($sum * 10) % 11  == 10) ? 0 : ($sum * 10) % 11;
                    $sum = 0;
                    for ($i = 0, $j = 11; $i < 10; $i++, $j--) {
                        $sum += $CPFDigits[$i] * $j;
                    }

                    $secondDigit = (($sum * 10) % 11  == 10) ? 0 : ($sum * 10) % 11;
                    if ($firstDigit != $CPFDigits[9] || $secondDigit != $CPFDigits[10]) {
                        $fail('Dígitos de segurança incorretos');
                        return false;
                    }

                    return true;
                }
            ],

        ];
    }

    public function messages()
    {
        return [
            '*.max' => 'O :attribute deve conter no máximo :value caracteres.',
            'email.email' => 'O :attribute não está formatado corretamente.',
            'cpf.size' => 'O :attribute deve estar no formato correto (999.999.999-99).',
            'cpf.unique' => 'Já existe um cliente com este :attribute.',
        ];
    }

    public function attributes()
    {
        return [
            'nome' => 'Nome',
            'email' => 'E-mail',
            'cpf' => 'Cpf',

        ];
    }
}
