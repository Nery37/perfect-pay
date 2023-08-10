<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'cpf_cnpj' => 'required|unique:customers|cpf_ou_cnpj',
            'mobile_phone' => 'required',
            'zip_code' => 'required',
            'address_number' => 'required|numeric',
        ];
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'name.required' => 'O nome é obrigatório',

            'cpf_cnpj.required' => 'CPF ou CNPJ é obrigatório',
            'cpf_cnpj.unique' => 'CPF ou CNPJ já cadastrado',
            'cpf_cnpj.cpf_ou_cnpj' => 'CPF ou CNPJ com formato inválido',

            'mobile_phone.required' => 'Telefone é obrigatório',

            'address_number.required' => 'Número do endereço é obrigatório',
            'address_number.numeric' => 'Número do endereço deve ser numérico',

            'zip_code.required' => 'CEP é obrigatório',
        ];
    }
}
