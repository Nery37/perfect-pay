<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Enums\PaymentMethodEnum;
use Illuminate\Foundation\Http\FormRequest;

class TransactionCreateRequest extends FormRequest
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
        $rules = [
            'amount' => 'bail|required|numeric|min:1',
            'payment_method_id' => 'required|numeric|exists:payment_methods,id',
            'customer_id' => 'required|numeric|exists:customers,id',
        ];

        if (PaymentMethodEnum::CREDIT_CARD == $this->input('payment_method_id')) {
            $rules['ccv'] = 'required|numeric';
            $rules['number'] = 'required|numeric';
            $rules['holder_name'] = 'required';
            $rules['expiry_year'] = 'required|numeric|digits:4';
            $rules['expiry_month'] = 'required|numeric|digits_between:1,2';
        }

        return $rules;
    }

    /**
     * @return array|string[]
     */
    public function messages(): array
    {
        return [
            'amount.required' => 'O valor é obrigatório',
            'amount.numeric' => 'Valor no formato inválido',
            'amount.min' => 'Valor abaixo do permitido',

            'customer_id.required' => 'Pagador é obrigatório',
            'customer_id.numeric' => 'Pagador formato inválido',
            'customer_id.exists' => 'Esse pagador não existe ou o ID é inválido',

            'payment_method_id.required' => 'Método de pagamento inexistente',
            'payment_method_id.numeric' => 'Método de pagamento inválido',
            'payment_method_id.exists' => 'Este método de pagamento não existe ou o ID é inválido',

            'ccv.required' => 'CCV é obrigatório',
            'ccv.numeric' => 'CCV deve ser um número',

            'expiry_year.required' => 'Ano de expiração é obrigatório',
            'expiry_year.numeric' => 'Ano de expiração deve ser um número',
            'expiry_year.digits' => 'Ano de expiração inválido',

            'expiry_month.required' => 'Mês de expiração é obrigatório',
            'expiry_month.numeric' => 'Mês de expiração deve ser um número',
            'expiry_month.digits_between' => 'Mês de expiração inválido',

            'number.required' => 'Número do cartão é obrigatório',
            'number.numeric' => 'Número do cartão deve ser um número',
        ];
    }
}
